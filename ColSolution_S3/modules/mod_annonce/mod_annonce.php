<?php

require_once 'cont_annonce.php';

class ModAnnonce{

    private $controleur;
    private $action;

    public function __construct() {
        $this->controleur = new ContAnnonce();   
        $this->action = $this->choixAction();  

        $this->controleur->affichagePage($this->action); 
        
    }    	

    public function choixAction() { 
        if (isset($_GET['action'])) { 
            return $_GET['action'];
        }
        else {
            return 'newAnnonce';    
        }
    }
    

}


?>