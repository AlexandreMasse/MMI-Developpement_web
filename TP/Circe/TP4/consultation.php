<?php session_start() ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Consulter la base de données</title>
    <style>
      table {
        text-align: center;
      }
      td {
        padding: 10px;
      }
    </style>
  </head>
  <body>

      <?php
      $user = 'root';
      $password = 'root';
      $host = 'localhost';
      $dbname = 'cours_dev';
      $db = mysqli_connect($host,$user,$password,$dbname) or die('Erreur de connexion');
      mysqli_query($db,"SET NAMES UTF8");
      $sql = "SELECT * FROM personne";
      $request = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));

      echo '<table border=1><tr><td><b>ID</b></td><td><b>Nom</b></td><td><b>Prénom</b></td><td><b>Login</b></td><td><b>Mot de passe</b></td><td><b>Ville</b></td></tr>';
      while($data = mysqli_fetch_assoc($request)){
        echo '<tr><td>'.$data['id_personne'].'</td><td>'.$data['nom'].'</td><td>'.$data['prenom'].'</td><td>'.$data['login'].'</td><td>'.$data['mdp'].'</td><td>'.$data['ville'].'</td></tr>';
      }
      echo '</table>';
       ?>
    </table>

  </body>
</html>
