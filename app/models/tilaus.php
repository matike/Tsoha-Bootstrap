<?php

class Tilaus extends BaseModel {

    public $id, $potilas_id, $laakari_id, $paivamaara, $oireet;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function findByDoctor($laakari_id) {
        $query = DB::connection()->prepare('SELECT * FROM Kaynti WHERE laakari_id = :laakari_id');
        $query->execute(array('laakari_id' => $laakari_id));
        $rows = $query->fetchAll();

        $tilaukset = array();

        foreach ($rows as $row) {
            if ($row) {
                $tilaukset[] = new Tilaus(array(
                    'id' => $row['id'],
                    'laakari_id' => $row['laakari_id'],
                    'potilas_id' => $row['potilas_id'],
                    'oireet' => $row['oireet'],
                    'paivamaara' => $row['paivamaara']
                ));
            }
        }
        return $tilaukset;
    }

    public function save() {

        $query = DB::connection()->prepare('INSERT INTO Kaynti (potilas_id, laakari_id, oireet, paivamaara) VALUES (:potilas_id, :laakari_id, :oireet, :paivamaara) RETURNING id');
        $query->execute(array('potilas_id' => $this->potilas_id, 'laakari_id' => $this->laakari_id, 'oireet' => $this->oireet, 'paivamaara' => $this->paivamaara));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kaynti WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $kaynti = new Tilaus(array(
                'id' => $row['id'],
                'laakari_id' => $row['laakari_id'],
                'potilas_id' => $row['potilas_id'],
                'oireet' => $row['oireet'],
                'paivamaara' => $row['paivamaara']
            ));

            return $kaynti;
        }
        return null;
    }

    public static function destroy($id) {
        $query = DB::connection()->prepare('DELETE FROM Kaynti WHERE id = :id');
        $query->execute(array('id' => $id));
    }

}
