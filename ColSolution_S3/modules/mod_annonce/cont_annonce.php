<?php

require_once 'modele_annonce.php';
require_once 'vue_annonce.php';

class ContAnnonce{

    private $modele;
	private $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleAnnonce();
		$this->vue = new VueAnnonce();
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
	}

	function deposerAnnonce(){
		$this->modele->deposerAnnonce();
		$this->vue->form_depotAnnonce();

	}


	public function consulterAnnonce() {

		if(!isset($_SESSION['idUtilisateur']) ) {
			header('Location:index.php?module=form&action=connexion');
		}

		if(isset($_GET['idAnnonce']) AND !empty($_GET['idAnnonce'])){
			$idAnnonce = intval($_GET['idAnnonce']);
		}

		$tabInfo = $this->modele->consulterAnnonce($idAnnonce);


		// INFO COMMENTAIRE
		$selectCom = $this->modele->getCommentaire($idAnnonce);

		$tabUser = $this->modele->getInfoUser($idAnnonce);
		

        $this->vue->consulterAnnonce($tabUser, $tabInfo, $selectCom);

    }

	public function mesAnnonces() {

		if(!isset($_SESSION['email'])) {
			header('Location:index.php?module=form&action=connexion');
		}

		if(isset($_GET['idUtilisateur']) AND !empty($_GET['idUtilisateur'])){
			$idUtilisateur = intval($_GET['idUtilisateur']);
			$mesAnnonces = $this->modele->getMesAnnonces($idUtilisateur);			
        	$this->vue->mesAnnonces($mesAnnonces);

		}
	}

	public function supprimer() {

		if(isset($_GET['idAnnonce']) AND !empty($_GET['idAnnonce']) AND $_GET['token'] = $_SESSION['token']){
			$idAnnonce = htmlspecialchars($_GET['idAnnonce']);
			$idLogement = $this->modele->getIdLogement($idAnnonce);
			$idLocalisation = $this->modele->getIdLocalisation($idAnnonce);

			
			$del = $bdd->prepare("DELETE FROM Annonce WHERE idAnnonce = ? ");
			$del->execute(array($idAnnonce));
			$del = $bdd->prepare("DELETE FROM Logement WHERE idLogement = ? ");
			$del->execute(array($idLogement));
			$del = $bdd->prepare("DELETE FROM Localisation WHERE idLocalisation = ? ");
			$del->execute(array($idLocalisation));
			header("Location:index.php?module=annonce&action=mesAnnonces&idUtilisateur=".$_SESSION['idUtilisateur']);

		}
	}
}

    ?>