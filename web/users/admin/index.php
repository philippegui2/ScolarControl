<?php
/**
 * @author Philippe Kolama GUILAVOGUI
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
    define("MESSAGE", "BIENVENUE");
    include_once("../../../server/baseConf.php");
    include_once("../../commun/fonctions.class.php");
    include_once("../../commun/requetes.class.php");
    include_once("vues/menu.php");
    $req=new Requetes(HOSTNAME, BASENAME, USERNAME, PASSWORD);
    $fonctions=new Fonctions();
?>

<?php
    if(isset($_REQUEST["road"])){ //zone de traitement des liens
        if(!isset($_REQUEST["param"])){
            switch ($_REQUEST["road"]) {//zone de recupération de toutes les variables nécessaires aux pages
                case "accueil":{

                    }
                    break;
                case "ajouter":{
                    $classesDpt=$req->getClasseDepartement();
                    $statuts=$req->getStatut();
                    }
                    break;
                case "lister":{
                    $lister=active;
                    $users=$req->getUser();
                    $statuts=$req->getStatut();
                    }
                    break;
                case "infos":{
                    $infos=active;
                    $userEnVue=$req->getUser();
                    $statuts=$req->getStatut();
                    print_r($userEnVue);
                    }
                    break;
                case "parametrage":{

                    }
                    break;
                case "notes":{
                        //$matieres=$req->getMatiereByClasse(4);//recuperation des matières en fonction de la classe
                        $notes=$req->getNoteByUser("T4WR");
                    }
                    break;
                case "departements":{
                    $departements=$req->getDepartement();
                    }
                    break;
                case "classes":{
                    $classesDpt=$req->getClasseDepartement();
                    $departements=$req->getDepartement();
                    /*
                    $matieres=$req->getMatiere();
                    $classes=$req->getClasse();
                    $matClasses=$req->getClasseMatiere();

                    $nouvelle=array();//reconstruction de la liste des matieres
                    foreach ($matieres as $key => $value) {
                        $nouvelle[$value["id"]]=$value["libelle"];
                    }*/
                    }
                    break;
                case "matiere":{
                    //$matieres=$req->getMatiere();
                    $matieres=$req->getMatiereClasseDepartement();
                    $classesDpt=$req->getClasseDepartement();
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
        
    }else if(isset($_REQUEST["action"])){ //zone de traitement des cliques
        switch($_REQUEST["action"]){
            case "AJOUTERajouter":{
                $chemin=$fonctions->enregImg($_FILES["photoUser"], $_REQUEST["matUser"], "../images/users/");//on place l'image sur le serveur et on recupère le chemin pour l'atteindre
                if($chemin["0"]==1){
                    $req->setUser($_REQUEST,$chemin["1"]);//on ajoute les données dans la base de données
                }
                if($_REQUEST["statutProfil"]==2){
                    $req->setEleve($_REQUEST);
                }
                include_once("vues/ajouter.php");//On recharge la page
            }
            break;
            case "DEPARTEMENTajouter":{
                $req->setDepartement($_REQUEST);
                $departements=$req->getDepartement();//recuperation des nouvelles entrées pour affichage
                include_once("vues/departements.php");//On recharge la page
            }
            break;
            case "CLASSEajouter":{
                $req->setClasse($_REQUEST);
                $classesDpt=$req->getClasseDepartement();
                $departements=$req->getDepartement();//recuperation des nouvelles entrées pour affichage
                $matieres=$req->getMatiere();
                $classes=$req->getClasse();
                include_once("vues/classes.php");//On recharge la page
            }
            break;
            case "CLASSEassocier":{
                for($i=0;$i<count($_REQUEST["matiere"]);$i++){
                    $req->setClasseMatiere($_REQUEST["classe"],$_REQUEST["matiere"][$i],3);
                }
                $classesDpt=$req->getClasseDepartement();
                $departements=$req->getDepartement();//recuperation des nouvelles entrées pour affichage
                $matieres=$req->getMatiere();
                $classes=$req->getClasse();
                include_once("vues/classes.php");//On recharge la page
            }
            break;
            case "MATIEREajouter":{
                $req->setMatiere($_REQUEST);
                //$matieres=$req->getMatiere();
                $matieres=$req->getMatiereClasseDepartement();
                $classesDpt=$req->getClasseDepartement();
                include_once("vues/matiere.php");//On recharge la page
            }
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
