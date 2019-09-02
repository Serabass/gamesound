import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {SoundsComponent} from './pages/sounds/sounds.component';
import {GroupsComponent} from './pages/groups/groups.component';
import {StatsComponent} from './pages/stats/stats.component';

const routes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: '/welcome' },
  {path: 'sounds', component: SoundsComponent},
  {path: 'groups', component: GroupsComponent},
  {path: 'stats', component: StatsComponent},
];

@NgModule({
  declarations: [
    SoundsComponent,
    GroupsComponent,
    StatsComponent
  ],
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
