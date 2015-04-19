<?php

class UserController extends BaseController {

    public static function login() {
        View::make('suunnitelmat/user/login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $user = User::authenticate($params['id'], $params['salasana']);

        if (!$user) {
            View::make('suunnitelmat/user/login.html', array('error' => 'Väärä asiakasnumero tai salasana', 'id' => $params['id']));
        } else {
            $_SESSION['user'] = $user->id;

            Redirect::to('/', array('message' => 'Tervetuloa takaisin' . $user->nimi . '!'));
        }
    }

    public static function logout() {
        $_SESSION['user'] = null;
        Redirect::to('/login', array('message' => 'Olet kirjautunut ulos.'));
    }

    public static function register() {
        View::make('suunnitelmat/user/register.html');
    }

    public static function handle_register() {
        $params = $_POST;
        $user = new User(array(
            'nimi' => $params['nimi'],
            'osoite' => $params['osoite'],
            'email' => $params['email'],
            'salasana' => $params['salasana']
        ));

        $user->save();
        Redirect::to('/');
    }

}
