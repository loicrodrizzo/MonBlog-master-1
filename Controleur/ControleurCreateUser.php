<?php
/**
    CONTROLEUR POUR CREER UN COMPTE UTILISATEUR
 */


require_once 'Modele/CreateUser.php';
require_once 'Vue/Vue.php';

class ControleurCreateUser {

    private $users;

    public function __construct() {
        $this->users = new User();
    }

// Affiche la liste de tous les billets du blog
    public function CreateUserPage() {

        $vue = new Vue("CreateUser");
        $vue->generer(array());

    }



}

