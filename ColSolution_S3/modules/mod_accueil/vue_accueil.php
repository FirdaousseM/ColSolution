
<?php 


class VueAccueil {
	

	public function __construct() {
		$this->affichage();
	}

	public function affichage() {
		echo'
		
		<!-- PAGE ACCUEIL COLSOLUTION -->

		<HTML>

			<HEAD>
				<TITLE> Colsolution </TITLE>
				<META CHARSET="UTF-8">
				<link href="css/accueil.css" rel="stylesheet" type="text/css" />

			</HEAD>
			
			<BODY>
			
				<!-- en tête de page-->
				<p id="pp"> Vous recherchez un colocataire? Vous êtes au bon endroit </p> 

				<HEADER>
					<a href="index.php"> <img class="logo" src="images/logo2.png" alt="Logo du site"/> </a>

					<input id="searchbar" type="text" name="search" placeholder="Recherche..." />
				</HEADER>
				
				<!-- menu de navigation -->
				
				<NAV id="mainNav">
				
					<nav id="menusMessage">
					
						<a class="menuLink" href="message.php">  <img class="icons" src="images/icons/messa.png" alt=""/>Messages </a>
					
					</nav>
					<nav id="Annonce">
					
						<a class="menuLink" href="index.php?module=mod_annonce&action=depotAnnonce"> <img class="icons" src="images/icons/map-marker.png" alt=""/> Deposer Annonce </a>
						<a class="menuLink" href="index.php?module=mod_recherche&action=Users.php"> <img class="icons" src="images/sr.png" alt=""/> Rechercher Annonce </a>				
					
					</nav>
					
					<nav id="menusCompte">
					
						<a class="menuLink" href="index.php?module=mod_compte&action=compte"> <img class="icons" src="images/icons/favicon.ico" alt=""/> Mon Compte </a>
					
					</nav>

				</NAV>
				
				
				<!-- corps de page -->
				
				
				<MAIN>
					<SECTION>
					
						<ARTICLE>
						
							<h2> DERNIERES ANNONCES </h2>
							
							<div id="an1"> 
							
								<div id="an1_pic">
									<a href="index.php?module=mod_annonce&action=consultAnnonce"> <img class="an" src="images/annoncee.png" alt="annonce"/> </a>
								</div>

								<div id="an1_text">
								
									<h3> TITRE ANNONCE 1</h3>
								
									<p> BLABLABLABLABLABLABLABLABLALBABLABLA  </p> <a href="index.php?module=mod_annonce&action=consultAnnonce"> [Lire la suite] </a>
								
								</div>
							
							</div>
							
							<div id="an2">
							
								<div id="an2_pic">
							
									<a href="index.php?module=mod_annonce&action=consultAnnonce"> <img class="ann" src="images/annoncee.png" alt="an2"/> </a>
								</div>

								<div id="an2_text">
								
									<h3> TITRE ANNONCE 2 </h3>
								
									<p> BLABLABLABLABLABLABLABLABLALBABLABLA </p> <a href="index.php?module=mod_annonce&action=consultAnnonce"> [Lire la suite] </a>
							
								</div>
							</div>
							<div id="an3">
								<div id="an3_pic">
							
									<a href="index.php?module=mod_annonce&action=consultAnnonce"> <img class="an" src="images/annoncee.png" alt="an3"/> </a>
								</div>

								<div id="an3_text">
								
									<h3> TITRE ANNONCE 3 </h3>
								
									<p> BLABLABLABLABLABLABLABLABLALBABLABLA </p> <a href="index.php?module=mod_annonce&action=consultAnnonce"> [Lire la suite] </a>
							
								</div>
							
							</div>
							
							
							<div id="an4">
							
								<div id="an4_pic">
							
									<a href="index.php?module=mod_annonce&action=consultAnnonce"> <img class="ann" src="images/annoncee.png" alt="an4"/> </a>
								</div>

								<div id="an4_text">
								
									<h3> TITRE ANNONCE 4 </h3>
								
									<p> BLABLABLABLABLABLABLABLABLALBABLABLA </p> <a href="index.php?module=mod_annonce&action=consultAnnonce"> [Lire la suite] </a>
								
								</div>
							
							</div>
							
							
						
						</ARTICLE>
					
					</SECTION>
				</MAIN>
				
				
				<!-- footer -->	
				
				<FOOTER>
				
					<a href="index.php"> <img src="images/logo.png" alt="Logo du site"/> </a>
					<p> 2021 - COLSOLUTION - Creative Common Licence</p>

				</FOOTER>

			</BODY>


		</HTML>';
	}



}
		
?>

