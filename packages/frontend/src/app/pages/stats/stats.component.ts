import {Component, OnInit} from '@angular/core';
import {StatsService} from '../../services/stats.service';

@Component({
  selector: 'app-stats',
  templateUrl: './stats.component.html',
  styleUrls: ['./stats.component.sass']
})
export class StatsComponent implements OnInit {

  constructor(public stats: StatsService) {
  }

  ngOnInit() {
  }

}
