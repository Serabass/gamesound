import {Routes} from '@angular/router';
import {SoundsComponent} from './pages/sounds/sounds.component';
import {GroupsComponent} from './pages/groups/groups.component';
import {StatsComponent} from './pages/stats/stats.component';
import {AdminComponent} from './pages/admin/admin.component';

export const routes: Routes = [
  {path: '', pathMatch: 'full', redirectTo: '/sounds'},
  {path: 'sounds', component: SoundsComponent},
  {path: 'groups', component: GroupsComponent},
  {path: 'stats', component: StatsComponent},
  {path: 'admin565', component: AdminComponent},
];
