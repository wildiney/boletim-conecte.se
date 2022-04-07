import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-get-articles-code',
  templateUrl: './get-articles-code.component.html',
  styleUrls: ['./get-articles-code.component.css']
})
export class GetArticlesCodeComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  rendering() {
    document.getElementById('code').innerHTML = document.getElementById('container').outerHTML;
  }


}
