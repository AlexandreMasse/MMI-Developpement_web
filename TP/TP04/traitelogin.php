<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <style>
        a {
            display: inline-block;
            width: 150px;
            height:40px;
            line-height: 40px;
            text-align: center;
            text-decoration: none;
            color: black;
            background-color: #2777ff;
        }

    </style>
</head>
<body>

<?php

include ("connect.php");

//Raquete SQL
$requete = "SELECT * FROM personne WHERE login_personne ='" .$_GET["login"]. "'";

$result = mysqli_query($connexion, $requete);

//On vérifie que le login existe dans la base de donnée
if (mysqli_num_rows($result)== 0){
    echo "mauvais login";
    ?> <a href="login.php">se reconnecter</a> <?php
}
else {
    $row=mysqli_fetch_assoc($result);
    if ($_GET["mdp"] != $row["mdp_personne"] ) {
        echo "mauvais mot de passe !";
        ?> <a href="login.php">se reconnecter</a> <?php
    } else {
        echo "Vous etes bien connecté " .$row["prenom_personne"]. " " .$row["nom_personne"]. " ! Votre login était " .$row["login_personne"]. " et votre mot de passe " .$row["mdp_personne"]. ", vous habitez à " .$row["ville_personne"].  ".";

        //Demarrer un session
        session_start();

        $_SESSION["nom"] = $row["nom_personne"];
        $_SESSION["prenom"] = $row["prenom_personne"];

    }
}

?>
</body>
</html>