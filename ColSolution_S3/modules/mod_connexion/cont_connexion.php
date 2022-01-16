<?php

require_once 'modele_connexion.php';
require_once 'vue_connexion.php';

class ContConnexion{

    private $modele;
	private $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleConnexion();
		$this->vue = new VueConnexion();

		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
		else{
			$this->action = "connexion";
		}
	}



	public function connexion(){
		$this->modele->connexion();
		$this->vue->form_connexion();

	}


	

	public function deconnexion(){
		$this->modele->deconnexion();
	}

}

?>
