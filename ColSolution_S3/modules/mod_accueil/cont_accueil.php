<?php

include_once 'vue_accueil.php';
include_once 'modele_accueil.php';

class ContAccueil{

    private $modele;
    private $vue;

    public function __construct() { 
        $this->modele = new ModeleAccueil();
        $this->vue = new VueAccueil();
    }

    function getCookie() {
        $this->modele->cookie();
    }

    function filtre() {
        $this->modele->filtre();
    }

    public function dernieresAnnonces() {
        $annonce = $this->modele->infoAnnonces();
        $search = $this->modele->getSearch();

        $this->vue->affichage($annonce,$search);

    }
}


?>