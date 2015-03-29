<?php

class PotilasController extends BaseController {

    public static function index() {
        $potilaat = Potilas::all();

        View::make('suunnitelmat/potilaat.html', array('potilaat' => $potilaat));
    }

    public static function show($id) {
        $potilas = Potilas::find($id);

        View::make('suunnitelmat/potilas/potilas.html', array('potilas' => $potilas));
    }

    public static function uusipotilas() {

        View::make('suunnitelmat/potilas/uusipotilas.html');
    }

    public static function store() {
        $params = $_POST;

        $potilas = new Potilas(array(
            'nimi' => $params['nimi'],
            'osoite' => $params['osoite'],
            'email' => $params['email'],
            'salasana' => $params['salasana'],
        ));

        $potilas->save();

        Redirect::to('/potilaat' . $potilas->id, array('message' => 'Potilas lisätty'));
    }

}
