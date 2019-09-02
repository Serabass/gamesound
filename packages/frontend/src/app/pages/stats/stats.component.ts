import {Component, OnInit} from '@angular/core';
import {StatsService} from '../../services/stats.service';

@Component({
  selector: 'app-stats',
  templateUrl: './stats.component.html',
  styleUrls: ['./stats.component.sass']
})
export class StatsComponent implements OnInit {

  public loading = false;

  public data: any;

  constructor(public stats: StatsService) {
  }

  async ngOnInit() {
    this.loading = true;
    this.data = await this.stats.all();
    this.loading = false;
  }

}
