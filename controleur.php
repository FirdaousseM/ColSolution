<?php

require_once 'modele.php';
require_once 'vue.php';

class controleur {

	public $modele;
	public $module;

	public function __construct(){
		$this->modele = new modele();
		if(isset($_GET['module'])){
			$this->module = $_GET['module'];
		}
		else{
			$this->module = "connexion";
		}
		
	}
}



?>