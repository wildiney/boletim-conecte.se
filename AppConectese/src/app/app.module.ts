import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { ROUTES } from './app.routes';
import { HttpClientModule, HttpClient } from '@angular/common/http';
import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { ArticlesComponent } from './articles/articles.component';
import { AddArticlesComponent } from './articles/add-articles/add-articles.component';
import { ListArticlesComponent } from './articles/list-articles/list-articles.component';
import { PreviewComponent } from './articles/preview/preview.component';
import { ArticlesService } from './articles/articles.service';
import { GetArticlesCodeComponent } from './articles/get-articles-code/get-articles-code.component';
import { LoginComponent } from './security/login/login.component';
import { LoginService } from './security/login/login.service';
import { LoggedInGuard } from './security/loggedin.guard';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    ArticlesComponent,
    AddArticlesComponent,
    ListArticlesComponent,
    PreviewComponent,
    GetArticlesCodeComponent,
    LoginComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule,
    RouterModule.forRoot(ROUTES)
  ],
  providers: [ArticlesService, HttpClient, LoginService, LoggedInGuard],
  bootstrap: [AppComponent]
})
export class AppModule { }
