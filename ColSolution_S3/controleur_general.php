<?php



class ContGeneral {

    public $moduleDemande;
    public $moduleChoisi;

    public function __construct() {
        $this->moduleDemande = $this->choixModule();
        $this->lancementModule();
    }

    public function choixModule() { 
        if (isset($_GET['module'])) { 
            return $_GET['module'];
        }
        else {
            return 'mod_accueil';    
        }
    }

    public function lancementModule() {
		
        require_once "modules/$this->moduleDemande/$this->moduleDemande.php";

        switch($this->moduleDemande){
	
            case 'mod_accueil': $this->moduleChoisi = new ModAccueil(); 
            break;
            case 'mod_compte': $this->moduleChoisi = new ModCompte(); 
            break;
            case 'mod_annonce': $this->moduleChoisi = new ModAnnonce();
            break;
            
	    }   
    }

}
?>