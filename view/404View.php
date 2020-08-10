<?php $title = '404 Not Found' ?>
<?php ob_start() ?>

<img src="/public/images/NotFound.png" alt="Sad Pikachu" class="notFound">
<img src="/public/images/NotFound404.png" alt="404 Not Found" class="notFound404">

<?php
$content = ob_get_clean();
require('template.php');
?>