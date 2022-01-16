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
		
		if(isset($_GET['action'])) {
			$this->action = $_GET['action'];
		}
		
	}


	// On récupère les données du modèle, et on les envoie à la vue qui les affiche
    public function consulterAnnonce() {

		$idAnnonce;
		if(isset($_GET['id']))
			$idAnnonce = $_GET['id'];
			 
		
		// INFO ANNONCE
		$tabAnnonce = $this->modele->getInfoAnnonce($idAnnonce);		

		$titre = $tabAnnonce[0]["titre"];
		$desc = $tabAnnonce[0]["description"];
		
		// IMAGE ANNONCE
		$img = $this->modele->getImg($idAnnonce);

		// INFO LOGEMENT
		$tabLogement = $this->modele->getInfoLogement($idAnnonce);

		$prix = $tabLogement[0]["prix"];
		$type = $tabLogement[0]["type"];
		$superficie = $tabLogement[0]["superficie"];
		$nbChambre = $tabLogement[0]["nbChambre"];

		// INFO LOCALISATION
		$tabLocalisation = $this->modele->getInfoLocalisation($idAnnonce);

		$metro = $tabLocalisation[0]["presMetro"] == 1 ? "oui" : "non";
		$bus = $tabLocalisation[0]["presBus"] == 1 ? "oui" : "non";
		$train = $tabLocalisation[0]["presTrain"] == 1 ? "oui" : "non";
		$tram = $tabLocalisation[0]["presTram"] == 1 ? "oui" : "non";
		$commerce = $tabLocalisation[0]["presCommerce"] == 1 ? "oui" : "non";

		// INFO USER
		$tabUser = $this->modele->getInfoUser($idAnnonce);

		$prenom = $tabUser[0]["prenom"];
		$num = $tabUser[0]["NUMTEL"];
		$avatar = $tabUser[0]["avatar"];

		
		// On met toutes les infos dans un tab
		$tabInfo = array();
		$tabInfo = [
			"titre" => $titre,
			"desc" => $desc,
			"img" => $img,
			"prix" => $prix,
			"type" => $type,
			"superficie" => $superficie,
			"nbChambre" => $nbChambre,
			"metro" => $metro,
			"bus" => $bus,
			"train" => $train,
			"tram" => $tram,
			"commerce" => $commerce,
			"prenom" => $prenom,
			"num" => $num,
			"avatar" => $avatar

		];


		

        $this->vue->consulterAnnonce($tabInfo);

    }


	// On effectue les inserts de la nouvelle annonce
	public function deposerAnnonce(){
		$this->modele->depotAnnonce();
		$this->vue->form_depotAnnonce();

	}
}
?>