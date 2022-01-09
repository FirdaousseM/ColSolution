
<?php
 
 	require_once 'controleur_general.php';
	
	session_start();
	
	$controleur = new ContGeneral();
  
  
 	require_once "modules/$controleur->moduleDemande/$controleur->moduleDemande.php";
  
	switch($controleur->moduleDemande){
  
		case 'mod_accueil': $controleur->moduleChoisi = new ModAccueil(); 
		break;
		case 'mod_compte': $controleur->moduleChoisi = new ModCompte(); 
		break;
		case 'mod_annonce': $controleur->moduleChoisi = new ModAnnonce();
		break;
		case 'mod_inscription': $controleur->moduleChoisi = new ModInscription();
		break;
	} 
  
  
 ?>
 