<?php

require_once 'cont_message.php';


class ModMessage{

    public $controleurrr;

    public function __construct(){
		$this->controleurrr = new ContMessage();

        switch($this->controleurrr->action){
            
            case "message": // Envoyer des messages 
                $this->controleurrr->message();
            break;
            case "lecture" : // Page affichant un message au complet 
                $this->controleurrr->form_lecture();
            break;
            case "reception" : // Page contenant tous les messages reçu 
                $this->controleurrr->form_reception();
            break;
            case "envoie" : // Page contenant tous les messages envoyé 
                $this->controleurrr->form_envoie();
            break;
            case "supprimer" : // Supprimer un message 
                $this->controleurrr->supprimer();
            break;
            default :
            break;
        }
		
	}
}
 
?>
