<?php 

class VueAccueil {

	public function __construct() {

	}

	public function affichage($annonce,$search) {

	?>
		
		<!-- PAGE ACCUEIL COLSOLUTION -->
		<HTML>
			<HEAD>
				<TITLE> Colsolution </TITLE>
				<META CHARSET="UTF-8">
				<link href="css/accueil.css" rel="stylesheet" type="text/css" />

			</HEAD>
		
			<BODY>

				<?php include 'html/header.html'; ?>

				<!-- corps de page -->
				<MAIN>
					<SECTION>
						<ARTICLE>
						
						<?php
						if (empty($_GET['annonce'])) { ?>
							<h2> DERNIERES ANNONCES </h2>
						<?php 
						} else {?> 
							<h2> RESULTAT POUR "<?= $search ?>" </h2> 
						<?php
						} if($annonce->rowCount() > 0) {
                		?>
                    <?php while($annonces = $annonce->fetch()) {
                    ?>
					<div id="an1">
						<div id="an1_pic"> 
							<?php
							if($annonces['nomImage'] == null ) { ?>
						<a href="index.php?module=annonce&action=consultAnnonce&idAnnonce=<?= $annonces['idAnnonce']; ?>"> <img class="an" src="images/annoncee.png" alt="annonce"/> </a>
							<?php } ?>
						<?php
						if($annonces['nomImage'] != null ) { ?>
							<a href="index.php?module=annonce&action=consultAnnonce&idAnnonce=<?= $annonces['idAnnonce']; ?>"> <img class="an" src="public/annonces/<?php echo $annonces['nomImage'];?>" alt="annonce"/> </a>
							<?php } ?>
						</div>
						<div id="an1_text">
							<h3><?= $annonces['titre']; ?> </h3>
							<p> <?= $annonces['description']; ?> </p> <a href="index.php?module=annonce&action=depotAnnonce" >  </a>
						</div>
					</div>
                    <?php
						} 
					}?>
						</ARTICLE>
					</SECTION>
				</MAIN>


				<!-- footer -->
				<FOOTER> 				
					<a href="index.php"> <img src="images/COL.png" alt="Logo du site"/> </a>				
					<p id ="fp" > 2021 - COLSOLUTION - Creative Common Licence </p>;

				<?php
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