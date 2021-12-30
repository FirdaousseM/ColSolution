<?php

require_once 'cont_annonce.php';

class ModAnnonce{

    private $controleur;

    public function __construct() {

        $this->controleur = new ContAnnonce();     
        
        if (isset($_GET['action'])) { 
            $this->controleur->action = $_GET['action'];
        }
        else {
            $this->controleur->action = 'depotAnnonce';    
        }

        $this->controleur->affichage();

    }    	    


    

}


?>