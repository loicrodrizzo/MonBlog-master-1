<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        /** @var  $commentaires -----------------    Commentaires imbriqués*/
        $commentaires = $this->commentaire->afficherCommentaires($idBillet); // On utilise la méthode getBillet qui se situe dans Billet.php
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet ,$idParent) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet , $idParent); // On utilise la méthode ajouterCommentaire qui se situe dans Commentaire.php
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

    // Ajoute un un billet
    public function creation($auteur, $contenu) {
        $this->billet->ajouterBillet($auteur, $contenu); // On utilise la méthode ajouterBillet qui se situe dans Modele/Commentaire.php
    }

    // Supprimer un billet
    public function supprimer($idBillet) {
        $this->billet->deleteBillet($idBillet); // On utilise la méthode supprimerBillet qui se situe dans Modele/Commentaire.php
    }



}

