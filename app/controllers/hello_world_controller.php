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

    public static function register() {
        View::make('suunnitelmat/register.html');
    }

    public static function ohje() {
        View::make('ohjeet/ohje.html');
    }

    public static function uusiOhje() {
        View::make('ohjeet/uusiohje.html');
    }

    public static function potilas() {
        View::make('suunnitelmat/potilas.html');
    }

    public static function raportti() {
        View::make('suunnitelmat/raportti.html');
    }

    public static function store() {
        $params = $_POST;
        $ohje = new Ohje(array(
            'potilas_id' => $params['potilas_id'],
            'paivamaara' => $params['paivamaara'],
            'ohje' => $params['ohje']
        ));
        if ($ohje->potilasOnOlemassa($params['potilas_id'])) {

            $ohje->save();
        } else {
            View::make('ohjeet/uusiohje.html', array('error' => 'Potilasta ei ole olemassa.'));
        }

        Redirect::to('/potilaat');
    }

    public static function edit($id) {
        $ohje = Ohje::find($id);
        View::make('/edit.html', array('attributes' => $ohje));
    }

    public static function update($id) {
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'potilas_id' => $params['potilas_id'],
            'paivamaara' => $params['paivamaara'],
            'ohje' => $params['ohje']
        );

        $ohje = new Ohje($attributes);
        $errors = $ohje->errors();

        if (count($errors) > 0) {
            View::make('/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $ohje->update();

            Redirect::to('/potilaat');
        }
    }

    public function destroy($id) {
        $ohje = new Ohje(array('id' => $id));

        $ohje->destroy($id);

        Redirect::to('/potilaat');
    }
    

}
