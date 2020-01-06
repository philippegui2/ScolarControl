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
            switch ($_REQUEST["road"]){//zone de recupération de toutes les variables nécessaires aux pages
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
                case "agenda":{//agenda
                        $nomPage="Agenda scolaire";
                        $navig3="agenda";
                        //------------------------
                        $rdv=$req->getRendezvous();
                        $rendezvous=array();
                        foreach ($rdvs as $key => $rdv){
                            array_push(
                                $rendezvous,
                                array(
                                        'id' => $rdv["idRendezvous"],
                                        'title' => $rdv["titreRendezvous"],
                                        'start' => $rdv["dateRendezvous"],
                                        'end' => $rdv["dateRendezvous"],
                                        'url' => "",
                                        'color' => "green"//type 2 pour les autres types de rendez-vous
                                )
                            );
                        }
                        include_once("../../commun/vues/".$_REQUEST["road"].".php");
                        exit();
                    }
                    break;
                    case "infosPointage":{
                        $nomPage="Rechercher";
                        $navig2="pointage";
                        $navig2Lien="pointage";
                        $navig3="recherche pointage";
                        //----------------------
                        $pointages=$req->getPointageByFormateur($_SESSION["user"]["matUser"]);
                        $totalHeure=0;
                    }break;
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
                        //param=idMatiere ; param2=idClasse
                        //echo $_REQUEST["param3"]; 
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
                            //param=id de la matière, param2=id de la classe
                        $eleves=$req->getEleveByClasse($_REQUEST["param2"]);
                        $notes=$req->getAllEleveAndNoteByClasse($_REQUEST["param2"],$_REQUEST["param"]);
                        //echo $_REQUEST["param"];
                    }
                    break;
                case "cahierTexte":{
                        //récupération de toutes les notes de tous les élèves d'une classe données dans une matière donnée
                            //param=id de la matière , param2=id de la classe
                            //param2= idClasse
                        $partieCours=$req->getCahierTexte($_REQUEST["param"],$_REQUEST["param2"]);
                    }
                    break;
                case "infosPointage":{
                    $nomPage="Rechercher";
                    $navig2="pointage";
                    $navig2Lien="pointage";
                    $navig3="recherche pointage";
                    //----------------------
                    if(isset($_REQUEST["param2"]) and $_REQUEST["param2"]=="present"){
                        $pointages=$_SESSION["resultatRechercheInfosPointage"];
                    }else{
                        $pointages=$req->getPointageByFormateur($_REQUEST["param"]);
                    }
                    $totalHeure=0;
                }break;
                default:
                    echo "la page recherchée n'existe pas ou est en construction param";
                    break;
            }

            include_once("vues/".$route.".php");
        }

    }else if(isset($_REQUEST["action"])){ //zone de traitement des actions
        switch($_REQUEST["action"]){
            case "ALLNOTESmodifNote":{
                //print_r($_REQUEST);
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
            case "CAHIERTEXTEajoutPartie":{
                $req->setCahierTexte($_REQUEST,$req->setPartieCours($_REQUEST));
                header("Location:index.php?road=cahierTexte&param=".$_REQUEST['idMatiere']."&param2=".$_REQUEST['idClasse']);
                exit();
            }
            break;
            case "CAHIERTEXTEconfirmEffectue":{
                //récupération de la liste des cours et les enseignants qui les donnent
                $req->updatePartieCours($_REQUEST);
                header("Location:index.php?road=cahierTexte&param=".$_REQUEST['idMatiere']."&param2=".$_REQUEST['idClasse']);
                exit();
            }
            break;
            case "EVALUATIONvalider":{
                //
                $dateTime=implode("-",array_reverse(explode("/",$_REQUEST["dateEvaluation"])))." ".$_REQUEST["heureEvaluation"].":".$_REQUEST["minuteEvaluation"].":00";
                print_r($_SESSION["user"]["matUser"]);
                $titre="Evaluation en ".$_REQUEST['param4'];
                $req->setEvaluation($_REQUEST,$dateTime);//ajoute de l'évaluation
                
                $req->setRendezvous(implode("-",array_reverse(explode("/",$_REQUEST["dateEvaluation"]))),$titre,$_SESSION["user"]["matUser"]);//ajout de l'évaluation dans l'agenda
                header("Location:index.php?road=allnotes&param=".$_REQUEST['param']."&param2=4&alert=ok");
                exit();
            }
            break;
            case "INFOSPOINTAGErechercher":{
                    if(isset($_REQUEST['dateDebut']) and isset($_REQUEST['dateFin']) and $_REQUEST['dateFin']!=""){
                        $pointages=$req->getPointageByFormateurAndDateIntervall($_REQUEST['param'],implode("-",array_reverse(explode("/",$_REQUEST['dateDebut']))),implode("-",array_reverse(explode("/",$_REQUEST['dateFin'])))." 23:59:59");
                    }else{
                        $pointages=$req->getPointageByFormateurAndDateDebut($_REQUEST['param'],implode("-",array_reverse(explode("/",$_REQUEST['dateDebut']))));
                    }
                    $_SESSION["resultatRechercheInfosPointage"]=$pointages;
                    header("Location:?road=infosPointage&param=".$_REQUEST['param']."&param2=present");
                    exit();
                }
            break;
            default:
               echo "requete A inconnue";
        }
    }else if(isset($_REQUEST["reqajax"])){
        switch ($_REQUEST["reqajax"]) {//zone de recupération de toutes les variables nécessaires aux pages
            case "CAHIERTEXTEconfirmEffectue":{
                //récupération de la liste des cours et les enseignants qui les donnent
                print_r(json_encode($req->getCours()));
                exit();
            }
            break;
            default:
               echo "Cette requete est inconnue";
    
        }
    }else{ //zone de traitement des appuis de bouton
        echo "neutre";
    }
?>

<?php
  include_once("menuBas.php");
?>
