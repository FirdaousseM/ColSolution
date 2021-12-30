<?php

require_once 'cont_Connexion.php';
//require_once(realpath(dirname(__FILE__) . 'cont_Connexion.php'));
//require_once $_SERVER["DOCUMENT_ROOT"] .'/cont_connexion.php';

require_once 'modele_connexion.php';
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