<?php

require_once 'connexion.php';

class ModeleModifCompte {

    private $bdd;

	public function __construct(){
		$co = new Connexion();
        $this->bdd = $co->initConnexion();
	}

function modifCompte() {
    if (isset($_POST['modif'])) 
    {
    $newmail = htmlspecialchars($_POST['maill']);
    $newmdp = sha1($_POST['mdp']);
    $newmdp2 = sha1($_POST['mdp2']);
    $des = htmlspecialchars($_POST['story']);
    $num = htmlspecialchars($_POST['num']);

    
    $check = $this->bdd->prepare('SELECT * FROM Utilisateurs WHERE email = ?');
    $check->execute(array($newmail));
    $data = $check->fetch();
    $sql = $co->initConnexion();
    if((isset($_POST['maill']) AND !empty($_POST['maill']) AND $_POST['maill'] != $data['email'])  AND $_GET['token'] == $_SESSION['token']) {
           
            $sql = ("UPDATE Utilisateurs SET email = ? WHERE idUtilisateur = ?");
            $req = $this->bdd->prepare($sql);
            $req->execute(array($newmail, $_SESSION['idUtilisateur']));
            $_SESSION['email'] = $newmail;
            header('Location:index.php?module=compte&action=compte&idUtilisateur='.$_SESSION['idUtilisateur']);
        }
        if((isset($_POST['story']) AND !empty($_POST['story']))) {
            $sql = ("UPDATE Utilisateurs SET description = ? WHERE idUtilisateur = ?");
            $req = $this->bdd->prepare($sql);
            $req->execute(array($des, $_SESSION['idUtilisateur']));
            $_SESSION['description'] = $des;
            header('Location:index.php?module=compte&action=compte&idUtilisateur='.$_SESSION['idUtilisateur']);

        }

        if((isset($_POST['num']) AND !empty($_POST['num']) AND $_POST['num'] != $data['NUMTEL'])) {
           
            $sql = ("UPDATE Utilisateurs SET NUMTEL = ? WHERE idUtilisateur = ?");
            $req = $this->bdd->prepare($sql);
            $req->execute(array($num, $_SESSION['idUtilisateur']));
            $_SESSION['NUMTEL'] = $num;
            header('Location:index.php?module=compte&action=compte&idUtilisateur='.$_SESSION['idUtilisateur']);
        }

        if((isset($_POST['mdp']) AND !empty($_POST['mdp']) AND isset($_POST['mdp2']) AND !empty($_POST['mdp2']))) {
    
            if ($mdp == $mdp2) 
            {
               
                $sql = ("UPDATE Utilisateurs SET mdp = ? WHERE idUtilisateur = ?");
                $req = $this->bdd->prepare($sql);
                $req->execute(array($newmdp, $_SESSION['idUtilisateur']));
                $_SESSION['mdp'] = $newmdp;
                header('Location:index.php?module=compte&action=compte&idUtilisateur='.$_SESSION['idUtilisateur']);
            }
            else 
            {
                $msg = "Vos deux mots de passe ne correspondent pas";
            }
        }

        if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
        {
            $tailleMax = 2097152;  // 2Mo
            $extensionsValides = array('jpg','jpeg','gif','png');
            if($_FILES['avatar']['size'] <= $tailleMax)
            {
                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); //Ignore le premier caractere de la chaine et renvoie l'extension du fichier avec le point 
                if(in_array($extensionUpload,$extensionsValides))
                {
                    $chemin = "public/avatars/".$_SESSION['idUtilisateur']. "." .$extensionUpload;
                    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                    if($resultat)
                    {
                        $updateAvatar = $this->bdd->prepare("UPDATE Utilisateurs SET avatar = :avatar WHERE idUtilisateur = :idUtilisateur");
                        $updateAvatar->execute(array(
                            'avatar' => $_SESSION['idUtilisateur']. ".".$extensionUpload,
                            'idUtilisateur' => $_SESSION['idUtilisateur']
                        ));
                        $_SESSION['avatar'] = $_SESSION['idUtilisateur'].".".$extensionUpload ;
                        header('Location:index.php?module=compte&action=compte&idUtilisateur='.$_SESSION['idUtilisateur']);
                    }
                     else 
                    {
                        $msg = "Erreur durant l'imporation de votre photo" ;

                    }
                }
                else 
                {
                    $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png" ;

                }
            }
            else 
            {
                $msg = "Votre photo de profil ne doit pas dépasser 2 Mo" ;

            }

        }
    }
}

