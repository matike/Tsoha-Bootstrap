<?php

class BaseController {

    public static function get_admin_logged_in() {
        if (isset($_SESSION['admin'])) {
            $admin_id = $_SESSION['admin'];
            $admin = Admin::find($admin_id);
            return $admin;
        }
        return null;
    }

    public static function get_user_logged_in() {

        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user'];
            $user = User::find($user_id);
            return $user;
        }
        return null;
    }

    public static function check_logged_in_admin() {
        if (!isset($_SESSION['admin'])) {
            Redirect::to('/');
        }
    }

    public static function check_logged_in() {
        if (!isset($_SESSION['user'])) {
            Redirect::to('/login', array('message' => 'kirjaudu sisään'));
        }
    }

}
