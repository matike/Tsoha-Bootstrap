<?php

class PotilasController extends BaseController {

    public static function index($id) {
        $ohjeet = Ohje::findAllById($id);

        View::make('ohjeet/ohjeet.html', array('ohjeet' => $ohjeet));
    }

}
