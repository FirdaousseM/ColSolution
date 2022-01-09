<?php



class ContGeneral {

    public $moduleDemande;
    public $moduleChoisi;

    public function __construct() {
        if (isset($_GET['module'])) { 
            $this->moduleDemande = $_GET['module'];
        }
        else {
            $this->moduleDemande = 'mod_accueil';    
        }

        
    }





}
?>
