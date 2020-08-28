<?php $title = 'Types' ?>
<?php ob_start() ?>

<?php while( $type = $datas->fetch()): ?>
    <a href='/type/<?= $type['id'] ?>' class="link--type" style="background-color: #<?= $type['color'] ?>"><?= $type['name'] ?></a>
<?php endwhile; ?>

</main>

<?php
$content = ob_get_clean();
require('template.php');
?>