import {Component, OnInit} from '@angular/core';
import {GroupInfoService} from '../../services/group-info.service';

@Component({
  selector: 'app-group-info-modal',
  templateUrl: './group-info-modal.component.html',
  styleUrls: ['./group-info-modal.component.sass']
})
export class GroupInfoModalComponent implements OnInit {

  private rgx = /^\s*(\d+)\s+(\w+)/;

  public group: any;

  public info = null;

  constructor(public groupInfoService: GroupInfoService) {
  }

  ngOnInit() {
    let [, id, title] = this.group.title.match(this.rgx);

    this.info = this.groupInfoService.getInfo(title);
  }

  public get isPedGroup() {
    let parts = this.group.title.split(/\s*,\s*/);

    return parts[0].split(/s*\/\s*/).some((e) => this.rgx.test(e));
  }

  public get imageUrl() {
    if (this.isPedGroup) {
      let [, id, title] = this.group.title.match(this.rgx);

      id = id.replace(/^0+/, '');

      return `http://spaceeinstein.altervista.org/vcped/${id}.jpg`;
    }
  }
}
