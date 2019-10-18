<?php
/*
*contolleur frontal
*Auteur Philippe K. GUILAVOGUI
*Copyright 2017 : TeGuiLab  
*/
    if(isset($_REQUEST["login"]))
    {

      include_once("../server/baseConf.php");
      include_once("requetes.class.php");
      include_once("../web/users/User.class.php");
      $requete=new Requetes(HOSTNAME, BASENAME, USERNAME, PASSWORD);
      //on teste que cet utilisateur existe dans la base de données, si oui valeur vaudra 1
      $user=$requete->authentification($_REQUEST["login"],MD5($_REQUEST["password"]));
      //si l'utilisateur existe, création d'un objet utilisateur qui representera l'utilisateur


      if($user)
      {
        //création de la session
      	//Instanciation de l'utilisateur
        //$utilisateur = array($user["matUser"],$user["prenomUser"],$user["nomUser"],$user["pseudoUser"],$user["sexeUser"],$user["naissanceUser"]);
        //creation de la session de l'utilisateur

            $_SESSION['user']=array(
                "matUser" => $user["matUser"],
                "prenomUser" => $user["prenomUser"],
                "nomUser" => $user["nomUser"],
                "pseudoUser" => $user["pseudoUser"],
                "statutUser" => $user["statutUser"],
                "sexeUser" => $user["sexeUser"], 
                "naissanceUser" => $user["naissanceUser"]
            );
        //$_SESSION["requete"]=$requete;

       // session_start();
        //$_SESSION["user"]=$user;
        // $_SESSION["requete"]=$requete;
 

        //redirection dans le bon dossier
        if ($user["statutUser"]=='1')
          {
              //C'est un admin
              echo '<meta http-equiv="Refresh" content="0;url=users/admin/?road=accueil">';
              exit();
          }
          else if($user["statutUser"]=='2')
          {
              //C'est un eleve
              // echo $_SESSION['user']->getMatricule();
              // exit();
             // s'il n'a pas personnalisé son mdpasse je le redirige vers la page custom
              if (md5($user['pseudoUser'])==$user['passwordUser']) {
                # code...
                header('Location: users/eleve/index.php?road=update&pseudo='.$user['pseudoUser']);
                // echo '<meta http-equiv="Refresh" content="0;url=users/eleve/index.php?road=update">';
                exit();
              } else {
                # code...
                header('Location: users/eleve/index.php?road=accueil&pseudo='.$user['pseudoUser']);
                // exit();
              }   
          }
          else if($user["statutUser"]=='3')
          {
              //C'est un enseignant
             // echo '<meta http-equiv="Refresh" content="0;url=users/enseignant/?road=accueil">';
            //  var_dump($_SESSION); exit();
             header('Location: users/enseignant/index.php?road=accueil');

              exit();
          }
          else if($user["statutUser"]=='4')
          {
              //C'est un gardien
              echo '<meta http-equiv="Refresh" content="0;url=users/gardien/?road=accueil">';
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

//Deconnexion 
 if(isset($_GET['logout']))
    {
     // echo "deconnexion";

        
    session_start();
    session_destroy();
    header('location: ../index.php');
    exit;

    } 


?>
