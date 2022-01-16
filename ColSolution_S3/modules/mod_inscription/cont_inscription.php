<?php

require_once 'modele_inscription.php';
require_once 'vue_inscription.php';


class ContInscription{

    private $modele;
	private $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleInscription();
		$this->vue = new VueInscription();

		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
		else{
			$this->action = "inscription";
		}
	}

	public function inscription(){
		
		$this->modele->inscription();
		$this->vue->form_inscription();
	}
	function deconnexion(){
		$this->modele->deconnexion();
	}

}

?>