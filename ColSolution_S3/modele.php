<?php

require_once 'connexion.php';

class modele extends Connexion{

	public function __construct(){
		
	}

	function getUtilisateurs(){
		$laPreparation = self::$bdd->prepare('SELECT * FROM Utilisateurs');
		$laPreparation->execute();
		$testFetch = $laPreparation->fetchAll();
		return $testFetch;
	}

}


?>
