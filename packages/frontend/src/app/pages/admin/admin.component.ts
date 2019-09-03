import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {CorrectionService} from '../../services/correction.service';

@Component({
  selector: 'app-admin',
  templateUrl: './admin.component.html',
  styleUrls: ['./admin.component.sass']
})
export class AdminComponent implements OnInit {
  isAllDisplayDataChecked = false;
  isOperating = false;
  isIndeterminate = false;
  listOfDisplayData: any[] = [];
  listOfAllData: any[] = [];
  mapOfCheckedId: { [key: string]: boolean } = {};
  numberOfChecked = 0;
  public total = 0;

  public page = 1;

  @ViewChild('audio', {static: true})
  public audio: ElementRef<HTMLAudioElement>;

  constructor(public correction: CorrectionService) {
  }

  async ngOnInit() {
    this.load();
  }

  public async load() {

    let res = await this.correction.paginate({
      page: this.page
    });

    this.listOfAllData = res.data;
    this.total = res.total;
  }

  currentPageDataChange($event: any[]): void {
    this.listOfDisplayData = $event;
    this.refreshStatus();
  }

  refreshStatus(): void {
    this.isAllDisplayDataChecked = this.listOfDisplayData
      .filter(item => !item.disabled)
      .every(item => this.mapOfCheckedId[item.id]);
    this.isIndeterminate =
      this.listOfDisplayData.filter(item => !item.disabled).some(item => this.mapOfCheckedId[item.id]) &&
      !this.isAllDisplayDataChecked;
    this.numberOfChecked = this.listOfAllData.filter(item => this.mapOfCheckedId[item.id]).length;
  }

  checkAll(value: boolean): void {
    this.listOfDisplayData.filter(item => !item.disabled).forEach(item => (this.mapOfCheckedId[item.id] = value));
    this.refreshStatus();
  }

  operateData(): void {
    this.isOperating = true;
    setTimeout(() => {
      this.listOfAllData.forEach(item => (this.mapOfCheckedId[item.id] = false));
      this.refreshStatus();
      this.isOperating = false;
    }, 1000);
  }

  public getUrl(fileName: string) {
    return `http://gamesound.serabass.net/sounds/1/${fileName}`;
  }

  public async play(data, event) {

    if (event.target.tagName === 'TEXTAREA') {
      return;
    }

    if (event.target.tagName === 'BUTTON') {
      return;
    }

    if (event.target.tagName === 'A') {
      return;
    }

    let file = this.getUrl(data.sound.file_name);

    for (let soundObj of this.listOfAllData) {
      soundObj.playing = false;
    }

    data.sound.playing = true;
    this.audio.nativeElement.src = file;
    this.audio.nativeElement.onended = () => {
      data.sound.playing = false;
    };
    this.audio.nativeElement.play();
  }

  public async accept(row) {
    await this.correction.accept({
      id: row.id,
    });

    this.load();
  }

  public async decline(row) {
    await this.correction.decline({
      id: row.id,
    });

    this.load();
  }
}
