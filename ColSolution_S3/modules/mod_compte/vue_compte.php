<?php
require_once 'connexion.php';
class VueCompte{

	public function __construct(){
		
	}

	function form_compte($userinfo,$signalement,$getid){
	?>  

<!DOCTYPE html>

<!-- PAGE ACCUEIL COLSOLUTION -->
<HTML>
	<HEAD>
		<TITLE> Colsolution </TITLE>
		<META CHARSET="UTF-8">
		<link href="css/compte.css" rel="stylesheet" type="text/css" />
	</HEAD>
	<BODY>


		

        <MAIN>
			<SECTION>
				<ARTICLE>
					<div id="informations"> 
						<div id="photoProfil">
							<h2 id= "pt"> <?= $userinfo['nom'] ; ?> </h2>
						</div>
						<div id="ppImg" >
							<?php 
							if($userinfo['avatar'] != null) { 
							?>
							<a href="index.php?module=modif&action=compte&idUtilisateur=<?=$userinfo['idUtilisateur']?>&token=<?=$_SESSION['token'];?>"><img class="an" src="public/avatars/<?=$userinfo['avatar'];?>" alt="Photo de profil"/> </a>
							<?php
							}
							if($userinfo['avatar'] == null){
							?>
								<a href="index.php?module=modif&action=compte&idUtilisateur=<?=$userinfo['idUtilisateur']?>&token=<?=$_SESSION['token'];?>"> <img class="an" src="public/avatars/defaults/pp.png" alt="Photo de profil"/> </a>
							<?php
							}
							?>
						</div>
						<div id="info">
							<h2 id= "ptt"> INFORMATIONS </h2>
							<p>	<?php echo "Email : ". $userinfo['email'] ; ?> </p>
							<p>	<?php echo "Nom : ". $userinfo['nom'] ; ?> </p>
							<p>	<?php echo "Prenom : ". $userinfo['prenom'] ; ?> </p>
							<p>	<?php echo "Age : ". $userinfo['age'] ; ?> </p>
							<p>	<?php echo "Sexe : ". $userinfo['sexe'] ; ?> </p>
							<p>	<?php echo "Contact : ". $userinfo['NUMTEL'] ; ?> </p>
						</div>
					</div>

					<div id="Description"> 
						<h2 id= "text"> DESCRIPTION </h2>
						<p id="Desc" ><?php echo $userinfo['description']; ?> </p>
					</div>
				</ARTICLE>
			</SECTION>
		</MAIN>
           
		<?php include 'html/footer.html';?>
	</BODY>
</HTML>

<?php

		}
	}
function form_signaler() {

	if(isset($_GET['compte']) AND !empty($_GET['compte'])){
		$compte = htmlspecialchars($_GET['compte']);
	}
?>
	<!DOCTYPE html>

	<!-- PAGE ACCUEIL COLSOLUTION -->
	<HTML>
		<HEAD>
			<TITLE> Colsolution </TITLE>
			<META CHARSET="UTF-8">
			<link href="css/util.css" rel="stylesheet" type="text/css" />
			<link href="css/main.css" rel="stylesheet" type="text/css" />
			<link href="css/compte.css" rel="stylesheet" type="text/css" />

		</HEAD>
		<BODY>
			<!-- en tête de page-->
			<p id="pp"> Vous recherchez un colocataire ? Vous êtes au bon endroit </p> 
			<HEADER>
				<a href="index.php"> <img class="logo" src="images/COL.png" alt="Logo du site"/> </a>
				<input id="searchbar" type="text" name="annonce" placeholder="Rechercher une annonce..." />
			</HEADER>
			<!-- menu de navigation -->	
			<NAV id="mainNav">
				<nav id="menusMessage">
					<a class="menuLink" href="index.php?module=message&action=message"> <img class="icons" src="images/icons/messa.png" alt=""/>Message</a>
						<a class="menuLink" href="index.php">  <img class="icons" src="images/icons/favicon.ico" alt=""/>Accueil</a>  
				</nav>
				<nav id="Annonce">
					<a class="menuLink" href="index.php?module=annonce&action=depotAnnonce"> <img class="icons" src="images/icons/map-marker.png" alt=""/> Déposer Annonce </a>
					<a class="menuLink" href="index.php?module=recherche&action=Users" > <img class="icons" src="images/sr.png" alt=""/> Rechercher Annonce </a>				
				</nav>
				<nav id="menusCompte">
					<a class="menuLink" href="index.php?module=compte&action=compte&idUtilisateur=<?=$_SESSION['idUtilisateur'] ?>"> <img class="icons" src="images/icons/favicon.ico" alt=""/>Mon Compte</a>
				
				</nav>
			</NAV>
	
			<MAIN>
				<SECTION>
					<ARTICLE>
						<h2> SIGNALEMENT </h2>
				 <form class="login100-form validate-form" method="POST" action="">
				<form class="login100-form validate-form">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">email</span>
						<input class="input100" type="text" name="signaler" value = "<?php if(isset($compte)) echo $compte ;?>">
						<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-18" data-validate = "Raison is required">
						<span class="label-input100">Raison de votre signalement</span>
						<textarea id="mess" name="raison"
                        rows="5" cols="77">
                        ...
                        </textarea>
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name = "confirmer">
							Confirmer
						</button>
					</div>		
				</form>	
							</div>
					 	</ARTICLE>
				</SECTION>
	</MAIN>
	
	<?php include 'html/footer.html' ?>

		</BODY>
	</HTML>

<?php
}

