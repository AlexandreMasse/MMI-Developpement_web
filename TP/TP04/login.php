<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title>Connexion</title>
</head>
<body>

<?php
include ("connect.php");

session_start();

if (isset($_SESSION["nom"])) {
    echo "Bonjour " .$_SESSION["nom"]. " !";
}
?>

<!-- Exercice 4 : mots de passe -->

<form action="traitelogin.php">

    <input type="text" name="login" placeholder="saisir le login">
    <input type="text" name="mdp" placeholder="saisir le mdp">
    <input type="submit" value="Valider">

</form>
</body>
</html>