<?php

namespace Project\Pokedex\Model;

require_once("model/Manager.php");

class TypesManager extends Manager {
    public function findAll() {
        $db = $this->dbConnect();
        $results = $db->query('SELECT * FROM type');

        return $results;
    }
};