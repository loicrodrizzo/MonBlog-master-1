<?php


class Autoloader{


    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    static function autoload($class_name){
        require 'Controleur/'. $class_name . '.php';
    }

    static function autoloadModel($class_name){
        require 'Modele/'. $class_name . '.php';
    }


}