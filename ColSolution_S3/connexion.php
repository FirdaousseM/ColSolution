<?php

class Connexion {
	static protected $bdd;

	
	static function initConnexion(){
		$dns="mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201628";
		$user="dutinfopw201628";
		$password="bumuqasy";
		$bdd = new PDO($dns, $user, $password);
        return $bdd;
	}	 
	
	static function cookies() {
		setcookie('accepter', true, time() + 365*24*3600);
	}
}

?>
