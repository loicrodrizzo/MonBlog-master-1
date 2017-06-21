<?php


/** A mettre dans LIB */

class Autoloader{

    /** Améliorer l'Autoloader */


    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    static function autoload($class_name){
        require 'Controleur/'. $class_name . '.php';
    }


}