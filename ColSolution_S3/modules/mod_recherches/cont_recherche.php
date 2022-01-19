<?php

require_once 'modele_recherche.php';
require_once 'vue_recherche.php';
require_once 'mod_recherche.php';

class ContRecherche{

    public $modele;
	public $vue;
	public $action;
	public $ok;

	public function __construct(){
		$this->modele = new ModeleRecherche();
		$this->vue = new VueRecherche();

		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
		else{
			$this->action = "connexion";
		}

		if(isset($_GET['ok'])){
			$this->ok = $_GET['ok'];
		}
	}

    
	public function recherche(){
		if(!$_SESSION['email']) header('Location:../index.php?module=form&action=connexion');
		if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
			header('Location:index.php');
		 }
		 $users = $this->modele->getInfoRecherche();
		$this->vue->form_recherche($users);
	}

	function form_zone(){
		$this->vue->form_rechercheZone();
	}
}

?>