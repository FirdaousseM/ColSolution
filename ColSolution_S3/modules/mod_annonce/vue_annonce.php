<?php
class VueAnnonce {
	public function __construct(){
		
	}
	function form_depotAnnonce(){
        if(!$_SESSION['email']) header('Location:../index.php?module=form&action=connexion');
		if (isset($_GET['annonce']) AND !empty($_GET['annonce'])){
			header('Location:index.php');
		 }
?>  

<!-- PAGE ACCUEIL COLSOLUTION -->
<HTML>
			<HEAD>
				<TITLE> Colsolution </TITLE>
				<META CHARSET="UTF-8">


	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/annonce.css" rel="stylesheet" type="text/css" />

			</HEAD>
			
			<BODY>
			
				<!-- en tête de page-->
				</br>
				<p id="pp"> Vous recherchez un colocataire ? Vous êtes au bon endroit </p> 
				<HEADER>
					<a href="index.php"> <img class="logo" src="images/COL.png" alt="Logo du site"/> </a>
					<form id="searchbar" method = "GET">
					<input id="searchbar" type="search" name="annonce" placeholder="Recherche..." />
					</form>
					<div style ="margin-top:20px">
					<div id="result"></div>
					</div>
				</HEADER>
				
				<!-- menu de navigation -->
	
				<NAV id="mainNav">
				
					<nav id="menusMessage">
					
						<a class="menuLink" href="index.php?module=message&action=message">  <img class="icons" src="images/icons/messa.png" alt=""/>Messages </a>
					
					</nav>
					<nav id="Annonce">
					
						<a class="menuLink" href="index.php?module=annonce&&action=depotAnnonce"> <img class="icons" src="images/icons/map-marker.png" alt=""/> Deposer Annonce </a>
						<a class="menuLink" href="index.php?module=recherche&action=Users"> <img class="icons" src="images/sr.png" alt=""/> Rechercher Annonce </a>				
					</nav>
					<nav id="menusCompte">
					
						<a class="menuLink" href="index.php?module=inscription&action=inscription"> <img class="icons" src="images/icons/favicon.ico" alt=""/> Mon Compte </a>
					</nav>
				</NAV>
				<!-- corps de page -->
				<MAIN>
					<SECTION>
					
						<ARTICLE>
						
							<h2 id="haha" >DEPOSER UNE ANNONCE</h2>
							
                            <form class="login100-form validate-form" method="POST" action="" enctype="multipart/form-data">
				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
						<span class="label-input100">Titre</span>
						<input class="input100" type="text" name="titre" value="" >
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
						<span class="label-input100">Superficie</span>
						<input class="input100" type="text" name="superficie" value="" >
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
						<span class="label-input100">Type</span>
						<input class="input100" type="text" name="type" value="" >
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
						<span class="label-input100">Nbre de chambres</span>
						<input class="input100" type="text" name="nbChambre" value="" >
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
						<span class="label-input100">Prix</span>
						<input class="input100" type="text" name="prix" value="" >
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
						<span class="label-input100">Localisation</span>
						<input class="input100" type="text" name="ville" value="" placeholder="saisissez ici votre ville" >
                        <input class="input100" type="text" name="quartier" value="" placeholder="votre quartier">
						<input class="input100" type="text" name="rue" value="" placeholder="votre rue">
						<input class="input100" type="text" name="codePostal" value="" placeholder="votre code Postal">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Description is required">
						<span class="label-input100">Description</span>
						<textarea id="mess" name="description"
                        rows="5" cols="94">
                        Votre Description...
                        </textarea>
						<span class="focus-input100"></span>
					</div>

                    <p> Ajouter une photo </p>
                    <div class="flex-sb-m w-full p-b-30">
						<div class="flex-sb-m w-full p-b-30">
							<input type="file" name="annonce" />		
					</div>

                    <div class="container-login100-form-btn">
						<button class="login100-form-btn" name = "publier">
							publier
						</button>
					</div>							
							</div>
						</ARTICLE>
					</SECTION>
				</MAIN>
				<!-- footer -->
				
				
				<FOOTER>
				
					<a href="modules/mod_accueil/accueil.php"> <img src="images/COL.png" alt="Logo du site"/> </a>

					<p> 2021 - COLSOLUTION - Creative Common Licence</p>
				
				</FOOTER>
			
			</BODY>
		</HTML>
<?php
    }
}

?>
