<?php

namespace Lib\Controleur;
use \Lib\Vue;
use Lib\Modele\Billet;

class ControleurAccueil  {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }
    /**
     * Génération de la page d'accueil
     */
    public function accueil() {
        /** @var  $vue */
        $billets = $this->billet->getBilletsRecents();
        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets));
    }

}

