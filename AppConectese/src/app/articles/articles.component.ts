import { Component, OnInit } from '@angular/core';
import { Articles } from './articles.model';
import { LoginService } from '../security/login/login.service';
import { Router } from '@angular/router';
import { ArticlesService } from './articles.service';

@Component({
  selector: 'app-articles',
  templateUrl: './articles.component.html',
  styleUrls: ['./articles.component.css']
})
export class ArticlesComponent implements OnInit {
  list = false;
  preview = true;
  code = true;

  constructor(private route: Router, private articleService: ArticlesService, private loginService: LoginService) { }

  ngOnInit() {
    console.log(this.loginService.auth);
    if (this.loginService.auth === false) {
      this.route.navigate(['login']);
    }
  }

  view(item) {
    this.list = true;
    this.preview = true;
    this.code = true;

    if (item === 'list') {
      this.list = !this.list;
    } else if (item === 'preview') {
      this.preview = !this.preview;
    } else {
      this.code = !this.code;
    }
  }
}
