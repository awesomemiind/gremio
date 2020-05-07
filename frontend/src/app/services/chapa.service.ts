import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { environment } from '../../environments/environment';

interface ChapaApiResponse {
  id: number,
  nome: string,
  slogan: string,
  ativo: boolean,
  slug: string
}

@Injectable({providedIn: 'root'})
export class ChapaService {
  chapasList: any
  selectedChapa: any = 'teste'
  constructor(private httpClient: HttpClient) { }

  listAll() {
    this.httpClient.get<ChapaApiResponse>(`${environment.url}chapa`)
      .subscribe(
        response => {
          this.chapasList = response
        }
      )
  }

  delete(id: number){
    this.chapasList = this.chapasList.filter(chapa => {
      return chapa.id != id
    })
    // this.httpClient.delete(`${environment.url}chapa/${id}`)
    // .subscribe(
    //   response => {

    //   }
    // )
  }
}
