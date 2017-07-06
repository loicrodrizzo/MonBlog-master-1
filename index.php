
<?php

session_start();


/** CHARGEMENT DES CLASSES A L'AIDE DE L'AUTOLOADER */

require_once 'Lib/Autoloader.php';
use Lib\Autoloader;
Autoloader::register();


/** CHARGEMENT DU ROUTEUR */

require_once 'Lib/Routeur.php';
use Lib\Routeur;

/** LANCEMENT DU ROUTEUR */

$routeur = new Lib\Routeur();
$routeur->routerRequete();

