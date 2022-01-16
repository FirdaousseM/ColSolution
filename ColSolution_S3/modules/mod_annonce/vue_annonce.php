<?php


class VueAnnonce {
	
	public function __construct(){
		
	}

	
	public function consulterAnnonce($tabInfo){

		echo'
		<HTML>

			<HEAD>
				<TITLE> Colsolution </TITLE>
				<META CHARSET="UTF-8">
				
				<link href="css/accueil.css" rel="stylesheet" type="text/css" />
				<link href="css/consultAnnonce.css" rel="stylesheet" type="text/css" />


			</HEAD>
			
			<BODY>';
			
				include 'html/header.html';
	
				echo'
				<!-- corps de page -->

				<MAIN>
					<section id="upSection">
						<h1>'.$tabInfo['titre'].'</h1>
						<div id="imgAnnonce">
							<img src="public/annonces/'.$tabInfo['img'].'" alt="Image Annonce"/>
							<button> <img src="images/icons/nextArrow.png" alt=""/></button>
							<h2vv> '.$tabInfo['prix'].'€ </h2>
							<img id="rating" src="images/icons/ratingImg.png" alt="note"/>			
						</div>
						<div id="infoAnnonce">
							<p>'.$tabInfo['desc'].'</p>
						</div>
					</section>
					<section id="downSection">
						<div id="infoUser">
							<img src="public/avatars/'.$tabInfo['avatar'].'" alt="" />
							<p> '.$tabInfo['prenom'].' <br/> '.$tabInfo['num'].' </p>
						</div>
						<div id="filtersBoxContainer">
							<div class="filtersBox">
								<p>Type</p>
								<p class="valeurs">'.$tabInfo['type'].'</p>
							</div>
							<div class="filtersBox">
								<p>Superficie</p>
								<p class="valeurs">'.$tabInfo['superficie'].'</p>
							</div>
							<div class="filtersBox">
								<p>Chambres</p>
								<p class="valeurs">'.$tabInfo['nbChambre'].'</p>
							</div>
							<div class="filtersBox">
								<p>Metro</p>
								<p class="valeurs">'.$tabInfo['metro'].'</p>
							</div>
							<div class="filtersBox">
								<p>Bus</p>
								<p class="valeurs">'.$tabInfo['bus'].'</p>
							</div>
							<div class="filtersBox">
								<p>Train</p>
								<p class="valeurs">'.$tabInfo['train'].'</p>
							</div>
							<div class="filtersBox">
								<p>Tram</p>
								<p class="valeurs">'.$tabInfo['tram'].'</p>
							</div>
							<div class="filtersBox">
								<p>Commerce</p>
								<p class="valeurs">'.$tabInfo['commerce'].'</p>
							</div>
							
						</div>
					</section>
					
				</MAIN>	';

				
				
				include 'html/footer.html';

				echo'

			</BODY>	
		<HTML>';
	}
	

	public function form_depotAnnonce(){
        //if(!$_SESSION['email']) header('Location:../index.php?module=mod_connexion&action=connexion');
	?>	
	<!-- PAGE ACCUEIL COLSOLUTION -->
	<HTML>
		<HEAD>
			<TITLE> Colsolution - déposez votre annonce </TITLE>
			<META CHARSET="UTF-8">


			<link rel="stylesheet" type="text/css" href="css/util.css">
			<link rel="stylesheet" type="text/css" href="css/accueil.css">
		</HEAD>
				
		<BODY>
				
			<?php include 'html/header.html'; ?>
			
			<!-- corps de page -->
			<MAIN>
				<SECTION>
				
					<ARTICLE>
					
						<h2 id="haha" >DEPOSER UNE ANNONCE</h2>
						
						<form class="login100-form validate-form" method="POST" action="index.php">
							<!-- TITRE -->	
							<div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
								<span class="label-input100">Titre</span>
								<input class="input100" type="text" name="titre"  >
								<span class="focus-input100"></span>
							</div>
							<!-- SUPERFICIE -->
							<div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
								<span class="label-input100">Superficie</span>
								<input class="input100" type="number" name="superficie"  >
								<span class="focus-input100">m²</span>
							</div>
							<!-- TYPE -->
							Type :
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="type" id="inlineRadio1" >
								<label class="form-check-label" for="inlineRadio1">appart.</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="type" id="inlineRadio2" >
								<label class="form-check-label" for="inlineRadio2">maison</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="type" id="inlineRadio3" >
								<label class="form-check-label" for="inlineRadio3">studio</label>
							</div>
						
							<!-- NB.CHAMBRE -->
							<div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
								<span class="label-input100">Nbre de chambres</span>
								<input class="input100" type="number" name="nbChambre"  >
								<span class="focus-input100"></span>
							</div>
							<!-- PRIX -->
							<div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
								<span class="label-input100">Prix</span>
								<input class="input100" type="text" name="prix"  >
								<span class="focus-input100">€</span>
							</div>
							<!-- LOCALISATION -->
							<div class="wrap-input100 validate-input m-b-26" data-validate="Recipient is required">
								<span class="label-input100">Localisation</span>
								<input class="input100" type="text" name="ville" value="" placeholder="saisissez ici votre ville" >
								<input class="input100" type="text" name="quartier" value="" placeholder="votre quartier">
								<input class="input100" type="text" name="rue" value="" placeholder="votre rue">
								<input class="input100" type="text" name="codePostal" value="" placeholder="votre code Postal">
								<span class="focus-input100"></span>
							</div>
							<!-- DESCRIPTION -->
							<div class="wrap-input100 validate-input m-b-18" data-validate = "Description is required">
								<span class="label-input100">Description</span>
								<textarea id="mess" name="description"
								rows="5" cols="94">
								
								</textarea>
								<span class="focus-input100"></span>
							</div>

							<!-- AJOUT IMAGE -->
							<p> Ajouter une photo </p>
							<div class="flex-sb-m w-full p-b-30">
								<div class="flex-sb-m w-full p-b-30">
									<input type="file" name="annonce" />		
							</div>

							<!-- SUBMIT -->
							<div class="container-login100-form-btn">
								<button class="login100-form-btn" name = "publier">
									publier
								</button>
							</div>
						

					</ARTICLE>
				</SECTION>
			</MAIN>
			<!-- footer -->
			
			
			<?php include 'html/footer.html'; ?>
		
		</BODY>
	</HTML>
	<?php

    }

}


?>