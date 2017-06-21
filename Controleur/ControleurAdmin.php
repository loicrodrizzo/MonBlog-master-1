<?php
/**
CONTROLEUR POUR GERER UN COMPTE ADMIN
 */


require_once 'Modele/Admin.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurAdmin {

    private $billets;
    private $connect;
    private $commentaires;

    public function __construct() {
        $this->billets = new Billet();
        $this->connect = new Admin();
        $this->commentaires = new Commentaire();
    }

// Affiche la liste de tous les billets du blog
    public function AdminPage() {
        $billets = $this->billets->getBillets();
        $connect = $this->connect->getAdmin();
        $commentaires = $this->commentaires->getNombreCommentaires();
        $vue = new Vue("Admin");
        $vue->generer(array('billets' => $billets , 'connect' => $connect));

    }



}

