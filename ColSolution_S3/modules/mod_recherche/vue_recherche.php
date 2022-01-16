<?php
require_once 'modules/mod_recherche/modele_recherche.php';
require_once 'connexion.php';
class VueRecherche{

	public function __construct(){
		
	}
   
 
	function form_recherche(){
	/*	if(isset($_GET['idUtilisateur'])){
			$utilisateur = (string) trin($_GET['idUtilisateur']);
			$co = new Connexion();
			$bdd = $co ->initConnexion();
			

*/			
  $co = new Connexion();
  $bdd = $co->initConnexion();
  $users = $bdd->query('SELECT * FROM Utilisateurs ORDER BY idUtilisateur DESC LIMIT 10');
if(!$_SESSION['email']) header('Location:../index.php?module=form&action=connexion');
if (isset($_GET['searc']) AND !empty($_GET['searc'])) {
    $searc = htmlspecialchars($_GET['searc']);
	$users = $bdd->query('SELECT * FROM Utilisateurs Where nom LIKE "%'.$searc.'%" ORDER BY idUtilisateur DESC ');
	//$users = $users->fetchAll();
}
?>
<!DOCTYPE html>

<!-- PAGE ACCUEIL COLSOLUTION -->

<HTML>
	<HEAD>
		<TITLE> Colsolution </TITLE>
		<META CHARSET="UTF-8">
		<link href="css/recherche.css" rel="stylesheet" type="text/css" />
	</HEAD>
	<BODY>

		<?php 
			include 'html/header.html';
		?>
		<!-- corps de page -->
		<MAIN>
        <form method = "GET">
        <input  type="search" id ="searc" name="searc" placeholder="Recherche..." >
	    <input  type="submit" name="ok" value="Valider" >
        </form>
		<div style ="margin-top:20px">
			<div id="result"></div>
		</div>
			<SECTION>
                <?php
           if($users->rowCount() > 0) {
                ?>
				<h2> Utilisateurs </h2>
			<!--	<div id="l">
					<div id="n">
						<h2> Nom : </h2>
		   			</div>
					<div id ="p">
					<h2> Prenom : </h2>
		  		 </div>
		   		</div> -->
                    <?php while($user = $users->fetch()) {
                    ?>
				 <div id="liste"> 
						<div id="liste_pic">
						<?php if($user['avatar'] != NULL) {?>
							<a href="index.php?module=compte&action=compte&idUtilisateur=<?=$user['idUtilisateur']; ?>" > <img class="an" src="public/avatars/<?=$user['avatar'] ;?>" alt="photo de profil"/> </a>
						<?php } if($user['avatar'] == NULL) { ?> <a href="index.php?module=compte&action=compte&idUtilisateur=<?=$user['idUtilisateur']; ?>" > <img class="an" src="public/avatars/defaults/pp.png" alt="photo de profil"/> </a>
						<?php } ?>
						</div>
                        <div id="liste_text">
							<h3>@<?= $user['nom']; ?> </h3>
							<p> <?= $user['description']; ?> </p> <a href="index.php?module=compte&action=compte&idUtilisateur=<?=$user['idUtilisateur'] ; ?>" >  </a>
						</div>
					</div>
                    <?php
} }?>
           
		   <script> src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
			<script> src="https://code.jquery.com/jquery-1.12.4.js"></script> 
			<script> src="https://code.jquery.com/ul/1.12.1/jquery-ul.js"></script> 
			<script> src="https://cdnjs.cloudflare.com/ajax/libs/poppeer.js/1.12.9/umd/popper.min.js"></script> 
					
					<!--===============================================================================================-->
					<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/animsition/js/animsition.min.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/bootstrap/js/popper.js"></script>
					<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/select2/select2.min.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/daterangepicker/moment.min.js"></script>
					<script src="vendor/daterangepicker/daterangepicker.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/countdowntime/countdowntime.js"></script>
				<!--===============================================================================================-->
					<script src="js/main.js"></script>

					<script>
					$(document).ready(function() {
						$('#searc').keyup(function(){
						 $('#result').html("");
							 var utilisateur = $(this).val();
							 if(utilisateur != ""){
								 $.ajax({
									 type: 'GET',
									 url: 'index.php?module=recherche&action=Users&idUtilisateur='.$_SESSION['idUtilisateur'],
									 data: 'user=' + encodeURLComponent(utilisateeur),
									 success: function(data) {
										 if(data != ""){
											 $('#result').append(data);
										 }else{
											 document.getElementById('result').insertHTML = "<div style = 'font-size: 20px; text-align: center; margin-top: 10px'>Aucun Utilisateur </div>";
										 }
									 }
									 console.log(utilisateur);
								 });
							 }
						});
					});
				 </script>
             
					
			</SECTION>
		</MAIN>
		<!-- footer -->
		<FOOTER>
			<a href="accueil.php"> <img src="images/COL.png" alt="Logo du site"/> </a>
			<p> 2021 - COLSOLUTION - Creative Common Licence</p>
		</FOOTER>

	</BODY>
</HTML>
<?php
	}

}

/* <div style ="margin-top:20px">
						<div id="result"></div>
	</div>
					<script> src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
					<script> src="https://code.jquery.com/jquery-1.12.4.js"></script> 
					<script> src="https://code.jquery.com/ul/1.12.1/jquery-ul.js"></script> 
					<script> src="https://cdnjs.cloudflare.com/ajax/libs/poppeer.js/1.12.9/umd/popper.min.js"></script> 
					
					<!--===============================================================================================-->
					<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/animsition/js/animsition.min.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/bootstrap/js/popper.js"></script>
					<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/select2/select2.min.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/daterangepicker/moment.min.js"></script>
					<script src="vendor/daterangepicker/daterangepicker.js"></script>
				<!--===============================================================================================-->
					<script src="vendor/countdowntime/countdowntime.js"></script>
				<!--===============================================================================================-->
					<script src="js/main.js"></script>

				<script>
					$(document).ready(function() {
						$(\'#searchbar\').keyup(function(){
						 $(\'#result\').html("");
							 var utilisateur = $(this).val();
							 if(utilisateur != ""){
								 $.ajax({
									 type: \'GET\',
									 url: \'index.php?module=recherche&action=Users&idUtilisateur=\'.$_SESSION[\'idUtilisateur\'],
									 data: \'user=\' + encodeURLComponent(utilisateeur),
									 success: function(data) {
										 if(data != ""){
											 $(\'#result\').append(data);
										 }else{
											 document.getElementById(\'result\').insertHTML = "<div style = \'font-size: 20px; text-align: center; margin-top: 10px\'>Aucun Utilisateur </div>";
 
										 }
									 }
									 console.log(utilisateur);
								 });
							 }
 
						});
					});
 
				 </script>*/
?>
