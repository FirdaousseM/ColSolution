<?php

require_once 'modele_compte.php';
require_once 'vue_compte.php';

class ContCompte{

    public $modele;
	public $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleCompte();
		$this->vue = new VueCompte();
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
		else{
			$this->action = "connexion";
		}
	}

    
	function form_compte(){
		$this->vue->form_compte();
	}

}

?>