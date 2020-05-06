import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { DashboardRoutingModule } from './dashboard-routing.module';
import { TemplateComponent } from './components/template/template.component';
import { SidebarComponent } from './components/sidebar/sidebar.component';


@NgModule({
  declarations: [TemplateComponent, SidebarComponent],
  imports: [
    CommonModule,
    DashboardRoutingModule
  ]
})
export class DashboardModule { }
