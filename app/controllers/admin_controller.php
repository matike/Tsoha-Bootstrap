<?php

class AdminController extends BaseController {

    public static function login() {
        View::make('/user/adminlogin.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $admin = Admin::authenticate($params['id'], $params['salasana']);

        if (!$admin) {
            View::make('/user/adminlogin.html', array('error' => 'Väärä tunnus tai salasana', 'id' => $params['id']));
        } else {
            $_SESSION['admin'] = $admin->id;

            Redirect::to('/', array('message' => 'Tervetuloa takaisin' . $admin->nimi . '!'));
        }
    }
}