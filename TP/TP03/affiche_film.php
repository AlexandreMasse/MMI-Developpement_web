<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table border='1'> <tr><th>Titre</th><th>Nom realisateur</th><th>Prenom realisateur</th><th>Genre</th></tr>

<?php

include("connect.php");


//$requete = "SELECT * FROM film";
//$result = $pdo->query($requete)->fetch();

$requete = "SELECT * FROM film, genre, realisateur WHERE film.genre_film=genre.id_genre AND film.realisateur_film=realisateur.id_realisateur";


/*if (isset($_GET["tri"])) [
    $requete = $requete."ORDER BY {$_GET["tri"]}";
]*/


$result = mysqli_query($connexion, $requete);

while ($row=mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row["titre_film"]}</td><td>{$row["nom_realisateur"]}</td><td>{$row["prenom_realisateur"]}</td><td>{$row["nom_genre"]}</td><tr></tr>";
}



?>

</table>

</body>
</html>