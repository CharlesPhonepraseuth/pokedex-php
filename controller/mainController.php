<?php

/**
 * Render the homepage with pokemons list (1st edition)
 */
function homePage($page, $number) {
    // instantiate PokemonManager to call the findAll function
    $pokemonManager = new \Project\Pokedex\Model\PokemonManager;
    
    $pokemons = $pokemonManager->paginate((($page - 1) * $number), $number);
    
    $count = $pokemonManager->totalNumber();
    $maxPokemon = $count->fetch();
    $maxPage = ceil((int)$maxPokemon['count'] / $number);

    // the results will be received by the view to render all pokemons
    require('view/homeView.php');
};

/**
 * Render the pokemon details page
 */
function pokemonPage($number) {
    // instantiate PokemonManager to call the findOne function
    $pokemonManager = new \Project\Pokedex\Model\PokemonManager;
    $data = $pokemonManager->findOne($number);
    $data2 = $pokemonManager->getPokemonTypes($number);
    
    // the result will be received by the view to render the pokemon selected
    require('view/pokemonView.php');
};