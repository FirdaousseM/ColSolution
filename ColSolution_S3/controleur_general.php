<?php



class ContGeneral {

    public $moduleDemande;
    public $moduleChoisi;

    public function __construct() {
        $this->moduleDemande = $this->choixModule();
    }

    public function choixModule() { 
        if (isset($_GET['module'])) { 
            return $_GET['module'];
        }
        else {
            return 'mod_accueil';    
        }
    }



}
?>