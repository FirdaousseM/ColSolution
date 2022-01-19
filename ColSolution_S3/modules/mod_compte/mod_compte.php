<?php

require_once 'cont_compte.php';


class ModCompte{

    private $controlerr;

    public function __construct(){
		$this->controlerr = new ContCompte();

        switch($this->controlerr->action){
            case "compte":
                $this->controlerr->compte();
                break;
            case "admin":
                  $this->controlerr->admin();
                  break;
            case "signaler":
                   $this->controlerr->signaler();
                   break;  
            case "signalement":
                    $this->controlerr->signalement();
                    break;
            case "bannir":
                    $this->controlerr->bannir();
                    break;
            case "deconnexion" :
                $this->controlerr->deconnexion();
            default:
                    break;
        }
		
	}
}
 
?>