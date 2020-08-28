<?php

namespace Project\Pokedex\Model;

require_once("model/Manager.php");

class PokemonManager extends Manager {
    public function totalNumber() {
        $db = $this->dbConnect();
        $result = $db->query('SELECT count(*) as count FROM pokemon');

        return $result;
    }

    public function paginate($page, $number) {
        $db = $this->dbConnect();
        // passed variables through ':var' format because '?' doesn't work
        $results = $db->prepare("SELECT * FROM pokemon LIMIT :page, :number");
        $results->bindParam(':page', $page, \PDO:: PARAM_INT);
        $results->bindParam(':number', $number, \PDO::PARAM_INT);
        $results->execute();

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