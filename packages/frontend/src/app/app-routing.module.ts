import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {SoundsComponent} from './pages/sounds/sounds.component';
import {GroupsComponent} from './pages/groups/groups.component';
import {StatsComponent} from './pages/stats/stats.component';
import {NgZorroAntdModule} from 'ng-zorro-antd';

export const routes: Routes = [
  {path: '', pathMatch: 'full', redirectTo: '/sounds'},
  {path: 'sounds', component: SoundsComponent},
  {path: 'groups', component: GroupsComponent},
  {path: 'stats', component: StatsComponent},
];
