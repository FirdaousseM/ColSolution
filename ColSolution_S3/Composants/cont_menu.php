<?php

require_once 'modele_joueurs.php';
require_once 'vue_joueurs.php';

class ContJoueurs{

    public $modele;
	public $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleJoueurs();
		$this->vue = new VueJoueurs();
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}	
	}

	function menu(){
		$this->vue->menu();
	}

}

?>