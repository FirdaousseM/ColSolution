<?php
session_start();
require_once 'connexion.php';
//require_once(realpath(dirname(__FILE__) . 'connexion.php'));
//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/mysite/php/includes/dbconn.inc');


class ModeleConnexion extends Connexion{

//	public $email;
//	public $mdp;
    public function __construct(){
		
	}

/*	function getUtilisateur(){
		$laPreparation = self::$bdd->prepare('SELECT * FROM Utilisateurs WHERE email = ?');
		$laPreparation->execute();
		$testFetch = $laPreparation->fetchAll();
		return $testFetch;
	}

	function form_ajout(){
		if (isset($_POST['email'], $_POST['pass'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
		$hashmdp = password_hash($mdp, PASSWORD_DEFAULT);
		$laPreparation = self::$bdd->prepare('INSERT INTO Utilisateurs(email, mdp) VALUES($email, $hashmdp)');
		$table=array($_POST['email'], $_POST['pass']);
		$laPreparation->execute($table);
		$testFetch = $laPreparation->fetchAll();
		return $testFetch;
		}
	}
	}*/	
	
function connexion(){
		$a = new Connexion();
		$bdd = $a->initConnexion();
		if (isset($_POST['email'], $_POST['pass'])) {

			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$check = $bdd->prepare('SELECT email, mdp FROM Utilisateurs WHERE email = ?');
			$check->execute(array($email));
			$data = $check->fetch();
			$row = $check->rowCount();
		
			if ($row > 0)
			{
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					 if (password_verify($pass, $data["mdp"])) {
						echo "Connexion effectuée";
						$_SESSION['email'] = $email;
						header('Location:global/compte.php');
		
					 }
				 }
			} 
				else {			
					 $b = new Connexion();
				$hashpass = password_hash($pass, PASSWORD_DEFAULT);
				$sql = $b->initConnexion();
				$sql = "INSERT INTO Utilisateurs (email, mdp) VALUES ('$email', '$hashpass')";
				$req = $bdd->prepare($sql);
				$req->execute();
				header('Location:index.php');
				exit();    
			
				}
				 }
			}

	function deconnexion(){
        session_start(); // demarrage de la session
        session_destroy(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
        header('Location:index.php'); // On redirige
        die();
	}

}

?>