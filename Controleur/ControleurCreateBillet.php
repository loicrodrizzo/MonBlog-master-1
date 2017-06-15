<?php

require_once 'Modele/CreationBillet.php';
require_once 'Vue/Vue.php';

class ControleurCreateBillet {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function creationBillet() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Creation");
        $vue->generer(array('billets' => $billets));

    }


    // Ajoute un un billet
    public function creation($auteur, $contenu) {
        $this->billet->ajouterBillet($auteur, $contenu); // On utilise la méthode ajouterBillet qui se situe dans Modele/Commentaire.php
    }



}

