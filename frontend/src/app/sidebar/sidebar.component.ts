import { Component, OnInit } from '@angular/core';


export interface RouteInfo {
    path: string;
    title: string;
    icon: string;
    class: string;
}

export const ROUTES: RouteInfo[] = [
    { path: '/dashboard',     title: 'Home',              icon:'fas fa-home',   class: '' },
    { path: '/icons',         title: 'Users',             icon:'fas fa-user',   class: '' },
    { path: '/maps',          title: 'Participantes',     icon:'fas fa-users',  class: '' },
    { path: '/chapas',        title: 'Chapas',            icon:'fas fa-book-open',    class: '' },
    { path: '/user',          title: 'Cargos',            icon:'fas fa-briefcase',  class: '' },
    // { path: '/table',         title: 'Votação',           icon:'far fa-clipboard',    class: '' },
    // { path: '/upgrade',       title: 'Sair',              icon:'fas fa-sign-out-alt',  class: 'active-pro' },
];

@Component({
    moduleId: module.id,
    selector: 'sidebar-cmp',
    templateUrl: 'sidebar.component.html',
})

export class SidebarComponent implements OnInit {
    public menuItems: any[];
    ngOnInit() {
        this.menuItems = ROUTES.filter(menuItem => menuItem);
    }
}
