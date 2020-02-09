<?php
   
    	include("connect.php");
        $bdd=connection();
        $result=$bdd->prepare("select heureMesure from donnees order by id Desc limit 1");
        $result->execute();
        $donnees=$result->fetch();
        echo $donnees["basculement"];
?>