import { Component, OnInit, Input, OnChanges, Output, EventEmitter } from '@angular/core';
import { Articles } from '../articles.model';
import { ArticlesService } from '../articles.service';
import { SimpleChanges } from '@angular/core/src/metadata/lifecycle_hooks';

@Component({
  selector: 'app-add-articles',
  templateUrl: './add-articles.component.html',
  styleUrls: ['./add-articles.component.css']
})
export class AddArticlesComponent implements OnInit {
  edition: string;
  month: string;
  title: string;
  link: string;
  image: string;
  description: string;
  type: string;
  atualizar = false;
  item: number;

  articles: Articles[] = [];
  constructor(private articlesService: ArticlesService) { }

  ngOnInit() {}

  addArticle(article: Articles) {
    this.articlesService.addArticle(article);
    this.title = '';
    this.link = '';
    this.image = '';
    this.description = '';
  }

}
