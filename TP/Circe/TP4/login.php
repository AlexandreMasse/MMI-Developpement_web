<?php session_start() ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Se connecter via un login</title>
  </head>
  <body>

    <form class="connexion" action="traitelogin.php" method="get">
      Saisissez votre login <input type="text" name="login" value="">
      <br><br>Saisissez votre mot de passe <input type="password" name="mdp" value="">
      <br><br><input type="submit" name="seconnecter" value="Se connecter">
    </form>

  </body>
</html>
