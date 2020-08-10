<?php $title = 'Accueil' ?>
<?php ob_start() ?>

<?php
while ($pokemon = $datas->fetch()): ?>
    <div class="thumbnail">
      <a href="/pokemon/<?= $pokemon['numero'] ?>">
        <img src="/public/images/<?= $pokemon['numero'] ?>.png" alt="Illustration de <?= $pokemon['nom'] ?>">
        <span><?= $pokemon['nom'] ?></span>
      </a>
    </div>
<?php endwhile ?>

<?php
$content = ob_get_clean();
require('template.php');
?>