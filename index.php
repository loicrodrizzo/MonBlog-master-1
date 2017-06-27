<?php

/** CHARGEMENT DES CLASSES A L'AIDE DE L'AUTOLOADER */

session_start();

require_once 'Lib/Autoloader.php';

use Lib\Autoloader;

Autoloader::register();

require_once 'Lib/Routeur.php';

use Lib\Routeur;

$routeur = new Lib\Routeur();
$routeur->routerRequete();

