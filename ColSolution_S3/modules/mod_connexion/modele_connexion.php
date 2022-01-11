<?php
session_start();
require_once 'connexion.php';


class ModeleConnexion extends Connexion{

    public function __construct(){
		
	}

function connexion(){
		$a = new Connexion();
		$bdd = $a->initConnexion();
		if (isset($_POST['submit'])) {

			if(!empty($_POST['email']) AND !empty($_POST['pass']))
			{
				$email = htmlspecialchars($_POST['email']);
				$pass = sha1($_POST['pass']);
				$check = $bdd->prepare("SELECT * FROM Utilisateurs WHERE email = ? AND mdp = ?");
				$check->execute(array($email,$pass));
				$row = $check->rowCount();
		
			if ($row > 0)
			{
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$data = $check->fetch();
					$_SESSION['idUtilisateur'] = $data['idUtilisateur'];
					$_SESSION['nom'] = $data['nom'];
					$_SESSION['prenom'] = $data['prenom'];
					$_SESSION['age'] = $data['age'];
					$_SESSION['email'] = $data['email'];
					$_SESSION['sexe'] = $data['sexe'];
					$_SESSION['NUMTEL'] = $data['NUMTEL'];
					$_SESSION['avatar'] = $data['avatar'];
					$_SESSION['description'] = $data['description'];
					header('Location:index.php?module=compte&action=compte'); 		 
				} 
			}
			else 
			{			
				header('Location:index.php?module=inscription&action=inscription'); 			
			}
		}
	}
	}

	function deconnexion(){
        session_start(); // demarrage de la session
        session_destroy(); // on détruit la/les session(s)
        header('Location:index.php'); // On redirige
        die();
	}

}

?>
