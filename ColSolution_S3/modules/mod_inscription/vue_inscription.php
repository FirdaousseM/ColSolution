<?php

class VueInscription{

    function __construct() {

    }
	function form_inscription(){
        if(isset($_SESSION['idUtilisateur'])) {
            header('Location:index.php?module=mod_compte&action=compte&idUtilisateur='. $_SESSION['idUtilisateur']);
        }
/*
		if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
			header('Location:index.php');
		}
		*/
?>  
<!DOCTYPE html>

<!-- PAGE ACCUEIL COLSOLUTION -->

<HTML>

	<HEAD>
		<TITLE> Colsolution </TITLE>
		<META CHARSET="UTF-8">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/accueil.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	</HEAD>
	
	<BODY>
	
		 <?php
		 	include 'html/header.html';
		 ?>

		<!-- corps de page -->
		<MAIN>

        <h2> Inscription </h2>

        <form class="login100-form validate-form" method="POST" action="index.php">
			<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
					<span class="label-input100">nom</span>
					<input class="input100" type="text" name="nom" value = "<?php if(isset($nom)) echo $nom  ?>" placeholder="Entrez votre nom">
					<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input m-b-26" data-validate="first name is required">
				<span class="label-input100">prenom</span>
				<input class="input100" type="text" name="prenom" value = "<?php if(isset($prenom)) echo $prenom  ?>" placeholder="Entrez votre prénom">
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input m-b-26" data-validate="Age is required">
				<span class="label-input100">Age</span>
				<input class="input100" type="text" name="age"value = "<?php if(isset($age)) echo $age  ?>" placeholder="Entrez votre Age">
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input m-b-26" data-validate="email is required">
				<span class="label-input100">email</span>
				<input class="input100" type="text" name="mail" value = "<?php if(isset($mail)) echo $mail  ?>" placeholder="Entrez votre email">
				<span class="focus-input100"></span>
			</div>
		
			<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
				<span class="label-input100">Mot de passe</span>
				<input class="input100" type="password" name="pwd" placeholder="Entrez un mot de passe">
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
				<span class="label-input100">Confirmez votre mot de passe</span>
				<input class="input100" type="password" name="pwd2" placeholder="Entrez un mot de passe">
				<span class="focus-input100"></span>
			</div>

			<div class="flex-sb-m w-full p-b-30">
				<div class="contact100-form-checkbox">
					<input class="input-checkbox100" id="ckb1" type="checkbox" name="man">
					<label class="label-checkbox100" for="ckb1">
						homme
					</label>
					</br>
					<input class="input-checkbox100" id="ckb2" type="checkbox" name="girl">
					<label class="label-checkbox100" for="ckb2">
						femme
					</label>
					</br>
					<a href="index.php?module=form&action=connexion"> J'ai déjà un compte </a>
				</div>
			</div>

			<div class="container-login100-form-btn">
				<button class="login100-form-btn" name = "inscription">
					Inscription
				</button>
			</div>
		</form>
        
        <?php  if (isset($erreur)) {echo '<font color="red">'.$erreur."</font>";} ?>
                           
		</MAIN>

		<?php
            include 'html/footer.html';
        ?>
	</BODY>
</HTML>
<?php 
	}
}
?>