<?php

require_once 'connexion.php';

class ModeleAccueil{
	public $vue;
    private $bdd;


    public function __construct() { 
        $this->filtre();
        $this->cookie();

        $co = new Connexion();
		$this->bdd = $co->initConnexion();
    }
    public function cookie() {
        if(isset($_GET['cookie'])) { 
       $cookie = new Connexion();
       $cookie -> cookies();
        }
    }

    public function filtre() {

       if(isset($_POST['confirmer']) AND !empty($_POST['confirmer'])){
          if(isset($_POST['appt']) AND !empty($_POST['appt'])){
                header('Location:index.php?annonce=appartement');
            }

        }
    }

    public function infoAnnonces() {
        
		$annonce = $this->bdd->query('SELECT * FROM Annonce natural join Image Where Annonce.idImage=Image.idImage ORDER BY idAnnonce DESC LIMIT 5 ');

		if (isset($_GET['annonce']) AND !empty($_GET['annonce'])) {
			$search = htmlspecialchars($_GET['annonce']);
			$annonce = $this->bdd->query('SELECT * FROM Annonce natural join Image Where Annonce.idImage=Image.idImage AND Annonce.titre LIKE "%'.$search.'%" ORDER BY idAnnonce DESC LIMIT 4 ');
		}
        return $annonce;
    }

    public function getSearch() {
        $search = null;
		if (isset($_GET['annonce']) AND !empty($_GET['annonce'])) {
			$search = htmlspecialchars($_GET['annonce']);
		}
        return $search;

    }
}

?>