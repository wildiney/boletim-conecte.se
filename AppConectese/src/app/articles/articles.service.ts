import { Injectable } from '@angular/core';
import { Articles } from './articles.model';
import { Observable } from 'rxjs/Observable';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { LoginService } from '../security/login/login.service';

import 'rxjs/add/operator/map';

@Injectable()
export class ArticlesService {

  artics: Articles[] = [];

  constructor(private loginService: LoginService) { }

  getArticles(): Articles[] {
    return this.artics;
  }

  editArticle(item) {
    return this.artics[item];
  }

  removeArticle(item) {
    this.artics.splice(item, 1);
  }

  addArticle(item: Articles) {
    this.artics.push(item);
    console.log(this.artics);
  }

  up(pos) {
    const anterior = ((pos - 1) === -1) ? 0 : pos - 1;
    const antes = this.artics.splice(0, pos - 1);
    const descendo = this.artics.splice(0, 1);
    const subindo = this.artics.splice(0, 1);
    const restante = this.artics.splice(0, this.artics.length + 1);

    let newArray = this.artics.concat(antes).concat(subindo).concat(descendo).concat(restante);
    for (let i = 0; i < newArray.length; i++) {
      this.artics.push(newArray[i]);
    }
    return this.artics;
  }
  down(pos) {
    const anterior = ((pos - 1) === -1) ? 0 : pos - 1;
    const antes = this.artics.splice(0, pos);
    const atual = this.artics.splice(0, 1);
    const depois = this.artics.splice(0, 1);
    const restante = this.artics.splice(0, this.artics.length + 1);

    let newArray = this.artics.concat(antes).concat(depois).concat(atual).concat(restante);
    for (let i = 0; i < newArray.length; i++) {
      this.artics.push(newArray[i]);
    }
    return this.artics;
  }
}
