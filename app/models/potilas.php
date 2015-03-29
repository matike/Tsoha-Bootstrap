<?php

class Potilas extends BaseModel {

    public $id, $nimi, $osoite, $email, $salasana;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Potilas');
        $query->execute();
        $rows = $query->fetchAll();
        $potilaat = array();

        foreach ($rows as $row) {
            $potilaat[] = new Potilas(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'osoite' => $row['osoite'],
                'email' => $row['email'],
                'salasana' => $row['salasana'],
            ));
        }

        return $potilaat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Potilas WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $potilas = new Potilas(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'osoite' => $row['osoite'],
                'email' => $row['email'],
                'salasana' => $row['salasana'],
            ));
            return $potilas;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Potilaat (nimi, osoite, email, salasana) VALUES (:nimi, :osoite, :email, :salasana) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'osoite' => $this->osoite, 'email' => $this->email, 'salasana' => $this->salasana));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

}
