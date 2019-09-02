import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {SoundService} from '../../services/sound.service';

export interface Sound {

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
    text: '',
  };

  public groups: string[];

  @ViewChild('audio', {static: true})
  public audio: ElementRef<HTMLAudioElement>;

  constructor(public sound: SoundService) {
  }

  async ngOnInit() {
    this.groups = await this.sound.getGroups();
    this.load();

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
}
