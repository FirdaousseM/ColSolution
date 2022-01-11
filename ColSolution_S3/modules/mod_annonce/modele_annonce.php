<?php

require_once 'connexion.php';


class ModeleAnnonce{

    public function __construct(){
		
	}

	/* DEPOSER ANNONCE */

	public function annonce(){
		
		$co = new Connexion();
		$bdd = $co->initConnexion();

		if(isset($_POST['publier'])) {
			if(isset($_POST['titre'], $_POST['description'])) {
				if(isset($_POST['ville'], $_POST['quartier'], $_POST['rue'], $_POST['codePostal'])) {
					if(!empty($_POST['titre']) AND !empty($_POST['superficie']) AND !empty($_POST['type']) AND !empty($_POST['nbChambre']) AND !empty($_POST['prix']) AND !empty($_POST['ville'])  AND !empty($_POST['quartier']) AND !empty($_POST['rue']) AND !empty($_POST['codePostal']) AND !empty($_POST['description'])){
						$titre = htmlspecialchars($_POST['titre']);
						$description = htmlspecialchars($_POST['description']);
						$ville = htmlspecialchars($_POST['ville']);
						$quartier = htmlspecialchars($_POST['quartier']);
						$rue = htmlspecialchars($_POST['rue']);
						$codePostal = htmlspecialchars($_POST['codePostal']);
						$superficie = htmlspecialchars($_POST['superficie']);
						$type = htmlspecialchars($_POST['type']);
						$nbChambres = htmlspecialchars($_POST['nbChambre']);
						$prix = htmlspecialchars($_POST['prix']);
						
						//date et heure de l'annonce
						$date= date("Y-m-d");
						$time=date("H:m");
						$datetime=$date."T".$time;

						// insertion annonce
						$insAnnonce = $bdd->prepare("INSERT INTO Annonce(titre, dateCreation, description, idUtilisateur) VALUES (?,?,?,?)");
						$insAnnonce->execute(array($titre, $datetime, $description, $_SESSION['idUtilisateur']));

						// insertion localisation
						$insLocalisation = $bdd->prepare("INSERT INTO Localisation(ville, quartier, rue, codePostal) VALUES (?,?,?,?)");
						$insLocalisation->execute(array($ville, $quartier, $rue, $codePostal));

						// selection de l'id de la localisation dans une variable
						$idLocalisation = $bdd->prepare("SELECT idLocalisation FROM Localisation WHERE ville = ? ORDER BY idLocalisation DE SC");
						$idLocalisation->execute(array($ville));
						$idLocalisation = $idLocalisation->fetch();
						$idLocalisation = $idLocalisation['idLocalisation'];

						// insertion du logement
						$insLogement = $bdd->prepare("INSERT INTO Logement(superficie, type, nbChambre, prix, idLocalisation) VALUES (?,?,?,?,?)");
						$insLogement->execute(array($superficie, $type, $nbChambres, $prix, $idLocalisation));
						//header('Location:index.php');

					}
				}
			}
    	}
	}    

	


	/* CONSULTER ANNONCE */


	/*** récupère les informations d'une annonce : ***/

	// - dans la table annonce
	public function getInfoAnnonce($idAnnonce) {
		
		$co = new Connexion();
		$bdd = $co->initConnexion();

		$selectPrep = $bdd->prepare("select titre, description from Annonce where idAnnonce = ?");	
		$selectPrep->execute(array($idAnnonce));
		$tab = $selectPrep->fetchAll();

		return $tab;
	}

	// - dans la table Logement
	public function getInfoLogement($idAnnonce){

		$co = new Connexion();
		$bdd = $co->initConnexion();

		// On récupère l'idLogment depuis l'id de l'annonce que l'on consulte
		$idLogement = $this->getIdLogement($idAnnonce);

		$selectPrep = $bdd->prepare("select prix, type, superficie, nbChambre from Logement where idLogement = ?");	
		$selectPrep->execute(array($idLogement));
		$tab = $selectPrep->fetchAll();

		return $tab;
	}

	// - dans la table Localisation
	public function getInfoLocalisation($idAnnonce){
		$co = new Connexion();
		$bdd = $co->initConnexion();

		$idLocalisation = $this->getIdLocalisation($idAnnonce);

		$selectPrep = $bdd->prepare("select presMetro, presBus, presTrain, presTram, presCommerce from Localisation where idLocalisation = ?");	
		$selectPrep->execute(array($idLocalisation));
		$tab = $selectPrep->fetchAll();

		return $tab;
	}

	// - dans la table Utilisateur
	public function getInfoUser($idAnnonce){
		$co = new Connexion();
		$bdd = $co->initConnexion();

		$idUser = $this->getIdUser($idAnnonce);

		$selectPrep = $bdd->prepare("select prenom, NUMTEL from Utilisateurs where idUtilisateur = ?");	
		$selectPrep->execute(array($idUser));
		$tab = $selectPrep->fetchAll();

		return $tab;
	}

	//récupère l'idLogement a partir d'une annonce
	private function getIdLogement($idAnnonce){

		$co = new Connexion();
		$bdd = $co->initConnexion();

		$selectPrep = $bdd->prepare("select idLogement from Annonce where idAnnonce = ?");	
		$selectPrep->execute(array($idAnnonce));
		$tabResult = $selectPrep->fetch();
		$idLogement = $tabResult['idLogement'];
		return $idLogement;
	}

	//récupère l'idLocalisation a partir d'une annonce
	private function getIdLocalisation($idAnnonce){
		
		$co = new Connexion();
		$bdd = $co->initConnexion();

		$idLogement = $this->getIdLogement($idAnnonce);
		
		$selectPrep = $bdd->prepare("select idLocalisation from Logement where idLogement = ?");	
		$selectPrep->execute(array($idLogement));
		$tabResult = $selectPrep->fetch();
		$idLocalisation = $tabResult['idLocalisation'];
		return $idLocalisation;
	}
	
	//récupère l'idUser a partir d'une annonce
	private function getIdUser($idAnnonce){

		$co = new Connexion();
		$bdd = $co->initConnexion();

		$selectPrep = $bdd->prepare("select idUtilisateur from Annonce where idAnnonce = ?");	
		$selectPrep->execute(array($idAnnonce));
		$tabResult = $selectPrep->fetch();
		$idUtilisateur = $tabResult['idUtilisateur'];
		return $idUtilisateur;
	}


}
?>

