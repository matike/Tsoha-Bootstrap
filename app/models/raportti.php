<?php

class Raportti extends BaseModel {

    public $id, $potilas_id, $laakari_id, $kaynti_id, $kuvaus;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Raportti');

        $query->execute();

        $rows = $query->fetchAll();
        $raportti = array();

        foreach ($rows as $row) {

            $raportti[] = new Raportti(array(
                'id' => $row['id'],
                'potilas_id' => $row['potilas_id'],
                'laakari_id' => $row['laakari_id'],
                'kaynti_id' => $row['kaynti_id'],
                'kuvaus' => $row['kuvaus']
            ));
        }
        return $raportti;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Raportti WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $raportti = new Raportti(array(
                'id' => $row['id'],
                'potilas_id' => $row['potilas_id'],
                'laakari_id' => $row['laakari_id'],
                'kaynti_id' => $row['kaynti_id'],
                'kuvaus' => $row['kuvaus']
            ));

            return $raportti;
        }
        return null;
    }

    public function save() {
        $params = $_POST;

        $query = DB::connection()->prepare('INSERT INTO Raportti (potilas_id, laakari_id, kaynti_id, kuvaus) VALUES (:potilas_id, :laakari_id, :kaynti_id, :kuvaus) RETURNING id');
        $query->execute(array('potilas_id' => $this->potilas_id, 'laakari_id' => $this->laakari_id, 'kaynti_id' => $this->kaynti_id, 'kuvaus' => $this->kuvaus));
        $row = $query->fetch();
        $this->id = $row['id'];
        
    }
} 