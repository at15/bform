import {Component, OnInit} from 'angular2/core';
import {HeroDetailComponent} from './hero-detail.component';
import {HeroService} from './hero.service';
import {Router} from 'angular2/router';

export class Hero {
    id:number;
    name:string;
}

@Component({
    selector: 'my-heroes',
    templateUrl: 'app/heroes.component.html',
    styleUrls: ['app/heroes.component.css'],
    directives: [HeroDetailComponent],
    providers: []
})
export class HeroesComponent implements OnInit {
    ngOnInit() {
        this.getHeroes();
    }

    constructor(private _heroService:HeroService,
                private _router:Router) {
    }

    public heroes:Hero[];
    title = 'Tour of Heroes';
    hero:Hero = {
        id: 1,
        name: 'Windstorm'
    };
    // selectedHero: Hero = {id:0,name:''};
    selectedHero:Hero;

    onSelect(hero:Hero) {
        this.selectedHero = hero;
    }

    getHeroes() {
        this._heroService.getHeroes().then(heroes => this.heroes = heroes);
    }

    gotoDetail() {
        this._router.navigate(['HeroDetail', {id: this.selectedHero.id}]);
    }
}
