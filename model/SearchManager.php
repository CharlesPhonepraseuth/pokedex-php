<?php

namespace Project\Pokedex\Model;

require_once("model/Manager.php");

class SearchManager extends Manager {
    public function findByLikeName($name) {
        $db = $this->dbConnect();
        $results = $db->prepare('SELECT * FROM pokemon WHERE nom LIKE ?');
        $results->execute(["%$name%"]);
        
        return $results;
    }
};