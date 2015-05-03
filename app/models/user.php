<?php

Class User extends BaseModel {

    public $id, $asiakasnumero, $nimi, $osoite, $email, $salasana;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function authenticate($asiakasnumero, $salasana) {
        $query = DB::connection()->prepare('SELECT * FROM Potilas WHERE asiakasnumero = :asiakasnumero AND salasana = :salasana LIMIT 1');
        $query->execute(array('asiakasnumero' => $asiakasnumero, 'salasana' => $salasana));
        $row = $query->fetch();

        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'asiakasnumero' => $row['asiakasnumero'],
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
                'asiakasnumero' => $row['asiakasnumero'],
                'nimi' => $row['nimi'],
                'osoite' => $row['osoite'],
                'email' => $row['email'],
                'salasana' => $row['salasana']
            ));

            return $user;
        }
        return null;
    }

    public static function findByAsiakasnumero($asiakasnumero) {
        $query = DB::connection()->prepare('SELECT * FROM Potilas WHERE asiakasnumero = :asiakasnumero LIMIT 1');
        $query->execute(array('asiakasnumero' => $asiakasnumero));
        $row = $query->fetch();

        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'asiakasnumero' => $row['asiakasnumero'],
                'nimi' => $row['nimi'],
                'osoite' => $row['osoite'],
                'email' => $row['email'],
                'salasana' => $row['salasana']
            ));

            return $user;
        }
        return null;
    }
        public static function findByEmail($email) {
        $query = DB::connection()->prepare('SELECT * FROM Potilas WHERE email = :email LIMIT 1');
        $query->execute(array('email' => $email));
        $row = $query->fetch();

        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'asiakasnumero' => $row['asiakasnumero'],
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
        while(true) {
        $numero = rand(10000, 35000);
        $row = self::findByAsiakasnumero($numero);
        if (!$row) {
            break;
        }
        }
        $query = DB::connection()->prepare('INSERT INTO Potilas (asiakasnumero, nimi, osoite, email, salasana) VALUES (:asiakasnumero, :nimi, :osoite, :email, :salasana) RETURNING id');
        $query->execute(array('asiakasnumero' => $numero, 'nimi' => $this->nimi, 'osoite' => $this->osoite, 'email' => $this->email, 'salasana' => $this->salasana));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

}
