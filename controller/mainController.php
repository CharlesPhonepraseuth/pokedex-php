<?php

/**
 * Render the homepage with pokemons list (1st edition)
 */
function homePage() {
    // instantiate PokemonManager to call the findAll function
    $pokemonManager = new \Project\Pokedex\Model\PokemonManager;
    $datas = $pokemonManager->findAll();

    // the results will be received by the view to render all pokemons
    require('view/homeView.php');
};
