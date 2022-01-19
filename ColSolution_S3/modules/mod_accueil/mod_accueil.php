<?php

require_once 'cont_accueil.php';

class ModAccueil{

    private $controleur;

    public function __construct() { 
        $this->controleur = new ContAccueil();
        $this->controleur->dernieresAnnonces();
    }

}


?>