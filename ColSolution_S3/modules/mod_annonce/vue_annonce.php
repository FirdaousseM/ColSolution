<?php


class VueAnnonce {

    public function __construct() {
		
    }


    public function depotAnnonceAffichage(){

        echo'
		
		<!-- PAGE ANNONCE COLSOLUTION -->

		<HTML>

			<HEAD>
				<TITLE> Page annonce </TITLE>
				<META CHARSET="UTF-8">
				<link href="css/style.css" rel="stylesheet" type="text/css" />
			</HEAD>
			
			<BODY>
			
				<!-- en tête de page-->
				<p id="pp"> Vous recherchez un colocataire? Vous êtes au bon endroit </p> 

				<HEADER>
					<a href="modules/mod_accueil/accueil.php"> <img class="logo" src="images/logo2.png" alt="Logo du site"/> </a>

					<input id="searchbar" type="text" name="search" placeholder="Recherche..." />
				</HEADER>
				
				<!-- menu de navigation -->
				
				<NAV id="mainNav">
				
					<nav id="menusMessage">
					
						<a class="menuLink" href="message.php">  <img class="icons" src="images/icons/messa.png" alt=""/>Messages </a>
					
					</nav>
					<nav id="Annonce">
					
						<a class="menuLink" href="DepoAnnonce.php"> <img class="icons" src="images/icons/map-marker.png" alt=""/> Deposer Annonce </a>
						<a class="menuLink" href="recherche.php"> <img class="icons" src="images/sr.png" alt=""/> Rechercher Annonce </a>				
					
					</nav>
					
					<nav id="menusCompte">
					
						<a class="menuLink" href="index.php?module="> <img class="icons" src="images/icons/favicon.ico" alt=""/> Mon Compte </a>
					
					</nav>
					
					
				
				
				</NAV>
				
				
				<!-- corps de page -->
				
                <main>
                    <h1> Déposer une nouvelle annonce </h1>
                    <div>
						<form method="POST">
							<div>
								<label for="identifiant">ID :</label>
								<input type="text" id="identifiant" value="">
							</div>
							<div>
								<label for="nom">NOM :</label>
								<input type="text" id="nom" value="nom">
							</div>
							<div>
								<label for="identifiant">ID :</label>
								<input type="text" id="identifiant" value="id">
							</div>
							<div>
								<label for="nom">NOM :</label>
								<input type="text" id="nom" value="nom">
							</div>
							<div>
								<label for="desc">DESCRIPTION :</label>
								<textarea id="desc" value="desc"></textarea>
							</div>
							<div>
								<br/>
								<input type="submit" value="ajout" >
			
							</div>
						</form>
                    </div>
                    <div>

                    </div>
                </main>
                
				
				
				<!-- footer -->
				
				
				<FOOTER>
				
					<a href="modules/mod_accueil/accueil.php"> <img src="images/logo.png" alt="Logo du site"/> </a>
					
					
					<p> 2021 - COLSOLUTION - Creative Common Licence</p>

				
				</FOOTER>

			
			</BODY>


		</HTML>';
    }
    

}



?>