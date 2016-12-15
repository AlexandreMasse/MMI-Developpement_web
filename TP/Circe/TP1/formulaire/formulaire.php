<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exercice3</title>
  </head>
  <body>

    <form action="photos.php" method="post">
    <!-- ici vos boutons -->
      <label for="login">Login : </label>
      <input type="text" name="login">
      <br><label for="mdp">Mot de passe : </label>
      <input type="text" name="mdp">
      <br><label for="resolution">Résolution : </label>
      <select name="resolution">
        <option value="1">320x200</option>
        <option value="2">512x368</option>
        <option value="3">800x600</option>
      </select>
      <br><input type="radio" name="langue" id="fr" value="1">
      <label for="fr" >Français</label>
      <input id="ang" type="radio" name="langue" value="2">
      <label for="ang" >Anglais</label>
      <br><input type="submit" name="bouton_soumettre" value="Envoyer">
    </form>

  </body>
</html>
