<?php
/**
 * @author Philippe Kolama GUILAVOGUI
 * This page is the enseignant bundlle controller
 * the road is the page that will be called in the middle
 * The param is the url param
 * © 2019 TeGuiLab
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
    include_once("../../../server/baseConf.php");
    include_once("../../commun/fonctions.class.php");
    include_once("../../commun/requetes.class.php");
    include_once("menu.php");
    $req=new Requetes(HOSTNAME, BASENAME, USERNAME, PASSWORD);
    $fonctions=new Fonctions();
?>


<?php
    if(isset($_REQUEST["road"])){ //zone de traitement des liens
        if(!isset($_REQUEST["param"])){// si le paramètre de nom "parametre" n'est pas rnseigné
            switch ($_REQUEST["road"]) {//zone de recupération de toutes les variables nécessaires aux pages
                case "accueil":{
                        print_r($_SESSION["user"]); echo "ici";
                    }
                    break;

                case "listeclasses":{
                        print_r($_SESSION["user"]); echo "ici";
                        print_r($req->getClasseByEnseignant($_SESSION["user"]["matUser"]));
                    }
                    break;

                default:
                    echo "la page recherchée n'existe pas ou est en construction";
                    break;
            }

            include_once("vues/".$_REQUEST["road"].".php");
        }
        else{
            $route=  explode(".",$_REQUEST["road"])["0"];//recuperation de la route sans les parametres
            switch ($route) {//zone de recupération de toutes les variables nécessaires aux pages
                case "infos":{
                    $userEnVue=$_SESSION["userEnVue"]=$req->getUserByid($_REQUEST["param"]);
                    //$statuts=$req->getStatut();
                    }
                    break;
                default:
                    echo "la page recherchée n'existe pas ou est en construction";
                    break;
            }

            include_once("vues/".$route.".php");
        }

    }else if(isset($_REQUEST["action"])){ //zone de traitement des actions
        switch($_REQUEST["action"]){
            case "AJOUTERajouter":{

            }
            break;
            
            default:
               echo "requete A inconnue";
        }
    }else{ //zone de traitement des appuis de bouton
        echo "neutre";
    }
?>

<?php
  include_once("menuBas.php");
?>
