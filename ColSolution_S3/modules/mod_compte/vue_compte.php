<?php
class VueCompte{

	public function __construct(){
		
	}

	function form_compte(){
	?>  
<?php

?>
<!DOCTYPE html>

<!-- PAGE ACCUEIL COLSOLUTION -->
<HTML>
	<HEAD>
		<TITLE> Colsolution </TITLE>
		<META CHARSET="UTF-8">
		<link href="../css/compte.css" rel="stylesheet" type="text/css" />
	</HEAD>
	<BODY>
		<!-- en tête de page-->
		<p id="pp"> Vous recherchez un colocataire ? Vous êtes au bon endroit </p> 
		<HEADER>
			<a href="index.php"> <img class="logo" src="../images/logo2.png" alt="Logo du site"/> </a>
            <input id="searchbar" type="text" name="search" placeholder="Recherche..." />
		</HEADER>
		<!-- menu de navigation -->	
		<NAV id="mainNav">
			<nav id="menusMessage">
				<a class="menuLink" href="message.php">  <img class="icons" src="../images/icons/messa.png" alt=""/>Messages</a>
				<a class="menuLink" href="index.php?&module=modif&action=compte">  <img class="icons" src="../images/icons/messa.png" alt=""/>Modifier</a>  
			</nav>
			<nav id="Annonce">
				<a class="menuLink" href="DepoAnnonce.php"> <img class="icons" src="../images/icons/map-marker.png" alt=""/> Deposer Annonce </a>
                <a class="menuLink" href="recherche.php"> <img class="icons" src="../images/sr.png" alt=""/> Rechercher Annonce </a>				
            </nav>
			<nav id="menusCompte">
				<a class="menuLink" href="../index.php?module=form&action=deconnexion"> <img class="icons" src="../images/icons/favicon.ico" alt=""/> Deconnexion </a>
			</nav>
		</NAV>

        <MAIN>
			<SECTION>
				<ARTICLE>
					<div id="informations"> 
						<div id="photoProfil">
						<h2 id= "pt"> Photo de profil </h2>
						<?php 
						if(!empty($_SESSION['avatar'])) { 
						?>
						<a href="DepoAnnonce.php"> <img class="an" src="../public/avatars/<?php echo $_SESSION['avatar'];?>" alt="Photo de profil"/> </a>
						<?php	
						}
						?>
						<?php
						if(empty($_SESSION['avatar'])){
						?>
							<a href="DepoAnnonce.php"> <img class="an" src="../images/pp.png" alt="Photo de profil"/> </a>
						<?php
						}
						?>
						</div>
                        <div id="info">
						<h2 id= "ptt"> Données Personnels </h2>
						<p>	<?php echo "Email : ". $_SESSION['email'] ; ?> </p>
						<p>	<?php echo "Nom : ". $_SESSION['nom'] ; ?> </p>
						<p>	<?php echo "Prenom : ". $_SESSION['prenom'] ; ?> </p>
						<p>	<?php echo "Age : ". $_SESSION['age'] ; ?> </p>
						<p>	<?php echo "Sexe : ". $_SESSION['sexe'] ; ?> </p>
						<p>	<?php echo "Contact : ". $_SESSION['NUMTEL'] ; ?> </p>
						</div>
					</div>

                    <div id="Description"> 
					<h2 id= "text"> DESCRIPTION </h2>
                        <p id="Desc" ><?php echo $_SESSION['description']; ?> </p>
					</div>

					</ARTICLE>
			</SECTION>
</MAIN>
                    <!-- footer -->
		    <FOOTER>
			<a href="accueil.php"> <img src="../images/logo.png" alt="Logo du site"/> </a>
			<p> 2021 - COLSOLUTION - Creative Common Licence</p>
		    </FOOTER>
	</BODY>
</HTML>

<?php

	}
}
?>
