<?php

require_once 'modele_compte.php';
require_once 'vue_compte.php';


class ContCompte{

    private $modele;
	private $vue;
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

	public function admin(){
		if(!$_SESSION['email']) 
			header('Location:../index.php?module=form&action=connexion');
		if($_SESSION['email'] != "admin@admin.fr" ) 
			header('Location:../index.php?module=form&action=connexion');

			$this->vue->form_admin();
		}

	public function signalement(){
		$co = new Connexion();
		$bdd = $co->initConnexion();
		if(!$_SESSION['email']) 
			header('Location:../index.php?module=form&action=connexion');

		$s = $this->modele->infoSignalement1();
		
		if (isset($_GET['searc']) AND !empty($_GET['searc'])) {
			$searc = htmlspecialchars($_GET['searc']);
			$s = $this->modele->infoSignalement2();

		}
		$this->vue->form_signalement($s);

	}

	public function signaler(){
		$this->modele->signaler();
		$compte = "";
		if(isset($_GET['compte']) AND !empty($_GET['compte'])){
			$compte = htmlspecialchars($_GET['compte']);
		}
		$this->vue->form_signaler($compte);
	}


	function bannir(){
		$this->modele->bannir();
	}

	public function compte() {
		if(!$_SESSION['email'] ) 
			header('Location:../index.php?module=form&action=connexion');

		if(isset($_GET['idUtilisateur']) AND $_GET['idUtilisateur'] > 0)
		{
			$getid = intval($_GET['idUtilisateur']);
			$userinfo = $this->modele->getInfoUser($getid);
			$signalement = $this->modele->getUserMail($getid);

			if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
				header('Location:index.php');
			}
			$this->vue->form_compte($userinfo, $signalement, $getid);
		}
	}
}

?>