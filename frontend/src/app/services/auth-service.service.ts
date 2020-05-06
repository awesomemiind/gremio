import { Injectable } from '@angular/core';

import { Auth } from './../shared/models/auth';
import { HttpClient } from '@angular/common/http';
import { environment } from './../../environments/environment';
import { Observable } from 'rxjs';
import { tap } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthServiceService {

  constructor(
    private http: HttpClient
  ) { }

  login(credentials: Auth): Observable<boolean> {
    return this.http.post<any>(`${environment.api_url}/auth/login`, credentials)
    .pipe(tap(data => {
      localStorage.setItem('token', data.access_token)
    }))
  }

}
