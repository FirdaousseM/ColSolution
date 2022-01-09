<?php


require_once 'cont_annonce.php';

class ModAnnonce{

    private $controleur;


    public function __construct(){
		
		$this->controleur = new ContAnnonce();
        
        $this->controleur->switchAction();
	}
}

?>