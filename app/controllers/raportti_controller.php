<?php

class RaporttiController extends BaseController {

    public static function index($id) {
        self::check_logged_in();
        $tilaus = Tilaus::find($id);
        View::make('suunnitelmat/raportti.html', array('tilaus' => $tilaus));
    }

    public static function store($id) {
        self::check_logged_in();    
        $params = $_POST;
        $kaynti = Tilaus::find($id);
        $raportti = new Raportti(array(
            'potilas_id' => $kaynti->potilas_id,
            'laakari_id' => $kaynti->laakari_id,
            'kaynti_id' => $kaynti->id,
            'raportti' => $params['raportti']
        ));
        $raportti->save();

        Redirect::to('/potilaat');
    }

}
