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
  pathPrefix: '/api/correction'
})
export class CorrectionService extends Resource {
  constructor(handler: ResourceHandler) {
    super(handler);
  }

  @ResourceAction({
    path: '/add',
    method: ResourceRequestMethod.Post
  })
  public add: IResourceMethod<any, any>;

  @ResourceAction({
    path: '/',
    method: ResourceRequestMethod.Get
  })
  public paginate: IResourceMethod<any, any>;

  @ResourceAction({
    path: '/accept/{id}',
    method: ResourceRequestMethod.Post
  })
  public accept: IResourceMethod<any, any>;

  @ResourceAction({
    path: '/decline/{id}',
    method: ResourceRequestMethod.Post
  })
  public decline: IResourceMethod<any, any>;
}
