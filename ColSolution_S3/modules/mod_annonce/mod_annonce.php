<?php

require_once 'cont_annonce.php';


class ModAnnonce{

    public $controleur;

    public function __construct(){
		    $this->controleur = new ContAnnonce();
   
        switch($this->controleur->action){
            case "depotAnnonce":
              $this->controleur->deposerAnnonce();
                break;
            case "consultAnnonce":
              $this->controleur->consulterAnnonce();
              break;
            case "mesAnnonces":
                $this->controleur->mesAnnonces();
                break;
            case "supprimer":
              $this->controleur->supprimer();
              break;
        }
	}
}
 
?>