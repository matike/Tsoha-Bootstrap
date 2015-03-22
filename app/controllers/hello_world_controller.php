<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('home.html');
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        View::make('helloworld.html');
    }

    public static function tilaus() {
        View::make('suunnitelmat/tilaus.html');
    }

    public static function laakarit() {
        View::make('suunnitelmat/laakarit.html');
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

}
