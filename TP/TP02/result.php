<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Validation</h1>
<h2>Vous avez saisi :</h2>

<table border="1">
    <tr>
    <td><?php echo $_GET["nom"]?></td>
    <td><?php echo $_GET["prenom"]?></td>
    <td><?php echo $_GET["tel"]?></td>
    <td><?php echo $_GET["type"]?></td>
    </tr>
</table>

<?php
$fichier=fopen("carnet.txt", "a") or die("echec de l'ouverture du fichier");
$str=$_GET["nom"]. "\t" .$_GET["prenom"]. "\t" .$_GET["tel"]. "\t" .$_GET["type"]. "\t";

fwrite($fichier, $str) or die ("impossible d'écire dans le fichier");
echo "l'enregistrement s'est bien déroulé <br>";

fclose($fichier);

if (!$fichier = fopen("carnet.txt", "r")) {
    echo ("echec de la lecture du fichier");
} else {
    $taille = filesize("carnet.txt");
    $str2 = fread($fichier, $taille);
    echo $str2;
}

$monfichier = fopen("compteur.txt", "r+");
$compteur = fgets($monfichier); // on lit la première ligne
$compteur +=1;
fseek($monfichier, 0); //place le curseur au début du fichier, notre curseur est au début du fichier, on peut maintenant faire un fputs. La ligne va s'écrire par-dessus l'ancienne, ce qui fait que l'ancien texte sera écrasé

fputs($monfichier, $compteur); // On écrit le nouveau nombre de pages vues

fclose($monfichier);
echo '<p>Cette page a été vue ' . $compteur . ' fois !</p>';


function info_fichier ($x){
    if (!$ddm = filectime($x)) {
        echo "echec lesture de la date";
    }
    else {
        //var_dump($ddm);
        return date('Y/m/d/',$ddm);
    }
}

echo "la dernière modification est : " . info_fichier("carnet.txt");
?>

</body>
</html>