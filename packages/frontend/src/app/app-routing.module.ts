import {Routes} from '@angular/router';
import {SoundsComponent} from './pages/sounds.component';
import {GroupsComponent} from './pages/groups.component';
import {StatsComponent} from './pages/stats.component';
import {AdminComponent} from './pages/admin.component';

export const routes: Routes = [
  {path: '', pathMatch: 'full', redirectTo: '/sounds'},
  {path: 'sounds', component: SoundsComponent},
  {path: 'groups', component: GroupsComponent},
  {path: 'stats', component: StatsComponent},
  {path: 'admin565', component: AdminComponent},
];
