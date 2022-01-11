<?php


require_once 'cont_annonce.php';

class ModAnnonce{

    private $controleur;


    public function __construct(){
		
		$this->controleur = new ContAnnonce();
        
    switch($this->controleur->action){
     
      case "depotAnnonce":
          $this->controleur->annonce();
          $this->controleur->form_depotAnnonce();
      break;
      
      case "consultAnnonce":
          $this->controleur->consulterAnnonce();
      break;	

  }	}
}

?>