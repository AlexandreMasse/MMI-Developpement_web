<?php session_start() ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Traite le login</title>
  </head>
  <body>

    <?php
    $user = 'root';
    $password = 'root';
    $host = 'localhost';
    $dbname = 'cours_dev';
    $db = mysqli_connect($host,$user,$password,$dbname) or die('Erreur de connexion');
    mysqli_query($db,"SET NAMES UTF8");
    $sql = "SELECT * FROM personne WHERE login='".$_GET["login"]."'";
    $request = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));

    if(mysqli_num_rows($request) == 0) {
      echo "Mauvais login";
    }
    else {
      $row=mysqli_fetch_assoc($request);
      if ($row["mdp"] != md5($_GET["mdp"])) {
        exit("mauvais mdp");
      }
        else {
        echo 'Bonjour '.$_GET["login"];
        echo "<br>Le mot de passe est bon, vous êtes donc bien logué !";
        $_SESSION["login"]=$row["login"];
      }
    }





?>

  </body>
</html>
