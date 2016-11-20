<?php

//$bdd = new PDO('mysql:host=localhost;dbname=developpement_web;charset=utf8', 'root', '');


$connexion=mysqli_connect("localhost","root","");
mysqli_select_db($connexion, "developpement_web");

?>