<?php

namespace Lib\Controleur;
use \Lib\Vue;

class ControleurAccueil  {


    /**
     * Génération de la page d'accueil
     */
    public function accueil() {
        /** @var  $vue */
        $vue = new Vue("Accueil");
        $vue->generer(array('' => ""));
    }

}

