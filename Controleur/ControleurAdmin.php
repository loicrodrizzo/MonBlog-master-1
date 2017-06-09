<?php
/**
CONTROLEUR POUR GERER UN COMPTE ADMIN
 */


require_once 'Modele/Admin.php';
require_once 'Vue/Vue.php';

class ControleurAdmin {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function AdminPage() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Admin");
        $vue->generer(array('billets' => $billets));

    }



}

