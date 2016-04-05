/**
 * Created by at15 on 2016/4/4.
 */

import {Component, Input, OnInit} from 'angular2/core';
import {Hero} from './hero';
import {RouteParams} from 'angular2/router';
import {HeroService} from './hero.service';

@Component({
    selector: 'my-hero-detail',
    templateUrl: 'app/hero-detail.component.html'
})
export class HeroDetailComponent implements OnInit {
    @Input()
    hero:Hero;

    constructor(private _heroService:HeroService, private _routeParams:RouteParams) {
    }

    ngOnInit(){
        let id = parseInt(this._routeParams.get('id'));
        this._heroService.getHero(id)
            .then(hero => this.hero = hero);
    }

    goBack() {
        window.history.back();
    }

}