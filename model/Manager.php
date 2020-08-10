<?php

namespace Project\Pokedex\Model;

class Manager {
    protected function dbConnect() {
        // the config.php includes the informations to connect the database
        require('config.php');
        $properties = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
        $db = new \PDO($sql_type.':host='.$sql_server.';dbname='.$sql_db, $sql_user, $sql_pass, $properties);
        return $db;
    }
}
