<?php

class Laakari extends BaseModel {

    public $id, $nimi, $email, $salasana;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Laakari');
        $query->execute();
        $rows = $query->fetchAll();
        $laakarit = array();

        foreach ($rows as $row) {
            $laakarit[] = new Laakari(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'email' => $row['email'],
                'salasana' => $row['salasana'],
            ));
        }

        return $laakarit;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Laakari WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $laakari = new Laakari(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'email' => $row['email'],
                'salasana' => $row['salasana'],
            ));
            return $laakari;
        }
        return null;
    }
    
    public static function findByName($nimi) {
        $query = DB::connection()->prepare('SELECT * FROM Laakari WHERE nimi = :nimi LIMIT 1');
        $query->execute(array('nimi' => $nimi));
        $row = $query->fetch();

        if ($row) {
            $laakari = new Laakari(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'email' => $row['email'],
                'salasana' => $row['salasana'],
            ));
            return $laakari;
        }
        return null;
    }

}