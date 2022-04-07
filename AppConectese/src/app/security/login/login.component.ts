import { Component, OnInit } from '@angular/core';
import { LoginService } from './login.service';
import { User } from './user.model';
import { ActivatedRoute, Router } from '@angular/router';
import { Route } from '@angular/router/src/config';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  email: string;
  password: string;
  connectionError = true;

  constructor(private loginService: LoginService, private activatedRoute: ActivatedRoute, private router: Router) { }

  ngOnInit() {

  }

  login() {
    if (this.email === undefined || this.password === undefined) {
      return false;
    }
    this.loginService.login(this.email, this.password).subscribe(auth => {
      if (auth) {
        this.router.navigate(['/articles']);
      }
    },
      error => {
        this.connectionError = false;
      });

  }
}
