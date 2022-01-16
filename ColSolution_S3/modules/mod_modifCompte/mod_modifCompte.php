
<?php

require_once 'cont_modifCompte.php';


class ModModifCompte{

    public $controlerr;

    public function __construct(){
		$this->controlerr = new ContModifCompte();
        $this->modele = new ModeleModifCompte();
        $this->vue = new Vue();
        switch($this->controlerr->action){
            case "compte":
                $this->modele->modifCompte();
                $this->controlerr->form_modifCompte();
                break;
              case "deconnexion" :
                $this->controlerr->deconnexion();

        }
		
	}
}
 
?>