function form_admin(){
	?>  

<!DOCTYPE html>

<!-- PAGE ACCUEIL COLSOLUTION -->
<HTML>
	<HEAD>
		<TITLE> Colsolution </TITLE>
		<META CHARSET="UTF-8">
		<link href="css/compte.css" rel="stylesheet" type="text/css" />
	</HEAD>
	<BODY>
		<!-- en tête de page-->
		<p id="pp"> Vous recherchez un colocataire ? Vous êtes au bon endroit </p> 
		<HEADER>
			<a href="index.php"> <img class="logo" src="images/COL.png" alt="Logo du site"/> </a>
            <input id="searchbar" type="text" name="annonce" placeholder="Rechercher une annonce..." />
		</HEADER>
		<!-- menu de navigation -->	
		<NAV id="mainNav">
			<nav id="menusMessage">
				<a class="menulinkk" href="index.php?module=message&action=message"> <img class="icons" src="images/icons/messa.png" alt=""/>Message</a>	
			</nav>
			<nav id="Annonce">
			<a class="menulinkk" href="index.php?&module=recherche&action=Users">  <img class="icons" src="images/icons/messa.png" alt=""/>Utilisateurs</a>  
			<a class="menulinkk" href="index.php?&module=compte&action=signalement">  <img class="icons" src="images/icons/messa.png" alt=""/>Signalement</a>  
            </nav>
			<nav id="menusCompte">
				<a class="menulinkk" href="index.php?module=form&action=deconnexion"> <img class="icons" src="images/icons/favicon.ico" alt=""/>Deconnexion</a>
			</nav>
		</NAV>

        <MAIN>
			<SECTION>
				<ARTICLE>
						<div id="adminpp">
						<h2 id= "ptA"> COMPTE ADMINISTRATEUR </h2>
						<p> Bienvenue dans le compte administrateur, vous pouvez désormais consulter les signalements bannir les utilisateurs ne respectant pas les règles </p>
							<a href="DepoAnnonce.php"> <img class="an" src="public/avatars/defaults/pp.png" alt="Photo de profil"/> </a>
						</div>
						</ARTICLE>
			</SECTION>
		</MAIN>
			<?php include 'html/footer.html';?>
	</BODY>
</HTML>

<?php
	}
	function form_signalement($s){
			
	  ?>
	  <!DOCTYPE html>
	  
	  <!-- PAGE ACCUEIL COLSOLUTION -->
	  
	  <HTML>
		  <HEAD>
			  <TITLE> Colsolution </TITLE>
			  <META CHARSET="UTF-8">
			  <link href="css/signaler.css" rel="stylesheet" type="text/css" />
		  </HEAD>
		  <BODY>
			  <!-- en tête de page-->
			  <p id="pp"> Vous recherchez un colocataire? Vous êtes au bon endroit </p> 
			  <HEADER>
				  <a href="index.php"> <img class="logo" src="images/COL.png" alt="Logo du site"/> </a>
				  <input id="searchbar" type="text" name="search" placeholder="Rechercher une annonce..." />
				  <!-- <input id="euh" type="submit" value="Valider" /> -->
		  
			  </HEADER>
			  <!-- menu de navigation -->
			  <NAV id="mainNav">
				  <nav id="menusMessage">
					  <a class="menuLink" href="index.php?module=message&action=message">  <img class="icons" src="images/icons/messa.png" alt=""/>Messages </a>
				  </nav>
				  <nav id="Annonce">			
					  <a class="menuLink" href="index.php?module=annonce&action=depotAnnonce"> <img class="icons" src="images/icons/map-marker.png" alt=""/> Deposer Annonce </a>
					  <a class="menuLink" href="index.php?module=recherche&action=Users"> <img class="icons" src="images/sr.png" alt=""/> Rechercher Annonce </a>				
				  </nav>
				  <nav id="menusCompte">
					  <a class="menuLink" href="index.php?module=compte&action=admin"> <img class="icons" src="images/icons/favicon.ico" alt=""/> Mon Compte </a>
				  </nav>
			  </NAV>
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
				
				 if($s->rowCount() > 0) {
					//$verif = $bdd->prepare('SELECT idUtilisateur FROM Utilisateurs WHERE idUtilisateur = $s["idSignaler"]');
					  ?>
					  <h2> Signalements récentes </h2>
						  <?php while($info = $s->fetch()) {
						  ?>
	  						<div id="signalement">
							  <div id="liste_signalement">
								  <h3> L'utilisateur <a href="index.php?module=compte&action=compte&idUtilisateur=<?=$info['idSignaleur'];?>" >#<?=$info['idSignaleur']; ?> </a> a signaler l'utilisateur <a href="index.php?module=compte&action=compte&idUtilisateur=<?=$info['idSignaler'];?>" >#<?=$info['idSignaler']; ?> </a> </h3>
						  		</div>
								  <div id="ban">
								  <a class="menuLink" id="sup" href="index.php?module=compte&action=bannir&idSignalement=<?= $info['idSignaler'];?>&token=<?=$_SESSION['token'];?>">Bannir</a>
                            	</div>
							  </div>
						  <?php
						  } 
						  }else{
							?> <p> Aucun Signalement </p> <?php } ?>
				 
						  </SECTION>
			  </MAIN>
			 
			  <?php include 'html/footer.html';?>
	  
		  </BODY>
	  </HTML>
	  <?php
		  
	  
	  }
?>