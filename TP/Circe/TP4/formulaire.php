<?php session_start() ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire d'inscription</title>
  </head>
  <body>

    <form class="formulaire" action="inscription.php" method="post">
      <p>Nom</p><input type="text" name="nom" value="">
      <p>Prénom</p><input type="text" name="prenom" value="">
      <p>Login</p><input type="text" name="login" value="">
      <p>Mot de passe</p><input type="password" name="mdp" value="">
      <p>Retapez le mot de passe</p><input type="password" name="mdp" value="">
      <p>Ville</p><input type="text" name="ville" value="">
      <br><input type="submit" name="connexion" value="Se connecter">
    </form>

  </body>
</html>
