<?php 
require_once 'config.php';

    session_start(); // Démarrage de la session

  if (isset($_POST['email'], $_POST['pass'])) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $check = $bdd->prepare('SELECT email, mdp FROM Utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row > 0) 
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
             if (password_verify($pass, $data["mdp"])) {
                echo "Connexion effectuée";
                $_SESSION['email'] = $email;
                header('Location:compte.php');

             }
         } else {
        $hashpass = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Utilisateurs (email, mdp) VALUES ('$email', '$hashpass')";
        $req = $db->prepare($sql);
        $req->execute();
        echo "<center><h1>Inscription effectué</h1></center>";
        header('Location: accueil.php');
        exit();    
    
        }
         }

    }

?>
<!--===============================================================================================
         require_once 'config.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['email']) && !empty($_POST['mdp'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['mdp']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT email, mdp FROM Utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['mdp']))
                {
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['email'] = $data['token'];
                    header('Location: compte.php');
                    die();
                }else{ header('Location: index.php?login_err=password'); die(); }
            }else{ header('Location: index.php?login_err=email'); die(); }
        }else{ header('Location: index.php?login_err=already'); die(); }
    }else{ header('Location: index.php'); die();} // si le formulaire est envoyé sans aucune données
--===============================================================================================-->