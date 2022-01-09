<?php
session_start();
require_once 'connexion.php';


class ModeleConnexion extends Connexion{

    public function __construct(){
		
	}


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