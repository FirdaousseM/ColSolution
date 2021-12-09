<?php

require_once 'cont_Connexion.php';
//require_once(realpath(dirname(__FILE__) . 'cont_Connexion.php'));
//require_once $_SERVER["DOCUMENT_ROOT"] .'/cont_connexion.php';

require_once 'modele_connexion.php';
require_once 'mod_connexion.php';

//require_once 'index.php';

ini_set('xdebug.max_nesting_level', 5000);
class ModConnexion{

    public $controleurr;
    public $modele;
    public $mod;

    public function __construct(){
		$this->controleurr = new ContConnexion();
        $this->modele = new ModeleConnexion();
        switch($this->controleurr->action){
            case "connexion":
              // $this->mod = new ModConnexion();
                //$contenu = $this->mod->controleurr;
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