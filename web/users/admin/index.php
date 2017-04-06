<?php
/**
 * Author: Philippe Kolama GUILAVOGUI
 * This page is the admin bundlle controller
 * the road is the page that will be called in the middle
 * The param is the url param
*/
session_start();
ob_start();
if(0)
  {
     header("Location:../../index.php");
      exit();
  }
?>
<?php
    define("NOMPAGE", "Accueil");
    define("ENTETEPAGE", "Entete");
    include_once("../../../server/baseConf.php");
    include_once("../../commun/fonctions.class.php");
    include_once("../../commun/requetes.class.php");
    include_once("vues/menu.php");
    $req=new Requetes(HOSTNAME, BASENAME, USERNAME, PASSWORD);
?>

<?php
    if(isset($_REQUEST["road"])){ //zone de traitement des liens
        if(!isset($_REQUEST["param"])){
            switch ($_REQUEST["road"]) {//zone de recupération de toutes les variables nécessaires aux pages 
                case "ajouter":{
                    $statuts=$req->getStatut();
                    }
                    break;
                case "lister":{
                    $users=$req->getUser();
                    $statuts=$req->getStatut();
                    }
                    break;
                default:
                    echo "la page recherchée n'existe pas ou est en construction";
                    break;
            }
            
            include_once("vues/".$_REQUEST["road"].".php");
        }
        else
            include_once("vues/".$_REQUEST["road"].".php?".$_REQUEST["param"]);
        
    }else if(isset($_REQUEST["action"])){ //zone de traitement des cliques
        switch($_REQUEST["action"]){
            case "AJOUTERajouter":
                $req->setUser($_REQUEST);
                include_once("vues/ajouter.php");
                break;
            case 1:
                echo "i égal 1";
                break;
            case 2:
                echo "i égal 2";
                break;
            default:
               echo "i n'est ni égal à 2, ni à 1, ni à 0.";
        }
    }else{ //zone de traitement des appuis de bouton
        echo "neutre";
    }
?>

<?php
  include_once("vues/menuBas.php");
?>
