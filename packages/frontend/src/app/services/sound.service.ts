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

  /**
   * Отправка комментария
   */
  @ResourceAction({
    path: '/',
    method: ResourceRequestMethod.Get
  })
  public paginate: IResourceMethod<{ page?: number }, any>;

  /**
   * Отправка комментария
   */
  @ResourceAction({
    path: '/groups',
    method: ResourceRequestMethod.Get
  })
  public getGroups: IResourceMethod<any, any>;

}
