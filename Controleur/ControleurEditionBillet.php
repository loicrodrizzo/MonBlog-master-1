<?php

require_once 'Modele/EditionBillet.php';
require_once 'Vue/Vue.php';

class ControleurEditionBillet {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function editPage() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Edition");
        $vue->generer(array('billets' => $billets));

    }

}

