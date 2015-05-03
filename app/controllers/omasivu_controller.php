<?php




class OmasivuController extends BaseController {

    public static function index() {
        self::check_logged_in();
        $ohjeet = Ohje::findAllById(self::get_user_logged_in()->id);

        View::make('omasivu.html', array('ohjeet' => $ohjeet));
    }
}