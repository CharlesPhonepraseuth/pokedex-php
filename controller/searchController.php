<?php

/**
 * Render the page through the searchbar
 */
function searchResults() {
    // instantiate SearchManager to call the findByLikeName function
    $typesManager = new \Project\Pokedex\Model\SearchManager;
    
    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $datas = $typesManager->findByLikeName($_POST['nom']);
        
        // the result will be received by the view to render the search
        require('view/homeView.php');
        
    } else {
        // if $_POST['nom'] doesn't exist or is empty, redirect to the $router->get('/')
        header('Location: http://localhost:3000/');
        exit();
        
        // redirect version through javascript
        // echo '<script type="text/javascript">
        //        window.location = "http://localhost:3000/"
        //   </script>';
    }
};