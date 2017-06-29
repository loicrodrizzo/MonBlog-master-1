<?php

namespace Lib\Controleur;


use \Lib\Vue;

use \Lib\Modele as LM;


class ControleurBillet {


    private $billet;
    private $commentaire;


    public function __construct() {
        $this->billet = new LM\Billet();
        $this->commentaire = new LM\Commentaire();
    }
    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);

        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }
    public function editPage($idBillet){
        $billet = $this->billet->editerBillet($idBillet);
        $vue = new Vue("Edition");
        $vue->generer(array('billet' => $billet));
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
    public function update($titre, $contenu, $idBillet)
    {
        $this->billet->updateBillet($titre, $contenu, $idBillet);
        $this->billet($idBillet);
    }


    public function creationBillet(){
        $billets = $this->billet->getBillets();
        $vue = new Vue("Creation");
        $vue->generer(array('billets' => $billets));
    }

    public function signaler($idCommentaire)
    {
        $this->commentaire->signalerCommentaire($idCommentaire);
    }
}
