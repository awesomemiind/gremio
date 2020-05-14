import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { environment } from '../../environments/environment';
import { Observable } from 'rxjs';

interface ChapaApiResponse {
  id: number,
  nome: string,
  slogan: string,
  ativo: boolean,
  slug: string
}

@Injectable({providedIn: 'root'})
export class ChapaService {
  chapasList: any;
  currentChapa = {};
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
    this.httpClient.delete(`${environment.url}chapa/${id}`)
    .subscribe(
      response => {
        this.chapasList = this.chapasList.filter(chapa => { return chapa.id != id }
    )})
  }

  get (slug: string): Observable<any> {
    return this.httpClient.get(`${environment.url}chapa/${slug}`)
  }
}
