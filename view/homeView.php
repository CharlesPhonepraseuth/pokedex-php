<?php $title = 'Accueil' ?>
<?php ob_start() ?>

<?php while ($pokemon = $pokemons->fetch()): ?>
    <div class="thumbnail">
      <a href="/pokemon/<?= $pokemon['numero'] ?>">
        <img src="/public/images/<?= $pokemon['numero'] ?>.png" alt="Illustration de <?= $pokemon['nom'] ?>">
        <span><?= $pokemon['nom'] ?></span>
      </a>
    </div>
<?php endwhile ?>

</main>

<footer class="pagination">
  <?php for ($index = 0; $index < $maxPage; $index++): ?>
    <a href="/accueil?page=<?= $index +1 ?>&number=<?= $number ?>" class="<?php echo $currentPage = ($page === $index + 1) ? 'currentPage' : '' ?>">
      <!-- <button>Page <?# $index + 1 ?></button> -->
      Page <?= $index + 1 ?>
    </a>
  <?php endfor ?>
</footer>

<?php
$content = ob_get_clean();
require('template.php');
?>