<?php

class Controleur {

	public $module;
	public $searc;

	public function __construct(){
		if(isset($_GET['module'])){
			$this->module = $_GET['module'];
		}
		
	}
}



?>
