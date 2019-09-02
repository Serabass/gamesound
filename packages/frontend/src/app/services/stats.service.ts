import {Injectable} from '@angular/core';
import {
  IResourceMethod,
  Resource,
  ResourceAction,
  ResourceHandler,
  ResourceParams,
  ResourceRequestMethod
} from '@ngx-resource/core';

@Injectable({
  providedIn: 'root'
})
@ResourceParams({
  // IResourceParams
  pathPrefix: '/api/stats'
})
export class StatsService extends Resource {
  constructor(handler: ResourceHandler) {
    super(handler);
  }

  @ResourceAction({
    path: '/all',
    method: ResourceRequestMethod.Get
  })
  public all: IResourceMethod<any, any>;

}
