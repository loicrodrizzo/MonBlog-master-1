<?php


namespace Lib\Controleur;


use Lib\Modele\Billet;
use Lib\Vue;

class ControleurPages
{
    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }
    // Affiche la liste de tous les billets du blog
    public function bibliographiePage()
    {
        /** Géneration de la page Bibliographie  */
        $vue = new Vue("Bibliographie");
        $vue->generer(array(' ' => " "));
    }
    /** Géneration de la page de contact  */
    public function contactPage()
    {
        $vue = new Vue("Contact");
        $vue->generer(array(' ' => " "));
    }
    /** Géneration de la page des Romans */
    public function RomansPage()
    {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Romans");
        $vue->generer(array('billets' => $billets));
    }
}