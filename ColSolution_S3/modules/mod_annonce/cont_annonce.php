<?php

include_once 'modele_annonce.php';
include_once 'vue_annonce.php';

class ContAnnonce {

    private $modele;
    private $vue;
    public $action;

    public function __construct() {
        //$this->modele = new ModeleAnnonce();
        $this->vue = new VueAnnonce();
    }
    
    public function choixAction() { 
       
        
    }

    public function affichage(){

        switch($this->action){
            
            case 'depotAnnonce': $this->vue->depotAnnonceAffichage(); 
            break;
            /*
            case 'annonceDeposee': 
                echo 'test4';
                $this->vue->depotAnnonceAffichage();
                $this->ajouterAnnonce();
            break;
            case 'chercheAnnonce': ; 
            break;
            case 'consultAnnonce': ;
            break;
             */
        }
    }
    
    /*
    * On récupère, de la Vue, les données rentrées par User,
    * et on les envoie, au modèle, pour faire le insert en SQL
	*/
    /*
    public function ajouterAnnonce() {
        
        echo 'test5';
        $titre = isset($_POST['titre']) ? $_POST['titre'] : NULL;
        $type = isset($_POST['type']) ? $_POST['type'] : NULL;
        $superficie = isset($_POST['superficie']) ? $_POST['superficie'] : NULL;
        $nbChambre = isset($_POST['nbChambre']) ? $_POST['nbChambre'] : NULL;
        $prix = isset($_POST['prix']) ? $_POST['prix'] : NULL;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : NULL;

        $idLogement = $this->modele->ajoutLogement($superficie, $type, $nbChambre, $prix);
        $this->modele->depotAnnonce($desc, $idImage, $idLogement);
        

	}


    public function getVue(){
        return $this->vue;
    }
    */
}

?>