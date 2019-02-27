<?php
require_once __DIR__ . '/../config/functions.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/data-base.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ventevoiture</title>
<!-- Bootstrap core CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/css/main.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php"><?php echo $siteName?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php
      //gestion du menu dynamique
      $menuItems = [
          ['label'=> 'Accueil','Link'=> 'index.php'],
          ['label'=> 'Ajouter une voiture','Link'=> 'add-car.php']
      ];
      ?>

        <ul class="navbar-nav mr-auto">
          <?php
          foreach($menuItems as $items){ ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo $items['Link']; ?>"><?php echo $items['label'];?></a>

            </li>
          <?php } ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sign-up.php">
                Inscription
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">
                Login
              </a>
            </li>
        </ul>
      </div>
    </div>
  </nav>