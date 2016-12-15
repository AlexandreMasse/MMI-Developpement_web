<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exercice4</title>
    <link rel="stylesheet" href="style<?php echo $_POST["langue"]?>.css">
  </head>
  <body>

<?php
$login = $_POST["login"];
?>
<h1>Bonjour, <?php echo $login; ?></h1>

<?php
switch ($_POST ["resolution"]) {
case "1":
$largeur = 320;
$hauteur = 200;
break;
case "2":
$largeur = 512;
$hauteur = 368;
break;
case "3":
$largeur = 800;
$hauteur = 600;
break;
}
echo "$largeur x $hauteur";
?>

<img src="chaton.jpg" width=<?php echo $largeur?> height=<?php echo $hauteur?>>

  </body>
  </html>
