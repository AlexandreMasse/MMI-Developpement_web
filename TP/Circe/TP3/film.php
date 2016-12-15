<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Afficher les films de la base</title>
  </head>
  <body>

    <?php
        $user = 'root';
        $password = 'root';
        $host = 'localhost';
        $dbname = 'dvdtheque';
        $db = mysqli_connect($host,$user,$password,$dbname) or die('Erreur de connexion');
        mysqli_query($db,"SET NAMES UTF8");


        $sql = "SELECT * FROM film,genre,realisateur WHERE film.genre_id=genre.id_genre AND realisateur.id_realisateur=film.realisateur_id";
        if(isset($_GET["tri"])) {
        $sql = $sql . "ORDER BY {$_GET["tri"]}";
        }

        $request = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db));


        echo '<table border=1><tr><td><a href="">Titre</a></td><td><a href="">Année</a></td><td><a href="">Durée</a></td><td><a href="">Réalisateur</a></td><td><a href="">Genre</a></td></tr>';
        while($data = mysqli_fetch_assoc($request)){
          echo '<tr><td>'.$data['titre'].'</td><td>'.$data['annee'].'</td><td>'.$data['duree'].'</td><td>'.$data['nom_realisateur'].'</td><td>'.$data['nom_genre'].'</td></tr>';
        }
        echo '</table>';

    ?>


  </body>
</html>
