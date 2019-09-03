import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {SoundService} from '../../services/sound.service';
import {NzModalService, NzNotificationService} from 'ng-zorro-antd';
import {GroupInfoModalComponent} from '../../modals/group-info-modal/group-info-modal.component';
import {CorrectionService} from '../../services/correction.service';
import {ActivatedRoute, Router} from '@angular/router';

export interface Sound {
  id: number;
}

@Component({
  selector: 'app-sounds',
  templateUrl: './sounds.component.html',
  styleUrls: ['./sounds.component.sass']
})
export class SoundsComponent implements OnInit {

  public loading = false;

  public sounds: any;

  public page = 1;
  public pageSize = 15;

  public total = 0;

  public filter = {
    groups: [],
    onlySpeech: true,
    onlyEmpty: false,
    onlyDoubtful: false,
    text: '',
  };

  public volume = 1.0;

  public groups: any[];

  @ViewChild('audio', {static: true})
  public audio: ElementRef<HTMLAudioElement>;

  constructor(public sound: SoundService,
              public modal: NzModalService,
              public correction: CorrectionService,
              public route: ActivatedRoute,
              public router: Router,
              public notification: NzNotificationService) {
  }

  ngOnInit() {
    this.route.queryParams.subscribe(async (params) => {
      this.groups = await this.sound.getGroups();
      this.filter.groups = (params.group_id || '')
        .split(',')
        .filter((g) => !!g)
        .map(g => +g)
      ;

      this.filter.onlySpeech = !!+params.only_speech;
      this.filter.onlyDoubtful = !!+params.only_doubtful;
      this.filter.onlyEmpty = !!+params.only_empty;
      this.filter.text = params.text;
      this.page = params.page;
      this.pageSize = params.page_size;

      await this.load();
    });

    if (localStorage.getItem('volume')) {
      this.volume = +localStorage.getItem('volume');
    }
  }

  public async load(page: number = this.page) {
    this.loading = true;
    this.sounds = await this.sound.paginate({
      page: this.page,
      filters: this.filter
    });
    this.loading = false;

    this.total = this.sounds.total;
    this.page = page;
  }

  public async play(sound, event) {

    if (event.target.tagName === 'TEXTAREA') {
      return;
    }

    if (event.target.tagName === 'A') {
      return;
    }

    let file = this.getUrl(sound.file_name);

    for (let soundObj of this.sounds.data) {
      soundObj.playing = false;
    }

    sound.playing = true;
    this.audio.nativeElement.src = file;
    this.audio.nativeElement.onended = () => {
      sound.playing = false;
    };
    this.audio.nativeElement.play();
  }

  public getUrl(fileName: string) {
    return `http://gamesound.serabass.net/sounds/1/${fileName}`;
  }

  public showGroupInfo(group, event) {
    event.preventDefault();

    const modal = this.modal.create({
      nzContent: GroupInfoModalComponent,
      nzComponentParams: {
        group
      },
      nzFooter: []
    });
  }

  public async save(sound) {
    sound.saving = true;
    await this.correction.add({
      id: sound.id,
      sound,
    });
    sound.saving = false;

    this.notification.info('Success!', `Suggestion [${sound.original_text}] successully sent!`);
  }

  public search(resetPage = true) {
    if (resetPage) {
      this.page = 1;
    }
    this.router.navigate(['/sounds'], {
      queryParams: {
        only_speech: +this.filter.onlySpeech,
        only_doubtful: +this.filter.onlyDoubtful,
        only_empty: +this.filter.onlyEmpty,
        text: this.filter.text,
        group_id: this.filter.groups.filter((i) => i !== 0).join(','),
        page: this.page,
        page_size: this.pageSize,
      }
    });
  }

  public saveVolume() {
    localStorage.setItem('volume', this.volume.toString());
  }
}
