<?php

require('model/Router.php');
require('controller/mainController.php');

// autoloader function (Class)
function autoLoader($classe) {
    // example : require_once('model/PokemonManager.php');
    // explode is for extract only the classname instead of classname with namespace
    // example : \Project\Pokedex\Model\PokemonManager
    // explode(...)[1] will be the specific part of the string we need (PokemonManager)
    require_once('model/' . explode('\\Model\\', $classe)[1] . '.php');
};
spl_autoload_register('autoLoader');

$router = new \Project\Pokedex\Model\Router;

$router->get('/', function() { homePage(); });
$router->get('/pokemon/{:num}', function($pokemonNumber) { pokemonPage((int)$pokemonNumber); });

$router->listen();
