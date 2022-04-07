import { Component, OnInit, Input, Output, EventEmitter, OnChanges } from '@angular/core';
import { Articles } from '../articles.model';
import { ArticlesService } from '../articles.service';
import { SimpleChanges } from '@angular/core/src/metadata/lifecycle_hooks';

@Component({
  selector: 'app-list-articles',
  templateUrl: './list-articles.component.html',
  styleUrls: ['./list-articles.component.css']
})
export class ListArticlesComponent implements OnInit {
  list_articles: Articles[] = [];

  constructor(private articlesServices: ArticlesService) { }

  ngOnInit() {
    this.list_articles = this.articlesServices.getArticles();
  }

  remove(item) {
    this.articlesServices.removeArticle(item);
  }

  up(item){
    this.articlesServices.up(item);
  }
  down(item){
    this.articlesServices.down(item);
  }


}
