<?php

require_once (__DIR__.'/../../connexion.php');


class ModeleAnnonce {

    // id de l'annonceur
    private $idUser;

    public function __construct(){

    }


    public function getIdUser() {
      
      	// On récupère l'id de l'annonceur
		$requeteID = Connexion::$bdd->prepare("select idUtilsateur from Logement where idUtilisateur=(select max(idUtilisateur) from Utilisateurs)");
		$requeteID->execute([$idUtilisateur]);
		$resultRequete = $requeteID->fetch();
		$idUser = $resultRequete["idUtilisateur"]; 
    }

	private function getIdLogement(){

	  	// On récupère l'id de l'annonceur
		$requeteID = Connexion::$bdd->prepare("select idLogement from Logement where idLogement=(select max(idLogement) from Logement)");
		$requeteID->execute([$idLogement]);
		return $requeteID->fetch(); 
	}

	public function ajoutLogement($superficie, $type, $nbChambre, $prix){

		//$idLocalisation = newIdLocalisation();

		// insert nouveau logement  
		$sql = "insert into Logement (superficie, type, nbChambre, prix) values(?, ?, ?, ?)";
		$requetePrep = Connexion::$bdd->prepare($sql);
		$requetePrep->execute([$superficie, $type, $nbChambre, $prix]);

		// On l'id logement
		$idLogement = getIdLogement(); 
		return $idLogement;
	} 

    public function depotAnnonce($desc, $idImage, $idLogement) {

		// On récupère l'id de l'annonceur
		$this->getIdUser();
		
		//On incrémente les id car c'est une nvlle entrée
		$idLogement = ajoutLogement();
		
		// insert nouvelle annonce  
		$sql = "insert into Annonce (idUtilisateur, dateCreation, description, idLogement) values(?, NOW(), ?, ?, ?)";

		$requetePrep = Connexion::$bdd->prepare($sql);
		$requetePrep->execute([$idUtilisateur, $desc, $idImage, $idLogement]);
  	}




  
}

?>