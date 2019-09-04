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
    return this.groupInfoService.isPedGroup(this.group.title);
  }

  public get imageUrl() {
    return this.groupInfoService.getImageURL(this.group.title);
  }
}
