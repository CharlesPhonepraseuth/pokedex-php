<?php

session_start();

/**
 * Render the team page
 */
function teamPage() {
    // declare the session to treat the view if is not set
    if (!isset($_SESSION['team'])) {
        $_SESSION['team'] = [];
    };
    
    require('view/teamView.php');
};

/**
 * Render the team page after adding the new pokemon (or not!)
 */
function addToTeam($number) {
    // firstable, we verify if the pokemon selected is already in the team
    $filteredList = array_filter($_SESSION['team'], function ($pokemon) use ($number) {
        return $pokemon['numero'] == $number;
    });
    // if we found a match, the pokemon will be inside $filteredList
    if (count($filteredList) > 0) {
        $error = 'Ce pokemon est déjà dans votre équipe.';
        return require('view/teamView.php');
    };

    // then if the team already have 6 pokemons
    if (count($_SESSION['team']) >= 6) {
        $error = 'Votre équipe comporte déjà 6 pokemons.';
        return require('view/teamView.php');
    };

    // if all the tests passed, we instantiate PokemonManager to call the findOne function
    $pokemonManager = new \Project\Pokedex\Model\PokemonManager;
    $data = $pokemonManager->findOne($number);
    $pokemon = $data->fetch();
    // to add to the team
    $_SESSION['team'][] = $pokemon;

    require('view/teamView.php');
};

/**
 * Render the team page after deleting the pokemon selected
 */
function deleteFromTeam($number) {
    // when we select the pokemon to delete, the array filter remove the selected one, and the array will be the next $_SESSION
    $_SESSION['team'] = array_filter($_SESSION['team'], function ($pokemon) use ($number) {
        return $pokemon['numero'] != $number;
    });

    require('view/teamView.php');
};
