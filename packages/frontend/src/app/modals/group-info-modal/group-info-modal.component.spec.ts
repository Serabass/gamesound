import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {GroupInfoModalComponent} from './group-info-modal.component';

describe('GroupInfoModalComponent', () => {
  let component: GroupInfoModalComponent;
  let fixture: ComponentFixture<GroupInfoModalComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [GroupInfoModalComponent]
    })
      .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GroupInfoModalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
