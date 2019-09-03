import {Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-group-info-modal',
  templateUrl: './group-info-modal.component.html',
  styleUrls: ['./group-info-modal.component.sass']
})
export class GroupInfoModalComponent implements OnInit {

  private rgx = /^\s*(\d+)\s+(\w+),/;

  public group: any;

  constructor() {
  }

  ngOnInit() {
  }

  public get isPedGroup() {
    return this.rgx.test(this.group.title);
  }

  public get imageUrl() {
    if (this.isPedGroup) {
      let [, id, title] = this.group.title.match(this.rgx);

      id = id.replace(/^0+/, '');

      return `http://spaceeinstein.altervista.org/vcped/${id}.jpg`;
    }
  }
}
