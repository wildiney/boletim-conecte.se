import { Component, OnInit, ElementRef, Directive } from '@angular/core';
import { ArticlesService } from '../articles.service';
import { Articles } from '../articles.model';
import { DatePipe } from '@angular/common';

@Component({
  selector: 'app-preview',
  templateUrl: './preview.component.html',
  styleUrls: ['./preview.component.css']
})
export class PreviewComponent implements OnInit {
  articles: Articles[] = [];
  render: any;
  today = Date.now();

  constructor(private articlesService: ArticlesService) { }

  ngOnInit() {
    this.articles = this.articlesService.getArticles();
  }
}
