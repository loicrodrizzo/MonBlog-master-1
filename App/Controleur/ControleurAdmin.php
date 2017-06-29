<?php

namespace Lib\Controleur;

use \Lib\Modele as LM;
use \Lib\Vue;


class ControleurAdmin {


    public function __construct() {
        $this->billets = new LM\Billet();
        $this->connect = new LM\Admin();
        $this->commentaires = new LM\Commentaire();
    }
// Affiche la liste de tous les billets du blog
    public function AdminPage() {
        $billets = $this->billets->getBillets();
        $connect = $this->connect->getAdmin();
        $commentairesSignales = $this->commentaires->getCommentairesSignales();
        $nbCommentairesSignales = $this->commentaires->getNombreCommentairesSignales();
        $vue = new Vue("Admin");
        $vue->generer(array('billets' => $billets , 'connect' => $connect , 'commentairesSignales' => $commentairesSignales , 'nbCommentairesSignales' => $nbCommentairesSignales));
    }
}