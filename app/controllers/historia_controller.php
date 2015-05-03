<?php

class HistoriaController extends BaseController {

    public static function index($id) {
        self::check_logged_in_admin();
        $historia = Historia::findByPotilasId($id);
        $potilas = Potilas::find($id);

        View::make('/historia.html', array('historia' => $historia, 'potilas' => $potilas));
    }

    public static function save($id) {
        self::check_logged_in_admin();
        $params = $_POST;

        $historia = new Historia(array(
            'id' => $params['id'],
            'potilas_id' => $id,
            'historia' => $params['historia']
        ));
        $row = Historia::find($params['id']);
        if ($row) {
            $historia->update();
        } 
        else {
        $historia->save();
        }
        
        Redirect::to('/potilaat');
    }

    public static function update($id) {
        self::check_logged_in_admin();
        $params = $_POST;

        $historia = new Historia(array(
            'id' => $params['id'],
            'potilas_id' => $id,
            'historia' => $params['historia']
        ));

        $historia->update();
        Redirect::to('/potilaat');
    }
    
    public static function destroy() {
        self::check_logged_in_admin();
        $params = $_POST;
        
        $historia = new Historia(array('id' => $params['id']
                ));
        $historia->destroy();
        
        Redirect::to('/potilaat');
    }

}
