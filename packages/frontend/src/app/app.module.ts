import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { IconsProviderModule } from './icons-provider.module';
import { NgZorroAntdModule, NZ_I18N, ru_RU } from 'ng-zorro-antd';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { registerLocaleData } from '@angular/common';
import ru from '@angular/common/locales/ru';
import {ResourceModule} from '@ngx-resource/handler-ngx-http';
import {SoundsComponent} from './pages/sounds/sounds.component';
import {GroupsComponent} from './pages/groups/groups.component';
import {StatsComponent} from './pages/stats/stats.component';
import {RouterModule} from '@angular/router';
import {routes} from './app-routing.module';
import {GroupInfoModalComponent} from './modals/group-info-modal/group-info-modal.component';

registerLocaleData(ru);

@NgModule({
  entryComponents: [
    GroupInfoModalComponent
  ],
  declarations: [
    AppComponent,
    SoundsComponent,
    GroupsComponent,
    StatsComponent,
    GroupInfoModalComponent
  ],
  imports: [
    BrowserModule,
    IconsProviderModule,
    NgZorroAntdModule,
    RouterModule.forRoot(routes),
    FormsModule,
    HttpClientModule,
    BrowserAnimationsModule,
    ResourceModule.forRoot(),
  ],
  providers: [
    {provide: NZ_I18N, useValue: ru_RU},
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
