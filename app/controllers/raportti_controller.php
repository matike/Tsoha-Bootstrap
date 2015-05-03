<?php

class RaporttiController extends BaseController {

    public static function index($id) {
        self::check_logged_in_admin();
        $tilaus = Tilaus::find($id);
        View::make('raportit/raportti.html', array('tilaus' => $tilaus));
    }

    public static function showAll() {
        self::check_logged_in_admin();
        $raportit = Raportti::all();
        View::make('raportit/raportit.html', array('raportit' => $raportit));
    }

    public static function store($id) {
        self::check_logged_in_admin();
        $params = $_POST;
        $kaynti = Tilaus::find($id);
        $raportti = new Raportti(array(
            'potilas_id' => $kaynti->potilas_id,
            'laakari_id' => $kaynti->laakari_id,
            'kaynti_id' => $kaynti->id,
            'kuvaus' => $params['kuvaus']
        ));
        $raportti->save();

        Redirect::to('/tilaukset');
    }
    

}
