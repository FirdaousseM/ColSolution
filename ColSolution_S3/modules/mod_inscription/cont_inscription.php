<?php

require_once 'modele_inscription.php';
require_once 'vue_inscription.php';
require_once 'mod_inscription.php';

class ContInscription{

    public $modele;
	public $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleInscription();
		$this->vue = new VueInscription();
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
		else{
			$this->action = "connexion";
		}
	}


	function inscription(){
		$this->modele->inscription();
		if(isset($_SESSION['idUtilisateur'])) {
            header('Location:index.php?module=compte&action=compte&idUtilisateur='. $_SESSION['idUtilisateur']);
        }

		if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
			header('Location:index.php');
		 }
		$this->vue->form_inscription();
	}


}

?>