<?php

require_once 'modele_message.php';
require_once 'vue_message.php';
require_once 'mod_message.php';

class ContMessage{

    public $modele;
	public $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleMessage();
		$this->vue = new VueMessage();
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
	}

	public function message(){
		if(!isset($_SESSION['idUtilisateur'])) { header('Location:index.php?module=inscription&action=inscription');}
		$this->modele->message();
		if(isset($_SESSION['idUtilisateur']) AND !empty($_SESSION['idUtilisateur'])){

			if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
			   header('Location:index.php');
			}
				$destinataire = "";
			if(isset($_GET['destinataire']) AND !empty($_GET['destinataire'])){
				$destinataire = htmlspecialchars($_GET['destinataire']);
			}
				$objet = "";
			if(isset($_GET['objet']) AND !empty($_GET['objet'])){
				$objet = htmlspecialchars($_GET['objet']);
				if(substr($objet,0,3) != 'RE:')
				{
					$objet = "RE:".$objet;
				}
			} 
		}
		$this->vue->form_message();

	}

	public function reception(){
		if(!isset($_SESSION['idUtilisateur'])) { header('Location:index.php?module=inscription&action=inscription');}
		if(isset($_SESSION['idUtilisateur']) AND !empty($_SESSION['idUtilisateur'])){
			if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
				header('Location:index.php');
			 }
		$msg = $this->modele->getDestinataireMessage();
		$nbreMessage = $this->modele->getNbreMessageDestinataire();
		$exp = $this->modele->getEmailExp();
        $this->vue->form_reception($msg,$nbreMessage,$exp);
		$lu = $this->modele->messageLu();
		}
	}

	public function envoie(){
		if(!isset($_SESSION['idUtilisateur'])) { header('Location:index.php?module=inscription&action=inscription');}
		if(isset($_SESSION['idUtilisateur']) AND !empty($_SESSION['idUtilisateur'])){
		if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
			header('Location:index.php');
		}
		$msg = $this->modele->getExpediteurMessage();
		$nbreMessage = $this->modele->getNbreMessageExpediteur();
		$exp = $this->modele->getEmailDes();
        $this->vue->form_mesEvoies($msg,$nbreMessage,$exp);
		$lu = $this->modele->messageLu();
		}
	}

    public function lecture(){
		if(!isset($_SESSION['idUtilisateur'])) { header('Location:index.php?module=inscription&action=inscription');}
		if(isset($_SESSION['idUtilisateur']) AND !empty($_SESSION['idUtilisateur'])){
			if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
				header('Location:index.php');
			 }
			if(isset($_GET['idMessage']) AND !empty($_GET['idMessage'])){
				$id_message = intval($_GET['idMessage']);
				$nbreMessageD = $this->modele->getNbreMsgLec($id_message,$_SESSION['idUtilisateur']);
				$m = $this->modele->getMsgLec($id_message,$_SESSION['idUtilisateur']);
				$exp2 = $this->modele->getInfoLec($id_message,$_SESSION['idUtilisateur']);
				$exp = $this->modele->getEmailLec($id_message,$_SESSION['idUtilisateur']);
        		$this->vue->form_lecture($id_message,$nbreMessageD,$exp,$exp2,$m);
			}
		}
	}

    function supprimer() {
        $this->modele->supprimer();
    }

}

?>