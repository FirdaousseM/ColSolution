<?php
session_start();
require_once 'connexion.php';




$co = new Connexion();
$bdd = $co->initConnexion();
    if(isset($_POST['submit'])){
    if(isset($_POST['com']) AND !empty($_POST['com'])) {
        if(isset($_GET['idAnnonce'])  AND isset($_GET['idUtilisateur'] )){
            $idAnnonce = intval($_GET['idAnnonce']);
            $idUtilisateur = intval($_GET['idUtilisateur']);
            $date= date("Y-m-d");
            $time=date("H:m");
            $datetime=$date."T".$time;
            $commentaire = htmlspecialchars($_POST['com']);

            $com = $bdd->prepare('INSERT INTO Commentaire (contenu, dateCom, idAnnonce, idUtilisateur) VALUES(?,?,?,?)');
            $com->execute(array($commentaire, $datetime, $idAnnonce, $idUtilisateur));

            $idCommentaire = $bdd->prepare('SELECT idCommentaire FROM Commentaire WHERE idUtilisateur = ? ORDER BY idCommentaire DESC');
            $idCommentaire->execute(array($idUtilisateur));
            $idCom = $idCommentaire->fetch();
            $idCom = $idCom['idCommentaire'];
            $_SESSION['idCommentaire'] = $idCom;

            $userCom = $bdd->prepare('UPDATE Utilisateurs SET idCommentaire = ? WHERE idUtilisateur = ?');
            $userCom->execute(array($idCom,$idUtilisateur));

       
            header('Location:index.php?module=annonce&action=consultAnnonce&idAnnonce='.$idAnnonce);
            
        }
    }
}

?>