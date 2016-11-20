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

<table border='1'> <tr><th>Nom</th><th>Prénom</th><th>Login</th><th>Mdp</th><th>Ville</th></tr>

<?php

include("connect.php");


//$requete = "SELECT * FROM film";
//$result = $pdo->query($requete)->fetch();

$requete = "SELECT * FROM personne";



$result = mysqli_query($connexion, $requete);

while ($row=mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row["nom_personne"]}</td><td>{$row["prenom_personne"]}</td><td>{$row["login_personne"]}</td><td>{$row["mdp_personne"]}</td><td>{$row["ville_personne"]}</td></tr>";
}



?>

</table>

</body>
</html>