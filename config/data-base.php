<?php
/*
Ce fichier permettra de faire la connexion entre PHP et mySQL avec PDO
*/
define('DB_HOST','localhost');
define('DB_NAME','ventevoiture');
define('DB_USER','root');
define('DB_PASSWORD','');
$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',
DB_USER,
DB_PASSWORD,
[
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//actibe les erreurs SQL
//On recuperer tous les resultats en tabelau assiociatif
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]
);