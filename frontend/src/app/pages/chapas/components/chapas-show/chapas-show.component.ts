import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { takeWhile } from 'rxjs/operators'

import { ChapaService } from './../../../../services/chapa.service';


@Component({
  selector: 'app-chapas-show',
  templateUrl: './chapas-show.component.html',
  styleUrls: ['./chapas-show.component.css']
})
export class ChapasShowComponent implements OnInit {
  slug = ''
  isAlive = true;

  constructor(
    private route: ActivatedRoute,
    private chapaService: ChapaService
  ) {
    this.route.params
    .pipe(takeWhile(() => this.isAlive))
    .subscribe((params: any) => {
      this.slug = params['slug'];
    })
  }

  ngOnInit(): void {
  }

}
