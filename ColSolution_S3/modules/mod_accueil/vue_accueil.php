<?php 

class VueAccueil {

	public function __construct() {
		
	}

	public function affichage($search, $tupleAnnonce, $tupleImages) {
	?>
		
		<!-- PAGE ACCUEIL COLSOLUTION -->
		<HTML>
			<HEAD>
				<TITLE> Colsolution </TITLE>
				<META CHARSET="UTF-8">
				<link href="css/accueil.css" rel="stylesheet" type="text/css" />
			</HEAD>
		

			<BODY>

				<?php 
					include 'html/header.html';
				?>

				<!-- corps de page -->
				<MAIN>
					<SECTION>
					
						<ARTICLE>
							<?php 

							
							if (empty($_GET['annonce'])) { 
							?>
								<h2> DERNIERES ANNONCES </h2>
							<?php 
							} 
							else {
							?> 
								<h2> RESULTAT POUR "<?= $search ?>" </h2> 
							<?php 
							}  
							if($tupleAnnonce->rowCount() > 0) { 
								while($annonce = $tupleAnnonce->fetch() AND $image = $tupleImages->fetch()) {
							?>
								<div id="an1">
								<div id="an1_pic"> 
								<?php
								if($image['nomImage'] == null) { ?>
									<a href="index.php?module=mod_annonce&action=consultAnnonce&id=<?= $annonce['idAnnonce']?>"> <img class="an" src="images/annoncee.png" alt="annonce"/> </a>
								<?php 
								} 
								else {?>
									<a href="index.php?module=mod_annonce&action=consultAnnonce&id=<?= $annonce['idAnnonce']?>"> <img class="an" src="public/annonces/<?= $image['nomImage'];?>" alt="annonce"/> </a>
								<?php 
								}
								?>
								</div>
								<a href="index.php?module=mod_annonce&action=consultAnnonce&id=<?= $annonce["idAnnonce"]?>" >
									<div id="an1_text">
										<h3><?= $annonce['titre']; ?> </h3>
										<p> <?= $annonce['description']; ?> </p>   
									</div>
								</a>
							</div>
                    		<?php
								} 
							}
							?>
						</ARTICLE>
					</SECTION>
				</MAIN>


				

				<?php
					include 'html/footer.html';

					if(!isset($_COOKIE['accepter'])) {
				?>
					<div class = "banniere">
						<div class = "text_banniere">
							<p> Bienvenue sur COLSOLUTION, notre site utilise des cookies pour une meilleure expérience </p>
						</div>
						<div class="button_banniere" >
							<a id="tb" href="index.php?cookie=accepter">Tout accepter et continuer</a>
						</div>
					</div>
					<?php
					}
					?>
				
				</FOOTER> 
			</BODY>
		</HTML>

<?php
	}




}
?>
