<?php

class TilausController extends BaseController {

    public static function index() {
        self::check_logged_in();
        $laakarit = Laakari::all();


        View::make('tilaukset/tilaus.html', array('laakarit' => $laakarit));
    }
    
    public static function showAll() {
        self::check_logged_in_admin();
        $tilaukset = Tilaus::findByDoctor(BaseController::get_admin_logged_in()->id);
        $_SESSION['tilaukset']= $tilaukset;
        View::make('tilaukset/tilaukset.html', array('tilaukset' => $tilaukset));
    }

    public static function store() {
        self::check_logged_in();
        $params = $_POST;
        $laakari_id = Laakari::findByName($params['laakari'])->id;
        $potilas_id = BaseController::get_user_logged_in()->id;
        
        $tilaus = new Tilaus(array(
            'potilas_id' => $potilas_id,
            'laakari_id' => $laakari_id,
            'paivamaara' => $params['paivamaara'],
            'oireet' => $params['oireet']
        ));
        $tilaus->save();
        

        Redirect::to('/', array('success' => 'Lääkäri tilattu!'));
    }

    public static function destroy($id) {
        self::check_logged_in_admin();
        $tilaus = new Tilaus((array('id'=>$id)));
        
        $tilaus->destroy($id);
        
        Redirect::to('/tilaukset');
        
    }
}
