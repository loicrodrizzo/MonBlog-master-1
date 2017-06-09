<?php
/**
CONTROLEUR POUR GERER UN COMPTE UTILISATEUR
 */


require_once 'Modele/User.php';
require_once 'Vue/Vue.php';

class ControleurUser {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function UserPage() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("User");
        $vue->generer(array('billets' => $billets));

    }



}

