import {Component, OnInit} from '@angular/core';
import {GroupService} from '../../services/group.service';

@Component({
  selector: 'app-groups',
  templateUrl: './groups.component.html',
  styleUrls: ['./groups.component.sass']
})
export class GroupsComponent implements OnInit {

  public data: any;

  public loading = false;

  constructor(public group: GroupService) {
  }

  async ngOnInit() {
    this.loading = true;

    this.data = await this.group.all();

    this.loading = false;
  }

}
