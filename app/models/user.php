<?php

Class User extends BaseModel {

    public $id, $nimi, $osoite, $email, $salasana;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function authenticate($id, $salasana) {
        $query = DB::connection()->prepare('SELECT * FROM Potilas WHERE id = :id AND salasana = :salasana LIMIT 1');
        $query->execute(array('id' => $id, 'salasana' => $salasana));
        $row = $query->fetch();

        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'osoite' => $row['osoite'],
                'email' => $row['email'],
                'salasana' => $row['salasana']
            ));
            return $user;
        } else {
            return null;
        }
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Potilas WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'osoite' => $row['osoite'],
                'email' => $row['email'],
                'salasana' => $row['salasana']
            ));

            return $user;
        }
        return null;
    }

    public function save() {

        $query = DB::connection()->prepare('INSERT INTO Potilas (nimi, osoite, email, salasana) VALUES (:nimi, :osoite, :email, :salasana) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'osoite' => $this->osoite, 'email' => $this->email, 'salasana' => $this->salasana));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

}
