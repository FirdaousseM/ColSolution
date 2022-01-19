<?php
session_start();
require_once 'connexion.php';


function isAjax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

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

       /*     if(isAjax()) {
                $post = $bdd->queryFirst('SELECT * FROM Commentaire ORDER BY idCommentaire DESC ');
                $user = $bdd->queryFirst("SELECT * FROM Utilisateurs natural join Commentaire WHERE Commentaire.idCommentaire = $post->idCommentaire ");	
                ?>
                <div id="com">
					<div id="com_pic"> 
						<a href="index.php?module=compte&action=compte&idUtilisateur="> <img class="an" src="public/avatars/<?=$user->avatar;?>" alt="pp"/></a>
						<div id ="nomCom">
							<p><?= $user->nom;?> <?= $user->prenom;?> </p>
						</div>
					</div>
						<div id="com_text">
							<p><?= $post->contenu;?></p> 
						</div>
					</div>
                <?php
            }
            else {*/
                header('Location:index.php?module=annonce&action=consultAnnonce&idAnnonce='.$idAnnonce);
            
            //}
        }
    }
}

?>