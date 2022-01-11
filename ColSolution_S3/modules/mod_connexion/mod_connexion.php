<?php

require_once 'cont_connexion.php';


class ModConnexion{

    public $controleurr;

    public function __construct(){
		$this->controleurr = new ContConnexion();

        switch($this->controleurr->action){
            case "connexion":
                $contenu = $this->controleurr->form_connexion();
                $this->controleurr->connexion();
                break;
            case "deconnexion":
                $this->controleurr->deconnexion();
                break;
        }
		
	}
}
 
?>