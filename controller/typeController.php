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
