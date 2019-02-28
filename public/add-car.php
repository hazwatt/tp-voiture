<?php
// On inclus le fichier header.php sur la page
include(__DIR__.'/../partials/header.php');

$Photo = null;
$Marque = null;
$Modele = null;
$Prix = null;
$Annee_de_sortie = null;

if(!empty($_POST)){
    $Marque = $_POST['Marque'];
    $Modele = $_POST['Modele'];
    $Prix = $_POST['Prix'];
    $Annee_de_sortie = $_POST['Annee_de_sortie'];
    $Photo = $_FILES['Photo'];
    $error = [];

    if(empty($Marque)){
        $error['Marque'] ='Le nom de la marque n\' est pas valide';
    }else if(strlen($Marque) < 2){
        $error['Marque'] = 'La marque requiert 2 caracteres minimum';
    }
    if(empty($Modele)){
        $error['Modele'] = 'Le nom du modèle n\' est pas valide';
    }
    if(empty($Prix)){
        $error['Prix'] = 'Le Prix n\' est pas correct';
    }else if(intval($Prix) < 10000){
        $error['Prix'] = 'Le Prix n\'e peut pas etre inferieur a 10 000€';
    }
    if(empty($Annee_de_sortie)){
        $error['Annee_de_sortie'] = 'L\' Année de sortie n\' est pas correct';
    }
    if ($Photo['error'] === 0) {
        $tmpFile = $Photo['tmp_name'];
        $fileName = $Photo['name'];
        $fileName = substr(md5(time()), 0, 8) . '_' . $fileName;
        move_uploaded_file($tmpFile, __DIR__.'/assets/img/'.$fileName);
        $Photo = $fileName;
    } else {
        $Photo = null;
    }
    if (exif_imagetype('assets/img/'.$Photo) != IMAGETYPE_JPEG) {
        if (exif_imagetype('assets/img/'.$Photo) != IMAGETYPE_PNG) {
           if (exif_imagetype('assets/img/'.$Photo) != IMAGETYPE_GIF) {
                die('cette image pas bon') ;
            }
        }
    }
    if (empty($error)) {
        $query = $db->prepare('INSERT INTO cars (Photo, Marque, Modele, Prix, Annee_de_sortie) VALUES (:Photo, :Marque, :Modele, :Prix, :Annee_de_sortie)');
        $query->bindValue(':Photo', $Photo);
        $query->bindValue(':Marque', $Marque);
        $query->bindValue(':Modele', $Modele);
        $query->bindValue(':Prix', $Prix);
        $query->bindValue(':Annee_de_sortie', $Annee_de_sortie);
        
        if ($query->execute()) {
            echo '<div class="alert alert-success">La voiiture a bien été ajouté.</div>';
        }
    }
}
// S'il y a des erreurs
if (!empty($error)) {
    echo '<div class="alert alert-danger">';
    echo '<p>Le formulaire contient des erreurs</p>';
    echo '<ul>';
    foreach ($error as $field => $errore) {
        echo '<li>'.$field.' : '.$errore.'</li>';
    }
    echo '</ul>';
    echo '</div>';
}
?>
<div class="row">
        <div class="col-md-6 offset-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Marque">Marque *</label>
                    <input type="text" name="Marque" id="Marque" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Modele">Modèle *</label>
                    <input type="text" name="Modele" id="Modele" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Prix">Prix *</label>
                    <input type="text" name="Prix" id="Prix" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Annee_de_sortie">Annee de sortie *</label>
                    <select name="Annee_de_sortie" id="Annee_de_sortie" class="form-control">
                        <?php
                        $dateactuel = date('Y');
                        for($date = 1951; $date <= $dateactuel ; $date++){
                           ?> <option value="<?= $date ?>"> <?php echo $date; ?> </option> <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Photo">Photo *</label>
                    <input type="file" name="Photo" id="Photo" class="form-control">
                </div>
                    <button class="btn btn-primary btn-block">Ajouter une voiture</button>
            </form>
        </div>
    </div>


