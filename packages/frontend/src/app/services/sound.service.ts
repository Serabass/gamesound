import {Injectable} from '@angular/core';
import {
  IResourceMethod,
  Resource,
  ResourceAction, ResourceHandler, ResourceParams,
  ResourceRequestMethod
} from '@ngx-resource/core';

@Injectable({
  providedIn: 'root'
})
@ResourceParams({
  // IResourceParams
  pathPrefix: '/api/sound'
})
export class SoundService extends Resource {
  constructor(handler: ResourceHandler) {
    super(handler);
  }

  @ResourceAction({
    path: '/',
    method: ResourceRequestMethod.Post
  })
  public paginate: IResourceMethod<{ page?: number, filters: any }, any>;

  @ResourceAction({
    path: '/groups',
    method: ResourceRequestMethod.Get
  })
  public getGroups: IResourceMethod<any, any>;

  @ResourceAction({
    path: '/correct/{id}',
    method: ResourceRequestMethod.Post
  })
  public save: IResourceMethod<any, any>;

}
