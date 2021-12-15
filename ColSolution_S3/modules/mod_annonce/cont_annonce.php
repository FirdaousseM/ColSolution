<?php

include_once 'modele_annonce.php';
include_once 'vue_annonce.php';

class ContAnnonce {

    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleAnnonce();
        $this->vue = new VueAnnonce();
    }
    
    public function affichagePage($action){
         
        switch($action){

            case 'newAnnonce': $this->vue->depotAnnonceAffichage(); 
            break;
            case 'chercheAnnonce': ; 
            break;
            case 'consultAnnonce': ;
            break;
        }      
    }

    /*
    * On récupère, de la Vue, les données rentrées par User,
    * et on les envoie, au modèle, pour faire le insert en SQL
	*/
    public function ajouterAnnonce() {
		
		
		if ($this->action == 'ajout'){
			
			$identifiant = isset($_POST['identifiant']) ? $_POST['identifiant'] : NULL;
			$nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
			$desc = isset($_POST['desc']) ? $_POST['desc'] : NULL;
            $desc = isset($_POST['desc']) ? $_POST['desc'] : NULL;
			$desc = isset($_POST['desc']) ? $_POST['desc'] : NULL;


			$this->m->ajout($identifiant, $nom, $desc);
		}
		echo '<br/>'.$this->action;

	}


}
?>