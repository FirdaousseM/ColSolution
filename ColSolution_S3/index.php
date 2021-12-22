<?php

	require_once 'controleur.php';
    require_once 'connexion.php';
    require_once 'vue.php';
	require_once 'modules/mod_connexion/vue_connexion.php';
	require_once 'modules/mod_connexion/mod_connexion.php';
	require_once 'modules/mod_compte/mod_compte.php';
	require_once 'modules/mod_recherches/mod_recherche.php';
	require_once 'modules/mod_recherches/vue_recherche.php';
	require_once 'modules/mod_accueil/mod_accueil.php';
	require_once 'modules/mod_inscription/mod_inscription.php';
	require_once 'modules/mod_modifCompte/mod_modifCompte.php';


    $vue = new Vue();
	$vueR = new VueRecherche();
	$controleur = new controleur();

	switch($controleur->module){
		case "form":
			$mod = new ModConnexion();
			break;
		case "compte":
			$mod = new ModCompte();
			break;
		case "recherche":
			$mod = new ModRecherche();
			break;
		case "inscription":
			$mod = new ModInscription();
			break;
		case "modif":
			$mod = new ModModifCompte();
			break;
		default :
			$mod = new ModAccueil();
	}
	





