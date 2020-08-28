<?php $title = 'Détail' ?>
<?php ob_start() ?>

<?php $pokemon = $data->fetch() ?>
<?php $statLabel = [
    'pv' => 'PV',
    'attaque' => 'Attaque',
    'defense' => 'Défense',
    'attaque_spe' => 'Attaque Spé.',
    'defense_spe' => 'Défense Spé.',
    'vitesse' => 'Vitesse'
]; ?>

    <div class="row">
        <h1>Détails de <?= $pokemon['nom'] ?></h1>
    </div>

    <div class="row">
        <a class="link--add" href="/team/add/<?= $pokemon['numero'] ?>">+ Ajouter à mon équipe</a>
    </div>

    <div class="row row--details">
        <img src="/public/images/<?= $pokemon['numero'] ?>.png" alt="Illusatration de <?= $pokemon['nom'] ?>" class="illustration">
        <div class="details">
            <div class="name">#<?= $pokemon['numero'] ?> <?= $pokemon['nom'] ?></div>
            <div class="types">
                <?php while($type = $data2->fetch()): ?>
                    <span class="type" style="background-color: #<?= $type['color'] ?>;">
                        <?= $type['name'] ?>
                    </span>
                <?php endwhile ?>
            </div>
            
            <div class="caption--stats">Statistiques</div>
            <?php foreach ($statLabel as $key => $stat): ?>
                <div class="stats">
                    <span class="stats-name"><?= $stat ?></span>
                    <span class="stats-number"><?= $pokemon[$key] ?></span>
                    <div class="stats-base">
                            <div class="stats-percent" style="width:<?= ($pokemon[$key]/255) * 100 ?>%"></div>
                    </div>
                </div>    
            <?php endforeach ?>
        </div>
    </div>

    <div class="row">
        <a href="/">Revenir à la liste</a>
    </div>
    
</main>

<?php
$content = ob_get_clean();
require('template.php');
?>
