<?php
class VueCompte{

	public function __construct(){
		
	}

	function form_compte(){
	?>  
<?php
if(!$_SESSION['email']) header('Location:../index.php?module=form&action=connexion');
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
		<p id="pp"> Vous recherchez un colocataire? Vous êtes au bon endroit </p> 
		<HEADER>
			<a href="accueil.php"> <img class="logo" src="../images/logo2.png" alt="Logo du site"/> </a>
            <input id="searchbar" type="text" name="search" placeholder="Recherche..." />
		</HEADER>
		<!-- menu de navigation -->	
		<NAV id="mainNav">
			<nav id="menusMessage">
				<a class="menuLink" href="message.php">  <img class="icons" src="../images/icons/messa.png" alt=""/>Messages </a>
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
							<a href="DepoAnnonce.php"> <img class="an" src="../images/pp.png" alt="Photo de profil"/> </a>
						</div>
                        <div id="info">
						<h2 id= "ptt"> Données Personnels </h2>
							<?php echo "Email : ". $_SESSION['email'] ; ?>
							<p> Nom : .......  </p> 
                            <p> Prénom : .......  </p> 
                            <p> Age : .......  </p> 
                            <p> Sexe : .......  </p> 
                            <p> Contact : .......  </p> 
						</div>
					</div>

                    <div id="Description"> 
					<h2 id= "text">DESCRIPTION </h2>
                        <textarea id="Des" name="story"
                        rows="15" cols="135">
                        Présentez vous...
                    </textarea>
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