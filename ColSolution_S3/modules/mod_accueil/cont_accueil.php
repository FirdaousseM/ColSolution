<?php

include_once 'vue_accueil.php';
include_once 'modele_accueil.php';

class ContAccueil{

    private $modele;
    private $vue;
    public $cookie;

    public function __construct() { 
        
        $this->modele = new ModeleAccueil();
        $this->vue = new VueAccueil();
        
        $this->modele->cookie();


        if (isset($_GET['cookie']))
            $cookie = $_GET['cookie'];
        else
            $cookie = "accepter";
    }

    public function affichageAccueil(){

        $tabDonnee = $this->modele->getAnnonces();    
        $tupleAnnonce = $tabDonnee["annonce"];
        $tupleImages = $tabDonnee["images"];
        $search = $tabDonnee["search"];  

        $this->vue->affichage($search, $tupleAnnonce, $tupleImages);

    }


}


?>
