<?php
class VueModifCompte{

	public function __construct(){
		
	}

	function form_modifCompte(){
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
		<link href="../global/modifCompte.css" rel="stylesheet" type="text/css" />
	</HEAD>
	<BODY>
		<!-- en tête de page-->
		<p id="pp"> Vous recherchez un colocataire? Vous êtes au bon endroit </p> 
		<HEADER>
			<a href="index.php"> <img class="logo" src="../images/logo2.png" alt="Logo du site"/> </a>
            <input id="searchbar" type="text" name="search" placeholder="Recherche..." />
		</HEADER>
		<!-- menu de navigation -->	
		<NAV id="mainNav">
			<nav id="menusMessage">
				<a class="menuLink" href="message.php">  <img class="icons" src="../images/icons/messa.png" alt=""/>Messages </a>
			<!--	<a class="menuLink" href="message.php">  <img class="icons" src="../images/icons/messa.png" alt=""/>Modifier Compte </a>  -->	
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
        <div align="center">
            <h2> Modification de mon profil </h2>
                <form method="POST" action="" enctype="multipart/form-data">
                <table>
                <tr>
                    <td>
                        <label for="nom"> Nouveau email : </label>
                         </td>
                            <td>
                               <input type="text" placeholder="<?php echo $_SESSION['email'] ;?>" id ="mail" name="maill" value = ""/>     
                            </td>     
                        </tr>
                        <tr>
                    <td>
                        <label for="nom"> Numéro de Téléphone : </label>
                         </td>
                            <td>
                               <input type="text" placeholder="<?php echo $_SESSION['NUMTEL'] ;?>" id ="num" name="num" value = ""/>     
                            </td>     
                        </tr>  				
                        <tr>
                    
                                <td>
                                  <label for="nom"> Nouveau mot de passe : </label>
                                </td>
                                <td>
                                    <input type="password" placeholder="mot de passe" id ="pwd" name="mdp" />     
                                </td>     
                            </tr> 	
                            <tr>
                                <td>
                                    <label for="nom"> Confirmation de mot de passe : </label>
                            </td>
                            <td>
                                    <input type="password" placeholder="mot de passe" id ="pwd" name="mdp2" />     
                                </td> 
                            </tr>
                                <tr>
                                <td>
                                <label> Avatar : </label>
                                </td>
                                <td>
                                <input type="file" name="avatar" />                              
                              </td>     
                            </tr> 
                            </table>
                            <div id="Description"> 
					<h2 id= "text">DESCRIPTION </h2>
                        <textarea id="Des" name="story"
                        rows="15" cols="135">
                        <?php echo $_SESSION['description'] ; ?>
                    </textarea>
					</div>
                    <table>
                    <tr>
                                <td></td>
                                <td>
                                <input type="submit" value="Terminer la Modification" name ="modif"/>
                                </td>
                            </tr>  

                    </table>
                </form>
                <?php if (isset($msg)) echo $msg ; ?>
            </div>
        </div>
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