<?php
$host = "localhost";
$user = "root";
$bd = "classe";
$passwd = "root";

mysql_connect($host, $user , $passwd) or die("Erreur de connexion au serveur");
mysql_select_db($bd) or die("Erreur de connexion a la base de donnees");

?>
