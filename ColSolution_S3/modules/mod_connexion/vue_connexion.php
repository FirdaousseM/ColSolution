<?php

class VueConnexion {

	function form_connexion(){
		if(isset($_SESSION['idUtilisateur'])) {
            header('Location:index.php?module=mod_compte&action=compte&idUtilisateur='.$_SESSION['idUtilisateur']);
        }
		if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
			header('Location:index.php');
		}
?>  

<!DOCTYPE html>
	<head>
		<title>COLSOLUTION</title>
		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/accueil.css">
	</head>
	</br>
	</br>
	<p id="pp"> Bienvenue sur COLSOLUTION </p>
	<body>
		<?php 
			include 'html/header.html';
		?>	
		<!-- corps de page -->
		<MAIN>
			<h2> CONNEXION </h2>
				<form class="login100-form validate-form" method="POST" action="">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">email</span>
						<input class="input100" type="text" name="email" placeholder="Enter email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
							<label class="label-checkbox100" for="ckb1" >
								Remember me
							</label>
						</div>
						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name = "submit">
							Connexion
						</button>
					</div>
				</form>
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
