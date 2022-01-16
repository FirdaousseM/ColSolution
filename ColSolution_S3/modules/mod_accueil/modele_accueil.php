<?php

require_once 'connexion.php';
class ModeleAccueil{


    public function __construct() { 
        
    }

    private function bddCo(){
        
        $co = new Connexion(); 
		$bdd = $co->initConnexion();
        return $bdd;
    }

    public function cookie() {
        if(isset($_GET['cookie'])) { 
            $co = new Connexion();
            $cookie = $co->cookies(); 
        }
    }

    public function getAnnonces(){
        
        $bdd = $this->bddCo();


        $tabDonnee = array();
        
        //Recherche Annonce
        if(isset($_GET['annonce'])) {
            $search = $_GET['annonce'];

            $selectAnno = $bdd->query('SELECT * FROM Annonce Where titre LIKE \'%'.$search.'%\' ORDER BY idAnnonce DESC LIMIT 4');
            $selectImg = $bdd->query('SELECT * FROM Image inner join Annonce using(idAnnonce) WHERE Annonce.titre LIKE \'%'.$search.'%\' ORDER BY idAnnonce DESC LIMIT 4');		
        
            $tabDonnee["search"] = $search;
        }
        //Dernieres Annonce
        else {
            $selectAnno = $bdd->query('SELECT * FROM Annonce ORDER BY idAnnonce DESC LIMIT 4');

            $selectImg = $bdd->query('SELECT * FROM Image natural join Annonce WHERE Image.idAnnonce = Annonce.idAnnonce ORDER BY idImage DESC LIMIT 4');

            $tabDonnee["search"] = NULL;

        }

        $tupleAnnonce = $selectAnno;	

        $tupleImages = $selectImg;

        $tabDonnee["annonce"] = $tupleAnnonce;
        $tabDonnee["images"] = $tupleImages;

        
        return $tabDonnee;
    }
}

?>
