<?php
// On inclus le fichier header.php sur la page
include(__DIR__.'/../partials/header.php');
?>
<div class="container">
    <div class="row border-row">
        <div class="col-1 gras">#
        </div>
        <div class="col-3 gras">Photo
        </div>
        <div class="col-1 gras">Marque
        </div>
        <div class="col-2 gras">Modèle
        </div>
        <div class="col-2 gras">Prix
        </div>
        <div class="col-2 gras">Année de sortie
        </div>
        <div class="col-1 gras">Actions
        </div>
    </div>
    <?php
    $i=1;
    $query = $db->query('SELECT * FROM cars');
    $cars = $query->fetchAll();
    foreach($cars as $car) {?>
    <div class="row border-row">
        <div class="col-1"><?php echo $i++; ?>
        </div>
        <div class="col-3"><div class="movie-cover" style="background-image: url(assets/img/<?= $car['Photo']; ?>)"></div>
        </div>
        <div class="col-1"><?= $car['Marque']; ?>
        </div>
        <div class="col-2"><?= $car['Modele']; ?>
        </div>
        <div class="col-2"><?= $nombre_format_francais = number_format($car['Prix'], 2, ',', ' '); ?>€
        </div>
        <div class="col-2"><?= $car['Annee_de_sortie']; ?>
        </div>
        <div class="col-1">
            <div class="row">
                <div class="col-6"><button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button></div>
                <div class="col-6"><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></div>
        </div>
        </div>
    </div>
<?php } ?>
</div>
</body>
</html>