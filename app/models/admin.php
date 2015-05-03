<?php

Class Admin extends BaseModel {

    public $id, $nimi, $email, $salasana;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function authenticate($id, $salasana) {
        $query = DB::connection()->prepare('SELECT * FROM Laakari WHERE id = :id AND salasana = :salasana LIMIT 1');
        $query->execute(array('id' => $id, 'salasana' => $salasana));
        $row = $query->fetch();

        if ($row) {
            $admin = new Admin(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'email' => $row['email'],
                'salasana' => $row['salasana']
            ));
            return $admin;
        } else {
            return null;
        }
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Laakari WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $admin = new Admin(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'email' => $row['email'],
                'salasana' => $row['salasana']
            ));

            return $admin;
        }
        return null;
    }
}
    