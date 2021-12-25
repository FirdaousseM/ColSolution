<?php

require_once 'connexion.php';

class ModeleRecherche extends Connexion{

	public function __construct(){
		
	}

	function getUtilisateurs(){
		$laPreparation = self::$bdd->prepare('SELECT * FROM Utilisateurs');
		$laPreparation->execute();
		$testFetch = $laPreparation->fetchAll();
		return $testFetch;
	}
    function getRecherche() {
        $co = new Connexion();
		$bdd = $co->initConnexion();
        if (isset($_GET['search']) AND !empty($_GET['search'])) {

            $s = htmlspecialchars($_GET['search']);
            $users = $bdd->query('SELECT email FROM Utilisateurs Where email "%' .$s. '%s" ORDER BY idUtilisateur DESC');
        }
        
    }

    function recherche() {
        $co = new Connexion();
		$bdd = $co->initConnexion();
        $users = $bdd->query('SELECT * FROM Utilisateurs ORDER BY idUtilisateur DESC');

       
        if (isset($_GET['searc']) AND !empty($_GET['searc'])) {
            $searc = htmlspecialchars($_GET['searc']);
            $users = $bdd->query('SELECT email FROM Utilisateurs Where email LIKE "%'.$searc.'%" ORDER BY idUtilisateur DESC');
            
            
            ?>

                <form method = "GET">
                <input id="searchbar" type="search" name="searc" placeholder="Recherche..." />
			    <input id="euh" type="submit" value="Valider" />
                </form>
            <?php
            if($users->rowCount() > 0) {
                ?>
                <ul>
                    <?php while ($a = $users->fetch()) {
                    ?>
                    <li> <?= $a['email'] ?> </li>
                    <?php } ?>
                </ul>
                    <?php } else { ?>
                    Aucun Résultat...
                    <?php } 
            } 
            
        }
}
?>