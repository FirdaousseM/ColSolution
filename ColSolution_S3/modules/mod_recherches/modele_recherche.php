<?php

require_once 'connexion.php';

class ModeleRecherche{
 
    private $bdd;
    
	public function __construct(){
        $co = new Connexion();
        $this->bdd = $co->initConnexion();
    }

    public function getInfoRecherche() {
        
        $users = $this->bdd->query('SELECT * FROM Utilisateurs ORDER BY idUtilisateur DESC LIMIT 10');
      if (isset($_GET['searc']) AND !empty($_GET['searc'])) {
          $searc = htmlspecialchars($_GET['searc']);
          $users = $this->bdd->query('SELECT * FROM Utilisateurs Where nom LIKE "%'.$searc.'%" ORDER BY idUtilisateur DESC ');
      }
      return $users;
    }

}

?>