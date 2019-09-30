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
                case "notifications":{
                        $messages=$req->getMessagesByUser($_SESSION["user"]["matUser"]);//05R22
                        include_once("../../commun/vues/".$_REQUEST["road"].".php");
                        exit();
                    }
                    break;
                case "accueil":{
                    }
                    break;
                case "listeclasses":{
                        $couleur=array('panel-primary','panel-success','panel-warning','panel-danger','panel-info');
                        $classes=$req->getClasseByEnseignant($_SESSION["user"]["matUser"]);
                    }
                    break;
                case "evaluations":{
                    echo $_REQUEST["idClasse"];
                    }
                    break;
                case "listeEleves":{
                    }
                    break;
                case "matieres":{
                    }
                    break;
                case "monProfile":{

                    }
                case "notes":{
                        $notes=$req->getNoteByUser($_SESSION["userEnVue"][0]["matUser"]);
                        include_once("../../commun/vues/".$_REQUEST["road"].".php");
                        include_once("menuBas.php");
                        exit();
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
                case "evaluations":{
                    
                    }
                    break;
                case "listeEleves":{
                        $eleves=$req->getEleveByClasse($_REQUEST["param"]);
                    }
                    break;
                case "infosEleves":{//Affichage des informations sur les élèves
                        $userEnVue=$_SESSION["userEnVue"]=$req->getUserByid($_REQUEST["param"]);
                    }
                    break;
                case "matieres":{
                        //param=idClasse
                        $classe=$req->getClasseById($_REQUEST["param"])[0];
                        //récupération des matières enseignées par un enseignant donné dans une classe donnée
                        $matieres=$req->getMatiereByEnseignantAndClasse($_REQUEST["param"],$_SESSION["user"]["matUser"]);
                    }
                    break;
                case "allnotes":{
                        //récupération de toutes les notes de tous les élèves d'une classe données dans une matière donnée
                            //param=ID de la matière   param2=id de la classe
                        $eleves=$req->getEleveByClasse($_REQUEST["param2"]);
                        $notes=$req->getAllEleveAndNoteByClasse($_REQUEST["param2"],$_REQUEST["param"]);
                    }
                    break;
                default:
                    echo "la page recherchée n'existe pas ou est en construction param";
                    break;
            }

            include_once("vues/".$route.".php");
        }

    }else if(isset($_REQUEST["action"])){ //zone de traitement des actions
        switch($_REQUEST["action"]){
            case "ALLNOTESmodifNote":{
                    print_r($_REQUEST);
                $test=$req->getNoteByUserandMatiere($_REQUEST['identifiant'],$_REQUEST['idMatiere']);//vérification de l'existance du champ d'entrée de la note
                if($test){
                    $req->updateNote($_REQUEST);
                }else{
                    $req->setNote($_REQUEST);
                }
                if(isset($_REQUEST["redirect"])){
                    header("Location:index.php?road=".$_REQUEST["redirect"]."&alert=ok");
                    exit();
                }
                header("Location:index.php?road=allnotes&param=".$_REQUEST['idMatiere']."&param2=4&alert=ok");
                exit();
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
