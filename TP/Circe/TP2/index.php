<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TP2 - Manipulation de fichier</title>
  </head>
  <body>

    <form class="formulaire" action="result.php" method="post">
      <h1>Carnet d'adresse</h1>
      <h2>Saisie d'un nouveau contact</h2>
      Nom : <input type="texte" name="nom" value="">
      <br> Prénom : <input type="texte" name="prenom" value="">
      <br> Téléphone : <input type="texte" name="telephone" value="">
      <br> Ami<input type="radio" name="radio" value="ami">
      Famille<input type="radio" name="radio" value="famille">
      Travail<input type="radio" name="radio" value="travail">
      <input type="submit" name="envoyer" value="Envoyer">
    </form>

    <?php
    function infofichier($x){
      return date('D-M-Y',filectime($x));
      }
      echo infofichier("fichier.txt");
     ?>

    <h1>COMPTEUR DE VISITE</h1>
    <?php
      session_start();
      $monfichier=fopen("compteur.txt", "r+");
      $compteur=fgets($monfichier);
      $compteur+= 1;
      fseek($monfichier,0);
      fputs($monfichier,$compteur);
      echo '<strong>'.$compteur.'</strong> visite(s).';
      fclos($fic);
    ?>

  </body>
</html>
