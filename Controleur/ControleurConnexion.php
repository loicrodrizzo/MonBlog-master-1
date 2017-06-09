<?php

require_once 'Modele/Connexion.php';
require_once 'Vue/Vue.php';

class ControleurConnexion {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function connexionPage() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Connexion");
        $vue->generer(array('billets' => $billets));

    }



}

