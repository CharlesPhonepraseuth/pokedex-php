<?php

require('model/Router.php');
require('controller/mainController.php');
require('controller/typeController.php');
require('controller/searchController.php');
require('controller/teamController.php');

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

$router->get('/types', function() { typesPage(); });
$router->get('/type/{:num}', function($typeNumber) { pokemonsByType((int)$typeNumber); });

$router->post('/search', function() { searchResults(); });
// if the user refresh /search, it will redirect to homePage because $_POST['nom'] from /search form is undefined
$router->get('/search', function() {
    header('Location: http://localhost:3000/');
    exit();
});

$router->get('/team', function() { teamPage(); });
$router->get('/team/add/{:num}', function($pokemonNumber) { addToTeam((int)$pokemonNumber); });
$router->get('/team/delete/{:num}', function($pokemonNumber) { deleteFromTeam((int)$pokemonNumber); });

$router->whenNotFound(function() { require('view/404View.php'); });

$router->listen();
