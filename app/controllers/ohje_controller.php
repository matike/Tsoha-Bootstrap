<?php

class OhjeController extends BaseController {

    public static function index($id) {
        self::check_logged_in_admin();
        $ohjeet = Ohje::findAllById($id);

        View::make('ohjeet/ohjeet.html', array('ohjeet' => $ohjeet));
    }

    public static function uusi($id) {
        self::check_logged_in_admin();
        $potilas = Potilas::find($id);
        View::make('ohjeet/uusiohje.html', array('potilas' => $potilas));
    }

    public static function store($id) {
        self::check_logged_in_admin();
        $params = $_POST;
        $ohje = new Ohje(array(
            'potilas_id' => $id,
            'paivamaara' => $params['paivamaara'],
            'ohje' => $params['ohje']
        ));
        
        $ohje->save();

        Redirect::to('/potilaat');
    }
    
    public static function edit($id) {
        $ohje = Ohje::find($id);
        
        View::make('ohjeet/edit.html', array('ohje' => $ohje));
    }

    public static function update($id) {
        self::check_logged_in_admin();
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'potilas_id' => $params['potilas_id'],
            'paivamaara' => $params['paivamaara'],
            'ohje' => $params['ohje']
        );

        $ohje = new Ohje($attributes);
        
            $ohje->update();

            Redirect::to('/potilas/'.$params['potilas_id'].'/ohjeet');
        }
    

    public static function destroy($id) {
        self::check_logged_in_admin();
        $ohje = new Ohje(array('id' => $id));

        $ohje->destroy($id);

        Redirect::to('/potilaat');
    }

}
