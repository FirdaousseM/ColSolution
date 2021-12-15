<?php

require_once 'cont_compte.php';
require_once 'modele_compte.php';
require_once 'vue.php';

ini_set('xdebug.max_nesting_level', 5000);
class ModCompte{

    public $controlerr;
    public $modele;
    public $mod;
    public $vue;
    public function __construct(){
		$this->controlerr = new ContCompte();
        $this->modele = new ModeleCompte();
        $this->vue = new Vue();
        switch($this->controlerr->action){
            case "compte":
                $this->controlerr->form_compte();
                break;
              case "deconnexion" :
                $this->controlerr->deconnexion();
               // header('Location:index.php');

        }
		
	}
}
 
?>