<?php

session_start();

/**
 * Render the team page
 */
function teamPage() {
    // declare the session to treat the view
    $_SESSION['team'];

    require('view/teamView.php');
};
