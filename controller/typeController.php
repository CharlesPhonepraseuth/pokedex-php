<?php

/**
 * Render the page with pokemons type
 */
function typesPage() {
    // instantiate TypesManager to call the findAll function
    $typesManager = new \Project\Pokedex\Model\TypesManager;
    $datas = $typesManager->findAll();

    // the results will be received by the view to render all type
    require('view/typesView.php');
};

/**
 * Render the page with pokemons filtered by types
 */
function pokemonsByType($number) {
    // instantiate TypesManager to call the findByType function
    $typesManager = new \Project\Pokedex\Model\TypesManager;
    $datas = $typesManager->findByType($number);

    // the results will be received by the view to render pokemons depend on the choosen type
    require('view/homeView.php');
};