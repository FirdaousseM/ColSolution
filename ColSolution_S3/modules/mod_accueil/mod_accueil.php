<?php

require_once('vue_accueil.php');

class ModAccueil{

    private $controlleur;
    private $vue;

    public function __construct() { 
        $vue = new VueAccueil();
    
    }

}


?>