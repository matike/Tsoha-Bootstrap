<?php

class PotilasController extends BaseController {

    public static function index($id) {
        self::check_logged_in_admin();
        $ohjeet = Ohje::findAllById($id);

        View::make('ohjeet/ohjeet.html', array('ohjeet' => $ohjeet));
    }

    public static function showAll() {
        self::check_logged_in_admin();
        $potilaat = Potilas::all();


        View::make('potilaat/potilaat.html', array('potilaat' => $potilaat));
    }

    public static function show($id) {
        $potilas = Potilas::find($id);
        $historia = Historia::findByPotilasId($id);

        View::make('potilaat/potilas.html', array('potilas' => $potilas, 'historia' => $historia));
    }

}
