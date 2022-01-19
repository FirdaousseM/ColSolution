<?php

require_once 'cont_inscription.php';


class ModInscription{

    public $controleurr;

    public function __construct(){
		    $this->controleurr = new ContInscription();

        switch($this->controleurr->action){
            case "inscription":
              $this->controleurr->inscription();
                break;
              case "deconnexion" :
                $this->controleurr->deconnexion();
               // header('Location:index.php');


        }
		
	}
}
 
?>