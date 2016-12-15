<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Résultats</title>
    <style>
    </style>
  </head>
  <body>

    <h1>Validation</h1>
    <h2>Vous avez saisie :</h2>
    <?php
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $radio = $_POST['radio'];
    
    echo '<table border="1">
          <tr><td>'.$nom.'</td><td>'.$prenom.'</td><td>'.$telephone.'</td><td>'.$radio.'</td></tr>
        </table>';

        $fic=fopen("fichier.txt", "a");
        $str = "{$_POST['nom']}\t{$_POST['prenom']}\t{$_POST['telephone']}\t{$_POST['radio']}\n";
        fwrite($fic, $str) or die ("impossible d'écrire dans le fichier");
        echo "l'enregistrement s'est bien déroulé<br>";
        fclos($fic);
    ?>

    <form method="post" action="result.php">
      <input type="submit" value="validez">
      <input type="button" value="Retour" onClick="self.history.back();">
    </form>



      <!-- ouvrir le fichier, stocker dans une chaine de caractère tout ce qu'on veut y écrire. ferme le fichier -->

  </body>
</html>
