<?php
    require_once 'modules/mod_connexion/modele_connexion.php';
class Connexion {
	static protected $bdd;
	//public function __construct(){
	//}
	static function initConnexion(){
		$dns="mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201628";
		$user="dutinfopw201628";
		$password="bumuqasy";
		$bdd = new PDO($dns, $user, $password);
        return $bdd;
	}	 
}

?>