<?php
/**
CONTROLEUR POUR GERER UN COMPTE UTILISATEUR
 */


require_once 'Modele/User.php';
require_once 'Vue/Vue.php';

class ControleurUser {

    private $user;


    public function __construct() {
        $this->user = new User();

    }

// Affiche la liste de tous les billets du blog
    public function UserPage($id) {
        $billets = $this->user->getUser($id);
        $vue = new Vue("User");
        $vue->generer(array('' => $billets));

    }




}

