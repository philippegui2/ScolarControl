<?php
/*
*contolleur frontal
*/
    if(isset($_REQUEST["login"]))
    {
      session_start();
      include_once("../server/baseConf.php");
      include_once("requetes.class.php");
      include_once("../web/users/User.class.php");
      $requete=new Requetes(HOSTNAME, BASENAME, USERNAME, PASSWORD);
      //on teste que cet utilisateur existe dans la base de données, si oui valeur vaudra 1
      $user=$requete->authentification($_REQUEST["login"],MD5($_REQUEST["password"]));
      //si l'utilisateur existe, création d'un objet utilisateur qui representera l'utilisateur
      if($user)
      {
        $utilisateur = new User($user["matUser"],$user["prenomUser"],$user["nomUser"],$user["pseudoUser"],$user["sexeUser"],$user["naissanceUser"]);
        //creation de la session de l'utilisateur
        $_SESSION["user"]=$utilisateur;
        $_SESSION["requete"]=$requete;
        //redirection dans le bon dossier
        if ($user["statutUser"]=='1')
          {
              //C'est un admin
              echo '<meta http-equiv="Refresh" content="0;url=users/admin/index.php?road=accueil">';
              exit();
          }
          else if($user["statutUser"]=='2')
          {
              //C'est un eleve
              echo '<meta http-equiv="Refresh" content="0;url=users/eleve/index.php?road=accueil">';
              exit();
          }
          else if($user["statutUser"]=='3')
          {
              //C'est un enseignant
              echo '<meta http-equiv="Refresh" content="0;url=users/enseignant/index.php?road=accueil">';
              exit();
          }
          else if($user["statutUser"]=='4')
          {
              //C'est un gardien
              echo '<meta http-equiv="Refresh" content="0;url=users/gardien/index.php?road=accueil">';
              exit();
          }
          else if($user["statutUser"]=='5')
          {
              //C'est un parent
              echo '<meta http-equiv="Refresh" content="0;url=users/parent/controlleur.php">';
              exit();
          }
      }
      else{//les donneés sont fausses donc on le redirige vers l'acceuil
        echo '<meta http-equiv="Refresh" content="0;url=index.php?errolog=erreur">';
        exit();
      }

    }

?>
