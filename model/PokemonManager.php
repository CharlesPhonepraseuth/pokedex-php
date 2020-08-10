<?php

namespace Project\Pokedex\Model;

require_once("model/Manager.php");

class PokemonManager extends Manager {
    public function findAll() {
        $db = $this->dbConnect();
        $results = $db->query('SELECT * FROM pokemon');

        return $results;
    }
};