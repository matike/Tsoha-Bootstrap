<?php

class HistoriaController extends BaseController {

    public static function store() {
        $params = $_POST;
        $historia = new Historia(array(
            'potilas_id' => $params['potilas_id'],
            'historia' => $params['historia'],
        ));

        $ohje->save();
        Redirect::to('/potilaat');
    }

}
