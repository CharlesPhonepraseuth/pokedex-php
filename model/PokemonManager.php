<?php

namespace Project\Pokedex\Model;

require_once("model/Manager.php");

class PokemonManager extends Manager {
    public function findAll() {
        $db = $this->dbConnect();
        $results = $db->query('SELECT * FROM pokemon');

        return $results;
    }

    public function findOne($number) {
        $db = $this->dbConnect();
        $result = $db->prepare('SELECT * FROM pokemon WHERE numero = ?');
        $result->execute([$number]);
        
        return $result;
    }

    public function getPokemonTypes($number) {
        $db = $this->dbConnect();
        $result = $db->prepare(
            'SELECT * FROM type
            JOIN pokemon_type ON type.id = pokemon_type.type_id
            WHERE pokemon_type.pokemon_numero = ?'
        );
        $result->execute([$number]);

        return $result;
    }
};