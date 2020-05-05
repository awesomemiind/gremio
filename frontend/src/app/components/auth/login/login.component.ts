import { AuthServiceService } from './../../../services/auth-service.service';
import { Component, OnInit } from '@angular/core';
import  {  FormBuilder,  FormGroup, Validators  }  from  '@angular/forms';

import { Auth } from './../../../shared/models/auth';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  formLogin: FormGroup;

  constructor(
    private fb: FormBuilder,
    private authService: AuthServiceService
  ) { }

  ngOnInit(): void {
    this.createForm(new Auth);
  }

  createForm(auth: Auth) {
    this.formLogin = this.fb.group({
      'email': ['', [Validators.required, Validators.email]],
      'password': ['', [Validators.required]]
    });
  }

  submitForm() {
    this.authService.login(this.formLogin.value).subscribe(
      (response) => {
        console.log(response)
      }
    )
  }
}
