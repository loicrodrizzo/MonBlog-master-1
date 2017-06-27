<?php

namespace Lib\Controleur;

use \Lib\Vue;
use \Lib\Modele as LM;

class ControleurConnexion {

    private $connect;

    public function __construct() {
        $this->connect = new LM\Connexion();
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