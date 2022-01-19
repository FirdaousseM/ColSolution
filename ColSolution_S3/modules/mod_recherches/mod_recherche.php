<?php

require_once 'cont_recherche.php';


class ModRecherche{

    public $controlerr;

    public function __construct(){
		$this->controlerr = new ContRecherche();

        switch($this->controlerr->action){
            case "Users":
                $this->controlerr->recherche();
                break;
            case "zone":
                $this->controlerr->form_zone();
                break;
        }
	}

}
 
?>
