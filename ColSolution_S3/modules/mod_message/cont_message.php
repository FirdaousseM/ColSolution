<?php

require_once 'modele_message.php';
require_once 'vue_message.php';

class ContMessage{

    private $modele;
	private $vuee;
	public $action;

	public function __construct(){
		$this->modele = new ModeleMessage();
		$this->vuee = new VueMessage();
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
	}


	function message(){
		$this->modele->message();
		$this->vuee->form_message();

	}

	function form_reception(){
        $this->vuee->form_reception();
	}

	function form_envoie(){
		$this->vuee->form_mesEvois();
	}

    function form_lecture(){
        $this->vuee->form_lecture();
	}

    function supprimer() {
        $this->modele->supprimer();
    }

}

?>
