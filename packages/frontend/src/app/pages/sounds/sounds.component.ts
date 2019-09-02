import {Component, OnInit} from '@angular/core';
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
    onlySpeech: true
  };

  public groups: string[];

  constructor(public sound: SoundService) {
  }

  async ngOnInit() {
    this.groups = await this.sound.getGroups();
    this.load();

  }

  public async load(page: number = this.page) {
    this.page = page;
    this.loading = true;
    this.sounds = await this.sound.paginate({page: this.page});
    this.loading = false;

    this.total = this.sounds.total;
    debugger;
  }
}
