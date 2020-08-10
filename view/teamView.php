<?php $title = 'Types' ?>
<?php ob_start() ?>

<?php if (count($_SESSION['team']) === 0): ?>
    <p>Aucun pokemon dans votre équipe !</p>
<?php endif ?>

<?php foreach ($_SESSION['team'] as $pokemon): ?>
    <div class="thumbnail">
        <a href="/pokemon/<?= $pokemon['numero'] ?>">
            <img src="/public/images/<?= $pokemon['numero'] ?>.png" alt="Illustration de <?= $pokemon['nom'] ?>">
            <span><?= $pokemon['nom'] ?></span>
        </a>
        <div>
            <a class="link--delete" href="/team/delete/<?= $pokemon['numero'] ?>">Supprimer</a>
        </div>
    </div>
<?php endforeach ?>

<?php
$content = ob_get_clean();
require('template.php');
?>
