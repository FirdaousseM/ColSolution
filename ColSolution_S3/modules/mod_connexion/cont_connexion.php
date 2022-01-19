<?php

require_once 'modele_connexion.php';
require_once 'vue_connexion.php';
require_once 'mod_connexion.php';

class ContConnexion{

    public $modele;
	public $vue;
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

	function form_connexion(){
		$this->vue->form_connexion();
	}

	function connexion(){
		$this->modele->connexion();	
		if(isset($_SESSION['idUtilisateur'])) {
            header('Location:index.php?module=compte&action=compte&idUtilisateur='.$_SESSION['idUtilisateur']);
        }
		if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
			header('Location:index.php');
		 }
		$this->vue->form_connexion();
	}

	function deconnexion(){
		$this->modele ->deconnexion();
	}

}

?>