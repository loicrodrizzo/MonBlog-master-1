<?php

require_once 'Modele/Connexion.php';
require_once 'Vue/Vue.php';

class ControleurConnexion {


    private $connect;

    public function __construct() {

        $this->connect = new Connexion();
    }

// Affiche la liste de tous les billets du blog
    public function connexionPage() {
        $vue = new Vue("Connexion");
        $vue->generer(array(" "));

    }

    public function connect_user($username,$password) {

        $this->connect->login($username,$password);

    }

    public function disconnect_user(){
        $this->connect->logout();
    }







}

