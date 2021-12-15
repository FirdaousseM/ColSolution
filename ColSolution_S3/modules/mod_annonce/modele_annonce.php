<?php

require_once (__DIR__.'/../connexion.php');


class ModeleAnnonce {

    public function __construct(){

    }

    

    public function ajout($idAnnonce, $idUser, $desc, $idImage, $idLogement) {

      
      $requetePrep = Connexion::$bdd->prepare("select idUtilsateur from Utilisateurs where idUtilisateur=(select max(idUtilisateur) from Utilisateurs)");
      $requetePrep->execute();
		  $tuple = $requetePrep->fetchAll();
      $idUser = $tuple['idUtilisateur'];

      
      $requetePrep = Connexion::$bdd->prepare("select id from Utilisateurs where idUtilisateur=(select max(idUtilisateur) from Utilisateurs)");
      $requetePrep->execute();
		  $tuple = $requetePrep->fetchAll();
      $idUser = $tuple['idUtilisateur'];

      $idUser = Connexion::$bdd->prepare("select id from Utilisateurs where id=(select max(id) from Utilisateurs)");  
      // insert nouveau logeement  
      $requetePrep = Connexion::$bdd->prepare("insert into Logement values(?, ?, NOW(), 0, ?, ?, ?)");
      $requetePrep->execute([$idAnnonce, $idUser, $desc, $idImage, $idLogement]);

      // insert nouvelle annonce  
      $requetePrep = Connexion::$bdd->prepare("insert into Annonce values(?, ?, NOW(), 0, ?, ?, ?)");
      $requetePrep->execute([$idAnnonce, $idUser, $desc, $idImage, $idLogement]);
	}
}

?>