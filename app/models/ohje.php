<?php

class Ohje extends BaseModel {

    public $id, $potilas_id, $ohje, $paivamaara;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Ohje');

        $query->execute();

        $rows = $query->fetchAll();
        $ohjeet = array();

        foreach ($rows as $row) {

            $ohjeet[] = new Ohje(array(
                'id' => $row['id'],
                'potilas_id' => $row['potilas_id'],
                'ohje' => $row['ohje'],
                'paivamaara' => $row['paivamaara']
            ));
        }
        return $ohjeet;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Ohje WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $ohje = new Ohje(array(
                'id' => $row['id'],
                'potilas_id' => $row['potilas_id'],
                'ohje' => $row['ohje'],
                'paivamaara' => $row['paivamaara']
            ));

            return $ohje;
        }
        return null;
    }

    public static function findAllById($id) {
        $query = DB::connection()->prepare('SELECT * FROM Ohje WHERE potilas_id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();

        $ohjeet = array();

        foreach ($rows as $row) {
            if ($row) {
                $ohjeet[] = new Ohje(array(
                    'id' => $row['id'],
                    'potilas_id' => $row['potilas_id'],
                    'ohje' => $row['ohje'],
                    'paivamaara' => $row['paivamaara']
                ));
            }
        }
        return $ohjeet;
    }

    public function potilasOnOlemassa($id) {
        $query = DB::connection()->prepare('SELECT * FROM Potilas WHERE id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    public function save() {

        $query = DB::connection()->prepare('INSERT INTO Ohje (potilas_id, ohje, paivamaara) VALUES (:potilas_id, :ohje, :paivamaara) RETURNING id');
        $query->execute(array('potilas_id' => $this->potilas_id, 'ohje' => $this->ohje, 'paivamaara' => $this->paivamaara));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function destroy($id) {
        $query = DB::connection()->prepare('DELETE FROM Ohje WHERE id = :id');
        $query->execute(array('id' => $id));
    }


 public function update() {

        $query = DB::connection()->prepare('UPDATE Ohje SET ohje=:ohje WHERE id = :id');
        $query->execute(array('id' => $this->id, 'ohje' => $this->ohje));
    }
    }