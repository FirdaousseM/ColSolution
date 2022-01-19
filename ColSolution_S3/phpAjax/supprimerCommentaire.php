<?php
require_once 'connexion.php';

$co = new Connexion();
$bdd = $co->initConnexion();

    if(isset($_GET['idCommentaire']) AND !empty($_GET['idCommentaire']) AND $_GET['jeton'] == $_SESSION['jeton']) {
            $id_commentaire = intval($_GET['idCommentaire']);
            $idAnnonce = intval($_GET['idAnnonce']);
            $msg = $bdd->prepare('DELETE FROM Commentaire WHERE idCommentaire = ?');
            $msg->execute(array($id_commentaire));
            header('Location:index.php?module=annonce&action=consultAnnonce&idAnnonce='.$idAnnonce);
    }