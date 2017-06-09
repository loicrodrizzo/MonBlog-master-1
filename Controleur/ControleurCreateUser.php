<?php
/**
    CONTROLEUR POUR CREER UN COMPTE UTILISATEUR
 */


require_once 'Modele/CreateUser.php';
require_once 'Vue/Vue.php';

class ControleurCreateUser {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function CreateUserPage() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("CreateUser");
        $vue->generer(array('billets' => $billets));

    }



}

