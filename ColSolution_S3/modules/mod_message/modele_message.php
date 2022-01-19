<?php
require_once 'connexion.php';


class ModeleMessage {
    
    private $bdd;

    public function __construct(){
		
	}

    function message(){
        
        
        if(isset($_POST['envoie'])) {
            if(isset($_POST['destinataire'], $_POST['message'], $_POST['objet']) AND !empty($_POST['destinataire']) AND !empty($_POST['message']) AND !empty($_POST['objet'])) {
                $destinataire = htmlspecialchars($_POST['destinataire']);
                $message = htmlspecialchars($_POST['message']);
                $objet = htmlspecialchars($_POST['objet']);

                $idDes = $this->bdd->prepare('SELECT idUtilisateur FROM Utilisateurs WHERE email = ?');
                $idDes->execute(array($destinataire));
                $idDes = $idDes->fetch();
                $idDes = $idDes['idUtilisateur'];

                $ins = $this->bdd->prepare('INSERT INTO Message(idUtilisateur,ObjetMessage,ContenuMessage,idDestinataire) VALUES (?,?,?,?)');
                $ins->execute(array($_SESSION['idUtilisateur'],$objet,$message,$idDes));
                ?>
                <script type="text/javascript">
                alert("Message envoyé");
                </script>
                <?php

            }
        }
    }

    public function getDestinataireMessage(){
        
        $msg = $this->bdd->prepare('SELECT * FROM Message WHERE idDestinataire = ? ORDER BY idMessage DESC');
        $msg->execute(array($_SESSION['idUtilisateur']));
        return $msg;
    }

    public function getExpediteurMessage(){
        
        $msg = $this->bdd->prepare('SELECT * FROM Message WHERE idUtilisateur = ? ORDER BY idMessage DESC');
        $msg->execute(array($_SESSION['idUtilisateur']));
        return $msg;
    }

    public function getNbreMessageDestinataire(){
        $msg = $this->getDestinataireMessage();
        $nbreMessage = $msg->rowCount();
        return $nbreMessage;
    }

    public function getNbreMessageExpediteur(){
        $msg = $this->getExpediteurMessage();
        $nbreMessage = $msg->rowCount();
        return $nbreMessage;
    }

    public function getEmailExp(){
        $msg = $this->getDestinataireMessage();
        $m = $msg->fetch();
         
        $exp = $this->bdd->prepare('SELECT email FROM Utilisateurs WHERE idUtilisateur = ? ');
        $exp->execute(array($m['idUtilisateur']));
        $exp = $exp->fetch();
        $exp = $exp['email'];
        return $exp;
    }
    public function getEmailDes(){
        $msg = $this->getExpediteurMessage();
        $m = $msg->fetch();
         
        $exp = $this->bdd->prepare('SELECT email FROM Utilisateurs WHERE idUtilisateur = ? ');
        $exp->execute(array($m['idDestinataire']));
        $exp = $exp->fetch();
        $exp = $exp['email'];
        return $exp;
    }

    public function messageLu() {
         
        $lu = $this->bdd->prepare('UPDATE Message SET lu = 1 WHERE idMessage = ?');
        $lu->execute(array($m['idMessage']));

        return $lu;
    }

    public function getMsgLec($id_message,$idUser){
        
        $msg = $this->bdd->prepare('SELECT * FROM Message WHERE idMessage = ? AND idDestinataire = ?');
        $msg->execute(array($id_message,$idUser));
        $m = $msg->fetch();
        return $m;
    }

    public function getNbreMsgLec($id_message,$idUser){
        
        $msg = $this->bdd->prepare('SELECT * FROM Message WHERE idMessage = ? AND idDestinataire = ?');
        $msg->execute(array($id_message,$idUser));
        $nbreMessageD = $msg->rowCount();
        return $nbreMessageD;
    }

    public function getInfoLec($id_message,$idUser) {
            $m = $this->getMsgLec($id_message,$idUser);
            $co = new Connexion();
            $this->bdd = $co->initConnexion(); 
            $exp = $this->bdd->prepare('SELECT * FROM Utilisateurs WHERE idUtilisateur = ? ');
            $exp->execute(array($m['idUtilisateur']));
            $exp2 = $exp->fetch();
            return $exp2;
    }

    public function getEmailLec($id_message,$idUser) {
        $m = $this->getMsgLec($id_message,$idUser);
         
        $exp = $this->bdd->prepare('SELECT * FROM Utilisateurs WHERE idUtilisateur = ? ');
        $exp->execute(array($m['idUtilisateur']));
        $exp2 = $exp->fetch();
        $email = $exp2['email'];
        return $email;
    }

    function supprimer() {
        
        
        if(isset($_SESSION['idUtilisateur']) AND !empty($_SESSION['idUtilisateur']) AND $_GET['jeton'] == $_SESSION['jeton']){

            if(isset($_GET['idMessage']) AND !empty($_GET['idMessage'])) {
                $id_message = intval($_GET['idMessage']);
                $msg = $this->bdd->prepare('DELETE * FROM Message WHERE idMessage = ? AND idDestinataire = ?');
                $msg->execute(array($_GET['idMessage'], $_SESSION['idDestinataire']));

                header('Location:index.php?module=message&action=envoie');
            }
        }

    }

}

?>