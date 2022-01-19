<?php

require_once 'modele_modifCompte.php';
require_once 'vue_modifCompte.php';
require_once 'mod_modifCompte.php';

class ContModifCompte{

    public $modele;
	public $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleModifCompte();
		$this->vue = new VueModifCompte();
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
		else{
			$this->action = "connexion";
		}
	}

    
	public function modifCompte(){
		$this->modele->modifCompte();
		if(!$_SESSION['email']) header('Location:../index.php?module=form&action=connexion');
		if(isset($_GET['idUtilisateur']) AND $_GET['idUtilisateur'] > 0 AND $_GET['token'] == $_SESSION['token'])
		{
			if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
				header('Location:index.php');
			}
		$this->vue->form_modifCompte();
		}
	}

	public function modifAnnonce(){
		$this->modele->modifAnnonce();
		if(!$_SESSION['email']) header('Location:../index.php?module=form&action=connexion');
		if(isset($_GET['idUtilisateur']) AND !empty($_GET['idUtilisateur']) AND isset($_GET['idAnnonce']) AND !empty($_GET['idAnnonce']) AND $_GET['token'] == $_SESSION['token'])
		{
			if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
				header('Location:index.php');
			}
		$this->vue->form_modifAnnonce();
		}
	}

}

?>