function modifAnnonce() {
    if(isset($_GET['idAnnonce']) AND !empty($_GET['idAnnonce'])){
        $idAnnonce = intval($_GET['idAnnonce']);
    if (isset($_POST['modifAnnonce'])) 
    {
    $newdescription = htmlspecialchars($_POST['desAnnonce']);
    $present = 1;
    $absent = "oui";
    $co = new Connexion();
    $this->bdd = $co->initConnexion();
    $sql = $co->initConnexion();
        
    if((isset($_POST['desAnnonce']) AND !empty($_POST['desAnnonce']))) {
        $sql = ("UPDATE Annonce SET description = ? WHERE idAnnonce = ?");
        $req = $this->bdd->prepare($sql);
        $req->execute(array($newdescription, $idAnnonce));
        header('Location:index.php?module=annonce&action=consultAnnonce&idAnnonce='.$idAnnonce);

    }

    if((isset($_POST['metro']) AND !empty($_POST['metro']))) {
           
            $sql = ("UPDATE Localisation inner join Logement using(idLocalisation) inner join Annonce using(idLogement) SET presMetro = ? WHERE Annonce.idAnnonce = ? AND Annonce.idLogement=Logement.idLogement AND Logement.idLocalisation=Localisation.idLocalisation");
            $req = $this->bdd->prepare($sql);
            $req->execute(array($present, $idAnnonce));   
            header('Location:index.php?module=annonce&action=consultAnnonce&idAnnonce='.$idAnnonce);      
    }
    if((isset($_POST['bus']) AND !empty($_POST['bus']))) {
        $sql = ("UPDATE Localisation inner join Logement using(idLocalisation) inner join Annonce using(idLogement) SET presBus = ? WHERE Annonce.idAnnonce = ? AND Annonce.idLogement=Logement.idLogement AND Logement.idLocalisation=Localisation.idLocalisation");
        $req = $this->bdd->prepare($sql);
        $req->execute(array($present, $idAnnonce));
        header('Location:index.php?module=annonce&action=consultAnnonce&idAnnonce='.$idAnnonce);      

    }
    if((isset($_POST['train']) AND !empty($_POST['train']))) {
        $sql = ("UPDATE Localisation inner join Logement using(idLocalisation) inner join Annonce using(idLogement) SET presTrain = ? WHERE Annonce.idAnnonce = ? AND Annonce.idLogement=Logement.idLogement AND Logement.idLocalisation=Localisation.idLocalisation");
        $req = $this->bdd->prepare($sql);
        $req->execute(array($present, $idAnnonce));
        header('Location:index.php?module=annonce&action=consultAnnonce&idAnnonce='.$idAnnonce);      

    }
    if((isset($_POST['tram']) AND !empty($_POST['tram']))) {
        $sql = ("UPDATE Localisation inner join Logement using(idLocalisation) inner join Annonce using(idLogement) SET presTram = ? WHERE Annonce.idAnnonce = ? AND Annonce.idLogement=Logement.idLogement AND Logement.idLocalisation=Localisation.idLocalisation");
        $req = $this->bdd->prepare($sql);
        $req->execute(array($present, $idAnnonce));
        header('Location:index.php?module=annonce&action=consultAnnonce&idAnnonce='.$idAnnonce);      
    }
    if((isset($_POST['commerce']) AND !empty($_POST['commerce']))) {
        $sql = ("UPDATE Localisation inner join Logement using(idLocalisation) inner join Annonce using(idLogement) SET presCommerce = ? WHERE Annonce.idAnnonce = ? AND Annonce.idLogement=Logement.idLogement AND Logement.idLocalisation=Localisation.idLocalisation");
        $req = $this->bdd->prepare($sql);
        $req->execute(array($present, $idAnnonce));
        header('Location:index.php?module=annonce&action=consultAnnonce&idAnnonce='.$idAnnonce);      

    }
    if(isset($_FILES['annonceModif']) AND !empty($_FILES['annonceModif']['name']))
    {
        $tailleMax = 2097152;  // 2Mo
        $extensionsValides = array('jpg','jpeg','gif','png');
        if($_FILES['annonceModif']['size'] <= $tailleMax)
        {
            $extensionUpload = strtolower(substr(strrchr($_FILES['annonceModif']['name'], '.'), 1)); //Ignore le premier caractere de la chaine et renvoie l'extension du fichier avec le point 
            if(in_array($extensionUpload,$extensionsValides))
            {
                $chemin = "public/annonces/".$idAnnonce. "." .$extensionUpload;
                $resultat = move_uploaded_file($_FILES['annonceModif']['tmp_name'], $chemin);
                if($resultat)
                {
                    $updateAvatar = $this->bdd->prepare("UPDATE Image SET nomImage = :nomImage WHERE idAnnonce = :idAnnonce");
                    $updateAvatar->execute(array(
                        'nomImage' => $idAnnonce. ".".$extensionUpload,
                        'idAnnonce' => $idAnnonce
                    ));
                  
                    $_SESSION['nomImage'] = $idAnnonce.".".$extensionUpload ;
                // header('Location:index.php');
                }
                     else 
                    {
                        $msg = "Erreur durant l'imporation de votre photo" ;

                    }
                }
                else 
                {
                    $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png" ;

                }
            }
            else 
            {
                $msg = "Votre photo de profil ne doit pas dépasser 2 Mo" ;

            }

        }
    }
}
}
}

?>