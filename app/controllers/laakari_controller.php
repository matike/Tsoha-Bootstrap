<?php

class LaakariController extends BaseController {


   public static function showAll() {   
        $laakarit = Laakari::all();


        View::make('laakarit/laakarit.html', array('laakarit' => $laakarit));
    }

    public static function show($id) {
        $laakari = Laakari::find($id);

        View::make('laakarit/laakari.html', array('laakari' => $laakari));
    }

}
