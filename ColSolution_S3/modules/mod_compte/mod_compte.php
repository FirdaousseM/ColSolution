<?php

require_once 'cont_compte.php';

class ModCompte{

  public $controlerr;

  public function __construct(){
		$this->controlerr = new ContCompte();
        
    switch($this->controlerr->action){
      case "compte":
        $this->controlerr->form_compte();
      break;
        
      case "deconnexion" :
        $this->controlerr->deconnexion();
      break;
        }
		
	}
}
 
?>