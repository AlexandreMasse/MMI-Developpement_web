<?php session_start();

$user = 'root';
$password = 'root';
$host = 'localhost';
$dbname = 'cours_dev';
$db = mysqli_connect($host,$user,$password,$dbname) or die('Erreur de connexion');
mysqli_query($db,"SET NAMES UTF8");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$mdp = $_POST['mdp'];
$ville = $_POST['ville'];
$mdpcrypte = md5($mdp);
if (empty($nom) || empty($prenom) || empty($login) || empty($mdp)) {
  header('Location:formulaire.php');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>

    <?php

    //permet de stocker en base de donnée les informations du formulaire rentrées par l'utilisateur
  $sql = "INSERT INTO personne (nom, prenom, login, mdp, ville) VALUES ('$nom','$prenom','$login', '$mdpcrypte', '$ville')";
  $request = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));

     echo '<h1>FÉLICITATION'.$prenom.'!</h1>
     <p>Vous êtes bien inscrit dans la base de données, n"est-il pas génial ?</p>
     <p>Vous pouvez trouver un récapitulatif de vos données si dessous :</p>
     <ul>
       <li>Votre prénom : '.$prenom.'</li>
       <li>Votre nom : '.$nom.'</li>
       <li>Votre login : '.$login.'</li>
       <li>Votre mot de passe : '.$mdp.'</li>
       <li>Votre ville : '.$ville.'</li>
     </ul>';

   mysqli_close($db);
   ?>

  </body>
</html>
