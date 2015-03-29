<?php


class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('home.html');
    }

    public static function sandbox() {
        $jussi = Potilas::find(1);
        $potilaat = Potilas::all();
        Kint::dump($potilaat);
        Kint::dump($jussi);

    }

    public static function tilaus() {
        View::make('suunnitelmat/tilaus.html');
    }

    public static function potilaat() {
        View::make('suunnitelmat/potilaat.html');
    }

    public static function laakari() {
        View::make('suunnitelmat/laakari.html');
    }

    public static function login() {
        View::make('suunnitelmat/login.html');
    }

    public static function register() {
        View::make('suunnitelmat/register.html');
    }

    public static function ohje() {
        View::make('suunnitelmat/ohje.html');
    }

    public static function potilas() {
        View::make('suunnitelmat/potilas.html');
    }

    public static function raportti() {
        View::make('suunnitelmat/raportti.html');
    }
    
}
