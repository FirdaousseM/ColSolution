<?php

require_once 'cont_modifCompte.php';


class ModModifCompte{

    public $controlerr;

    public function __construct(){
		    $this->controlerr = new ContModifCompte();

        switch($this->controlerr->action){
            case "compte":
                $this->controlerr->modifCompte();
                break;
                case "annonce":
                  $this->controlerr->modifAnnonce();
                  break;
        }
		
	}
}
 
?>