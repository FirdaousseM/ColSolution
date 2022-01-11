<?php

require_once 'modele_annonce.php';
require_once 'vue_annonce.php';
require_once 'mod_annonce.php';

class ContAnnonce{

    public $modele;
	public $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleAnnonce();
		$this->vue = new VueAnnonce();
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
		else{
			$this->action = "connexion";
		}
	}

	function form_depotAnnonce(){
		$this->vue->form_depotAnnonce();
	}

	function annonce(){
		$this->modele->annonce();
	}
}

    ?>
