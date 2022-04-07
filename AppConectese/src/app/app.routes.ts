import { Routes } from '@angular/router';

import { ArticlesComponent } from './articles/articles.component';
import { PreviewComponent } from './articles/preview/preview.component';
import { LoginComponent } from './security/login/login.component';
import { LoggedInGuard } from './security/loggedin.guard';

export const ROUTES: Routes = [
    { path: '', component: ArticlesComponent },
    { path: 'login/:to', component: LoginComponent },
    { path: 'login', component: LoginComponent },
    { path: 'articles', component: ArticlesComponent },
    { path: '**', component: ArticlesComponent }
];
