
<?php
ini_set('display_errors', true);
error_reporting(E_ALL ^ E_NOTICE); 
	
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
		case 'mod_connexion': $controleur->moduleChoisi = new ModConnexion();
		break;
		case 'mod_recherche': $controleur->moduleChoisi = new ModRecherche();
		break;
		case 'mod_modifCompte': $controleur->moduleChoisi = new ModModifCompte();
		break;
		case 'mod_message': $controleur->moduleChoisi = new ModMessage();
		break;
	
		
	} 
	
 ?>
 