import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GetArticlesCodeComponent } from './get-articles-code.component';

describe('GetArticlesCodeComponent', () => {
  let component: GetArticlesCodeComponent;
  let fixture: ComponentFixture<GetArticlesCodeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GetArticlesCodeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GetArticlesCodeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
