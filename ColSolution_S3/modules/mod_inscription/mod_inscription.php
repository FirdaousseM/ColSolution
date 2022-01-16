<?php

require_once 'cont_inscription.php';


class ModInscription{

    private $controleurr;

    public function __construct(){

        $this->controleurr = new ContInscription();

        
        switch($this->controleurr->action){
            case "inscription":
                $this->controleurr->inscription();
            break;
            case "deconnexion" :
                $this->controleurr->deconnexion();
            break;      
        }
		
	}
}
 
?>