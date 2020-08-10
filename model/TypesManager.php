<?php

namespace Project\Pokedex\Model;

require_once("model/Manager.php");

class TypesManager extends Manager {
    public function findAll() {
        $db = $this->dbConnect();
        $results = $db->query('SELECT * FROM type');

        return $results;
    }

    public function findByType($number) {
        $db = $this->dbConnect();
        $results = $db->prepare(
            'SELECT * FROM pokemon
            JOIN pokemon_type ON pokemon.numero = pokemon_type.pokemon_numero
            WHERE pokemon_type.type_id = ?'
        );
        $results->execute([$number]);

        return $results;
    }
};