<?php
$host = "localhost";
$user = "root";
$bd = "pluviometrie";
$passwd = "root";

function connection()
{
	return new PDO('mysql:host=localhost;dbname=pluviometrie;charset=utf8', 'root', 'root');
}
?>