<?php
   
    	include("connect.php");
        $bdd=connection();
        $result=$bdd->prepare("select basculement,heureMesure from donnees where idpluvio=1 order by id Desc limit 1");
        $result->execute();
        $donnees=$result->fetchAll();
        echo json_encode($donnees);
?>