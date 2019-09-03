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
  pathPrefix: '/api/group'
})
export class GroupService extends Resource {
  constructor(handler: ResourceHandler) {
    super(handler);
  }

  @ResourceAction({
    path: '/',
    method: ResourceRequestMethod.Get
  })
  public all: IResourceMethod<any, any>;

}
