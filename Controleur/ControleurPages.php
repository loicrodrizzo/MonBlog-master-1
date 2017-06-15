<?php
/**
 * Created by PhpStorm.
 * User: lOÏC RODRIGUEZ
 * Date: 12/06/2017
 * Time: 17:58
 */
require_once 'Modele/Connexion.php';
require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

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
        $vue->generer(array());
    }

    /** Géneration de la page de contact  */
    public function contactPage()
    {
        $vue = new Vue("Contact");
        $vue->generer(array());
    }

    /** Géneration de la page des Romans */
    public function RomansPage()
    {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Romans");
        $vue->generer(array('billets' => $billets));

    }

}