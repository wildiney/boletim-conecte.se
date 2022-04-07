import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { Router } from '@angular/router';
import { environment } from '../../../environments/environment';
import 'rxjs/add/observable/of';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/do';

import { User } from './user.model';
@Injectable()
export class LoginService {
  user: User;
  auth = false;

  constructor(private http: HttpClient, private router: Router) { }

  isLoggedIn(): boolean {
    return this.user !== undefined;
  }

  checkAuth(): Observable<boolean> {
    return this.http.get(environment.url_backend)
      .map(
      response => {
        console.log(response);
        if (response['auth'] === 1) {
          return true;
        } else {
          return false;
        }
      }
      );
  }

  login(email: string, password: string): Observable<any> {
    return this.http.post(environment.url_backend, JSON.stringify({ email: email, password: password }))
      .map(response => {
        console.log('service', response['auth']);
        if (response['auth'] === '1') {
          this.auth = true;
          return true;
        } else {
          this.auth = false;
          return false;
        }
      });
    /*.do(user => this.user = user);*/
  }

  handleLogin(path?: string) {
    this.router.navigate(['/login', path]);
  }

}
