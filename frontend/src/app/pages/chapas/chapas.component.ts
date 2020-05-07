import { Component, OnInit } from '@angular/core';
import {
  trigger,
  state,
  style,
  animate,
  transition
} from '@angular/animations'

import { ChapaService } from './../../services/chapa.service';

@Component({
  selector: 'app-chapas',
  templateUrl: './chapas.component.html',
  styleUrls: ['./chapas.component.css'],
  animations: [
    trigger('listItemState', [
      transition(':enter', [
        style({
          transform: 'translateX(-50%)'
        }),
        animate(300)
      ]),
    ]),
  ]
})
export class ChapasComponent implements OnInit {

  chapaFilter = '';
  constructor(
    private chapaService: ChapaService,
    ) { }

  ngOnInit(): void {
    this.chapaService.listAll()
  }

  get chapaList() {
    if(typeof(this.chapaService.chapasList) === 'object') {
      return this.chapaService.chapasList.filter(chapa => {
        return chapa.nome.toLowerCase().indexOf(this.chapaFilter.toLowerCase()) != -1
      })
    }
  }

  delete(id: number) {
    console.log(`deletando recurso id: ${id}`)
    this.chapaService.delete(id)
  }

}
