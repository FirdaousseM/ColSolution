<?php


require_once 'modele_annonce.php';
require_once 'vue_annonce.php';

class ContAnnonce{

    private $modele;
	private $vue;
	public $action;

	public function __construct(){
		$this->modele = new ModeleAnnonce();
		$this->vue = new VueAnnonce();
		
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
		}
		else{
			$this->action = "depotAnnonce";
		}
	}



    public function consulterAnnonce() {

		// INFO ANNONCE
		$tabAnnonce = $this->modele->getInfoAnnonce(1);		

		$titre = $tabAnnonce[0]["titre"];
		$desc = $tabAnnonce[0]["description"];
		
		// INFO LOGEMENT
		$tabLogement = $this->modele->getInfoLogement(1);

		$prix = $tabLogement[0]["prix"];
		$type = $tabLogement[0]["type"];
		$superficie = $tabLogement[0]["superficie"];
		$nbChambre = $tabLogement[0]["nbChambre"];

		// INFO LOCALISATION
		$tabLocalisation = $this->modele->getInfoLocalisation(1);

		$metro = $tabLocalisation[0]["presMetro"] == 1 ? "oui" : "non";
		$bus = $tabLocalisation[0]["presBus"] == 1 ? "oui" : "non";
		$train = $tabLocalisation[0]["presTrain"] == 1 ? "oui" : "non";
		$tram = $tabLocalisation[0]["presTram"] == 1 ? "oui" : "non";
		$commerce = $tabLocalisation[0]["presCommerce"] == 1 ? "oui" : "non";

		// INFO USER
		$tabUser = $this->modele->getInfoUser(1);

		$prenom = $tabUser[0]["prenom"];
		$num = $tabUser[0]["NUMTEL"];

		

        $this->vue->consulterAnnonce($titre, $desc, $prix, $type, $superficie, $nbChambre, $metro, $bus, $train, $tram, $commerce, $prenom, $num);

    }

	public function form_depotAnnonce(){
		$this->vue->form_depotAnnonce();
	}

	public function annonce(){
		$this->modele->depotAnnonce();
	}
}
?>