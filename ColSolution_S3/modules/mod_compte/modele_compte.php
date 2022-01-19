<?php

require_once 'connexion.php';

class ModeleCompte {

	private $bdd;

	public function __construct(){
		$co = new Connexion();
		$this->bdd = $co->initConnexion();
	}

	public function getInfoUser($getid) {
		
		$requser = $this->bdd->prepare('SELECT * FROM Utilisateurs WHERE idUtilisateur = ?');
		$requser->execute(array($getid));
		$userinfo = $requser->fetch();

		return $userinfo;
	}

	public function getUserMail($getid) {
		$userinfo = $this->getInfoUser($getid);
		$signalement = $userinfo['email'];

		return $signalement;
	}


	public function infoSignalement1() {
		
		$signalement = $this->bdd->query('SELECT * FROM Signaler ORDER BY idSignalement DESC LIMIT 10');

		return $signalement;

	}

	public function infoSignalement2(){
		$s = $this->bdd->query('SELECT * FROM Signaler Where raison LIKE "%'.$searc.'%" INNER JOIN Signaler using(idSignalement) ORDER BY idUtilisateur DESC ');

		return $s;
	}

	function signaler() {
		if(isset($_POST['confirmer'])) {
			if(!empty($_POST['raison']) AND !empty($_POST['signaler'])) {
				$raison = htmlspecialchars($_POST['raison']);
				$email = htmlspecialchars($_POST['signaler']);
				
				$check = $this->bdd->prepare("SELECT * FROM Utilisateurs WHERE email = ? ");
				$check->execute(array($email));
				$check = $check->fetch();
				$idSignaler = $check['idUtilisateur'];
				$sql = $co->initConnexion();
				$ins = $sql->prepare("INSERT INTO Signaler (idSignaleur, idSignaler, raison) VALUES (?,?,?)");
				$ins->execute(array($_SESSION['idUtilisateur'],$idSignaler,$raison));
				?>
				<script type="text/javascript">
					alert("Merci d'avoir signaler <?= $email ?>");
				</script>
				<?php
			}
		}
	}

	function bannir() {
		if(isset($_GET['idSignalement']) AND !empty($_GET['idSignalement']) AND $_GET['token'] == $_SESSION['token'] ){
		$idSignaler = htmlspecialchars($_GET['idSignalement']);
		
		$del = $this->bdd->prepare("DELETE FROM Utilisateurs WHERE idUtilisateur = ? ");
		$del->execute(array($idSignaler));
		?>
		<script type="text/javascript">
			alert("Vous venez de Bannir l'utilisateur #<?= $idSignaler ?>");
		</script>
		<?php
		}
		header("Location:index.php?module=compte&action=signalement");
	}
}


?>