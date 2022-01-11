
<?php

require_once 'cont_recherche.php';

class ModRecherche{

    public $controlerr;

    public function __construct(){
		$this->controlerr = new ContRecherche();

        switch($this->controlerr->action){
            case "Users":
                $this->controlerr->form_compte();
                break;
            case "Valider":
                $this->controlerr->form_compte();
                break;
        }

        if(!(empty($this->controlerr->ok)) AND isset($_GET['searc']) AND !empty($_GET['searc']) AND isset($_POST['Valider'])) {
            $this->controlerr->form_compte();
        }
       
    
		
	}

}
 
?>
