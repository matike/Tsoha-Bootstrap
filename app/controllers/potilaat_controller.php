<?php

class PotilaatController extends BaseController {

    public static function index() {
        $potilaat = Potilas::all();
        

        View::make('potilaat/potilaat.html', array('potilaat' => $potilaat));
    }

    public static function show($id) {
        $potilas = Potilas::find($id);

        View::make('potilaat/potilas.html', array('potilas' => $potilas));
    }
    }
