<?php

class OhjeController extends BaseController {

    public static function index($id) {
        $ohjeet = Ohje::findAllById($id);

        View::make('ohjeet/ohjeet.html', array('ohjeet' => $ohjeet));
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

        Redirect::to('/potilaat/potilaat');
    }
    
}