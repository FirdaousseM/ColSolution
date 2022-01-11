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


	public function form_connexion(){
		$this->vue->form_connexion();
	}

	public function action(){
		$this->action = "connexion";
	}


	public function connexion(){
		$this->modele->connexion();
	}

	//function form_deconnexion(){
	//	VueConnexion::form_deconnexion();
	//}

	public function deconnexion(){
		$this->modele ->deconnexion();
	}

}

?>