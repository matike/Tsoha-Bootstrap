<?php

class Historia extends BaseModel {

    public $id, $potilas_id, $historia;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Historia');

        $query->execute();

        $rows = $query->fetchAll();
        $historiat = array();

        foreach ($rows as $row) {

            $historiat[] = new Ohje(array(
                'id' => $row['id'],
                'potilas_id' => $row['potilas_id'],
                'historia' => $row['historia']
            ));
        }
        return $historiat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Historia WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $historia = new Ohje(array(
                'id' => $row['id'],
                'potilas_id' => $row['potilas_id'],
                'historia' => $row['historia']
            ));

            return $historia;
        }
        return null;
    }

    public function save() {

        $query = DB::connection()->prepare('INSERT INTO Historia (potilas_id, historia) VALUES (:potilas_id, :historia) RETURNING id');
        $query->execute(array('potilas_id' => $this->potilas_id, 'historia' => $this->historia));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function destroy($id) {
        $query = DB::connection()->prepare('DELETE FROM Historia WHERE id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
    }

}
