<?php
/**
 * @author Philippe Kolama GUILAVOGUI
 * This page is the admin bundlle controller
 * the road is the page that will be called in the middle
 * The param is the url param
 * © 2017 TeGuiLab
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
    if(isset($_REQUEST["road"]) or isset($_REQUEST["action"]))
        include_once("vues/menu.php");
    $req=new Requetes(HOSTNAME, BASENAME, USERNAME, PASSWORD);
    $fonctions=new Fonctions();
?>

<?php
    if(isset($_REQUEST["road"])){ //zone de traitement des liens
        if(!isset($_REQUEST["param"])){// si le paramètre de nom "parametre" n'est pas renseigné
            switch ($_REQUEST["road"]) {//zone de recupération de toutes les variables nécessaires aux pages
                case "notifications":{
                        $messages=$req->getMessagesByUser($_SESSION["user"]["matUser"]);//05R22
                        include_once("../../commun/vues/".$_REQUEST["road"].".php");
                        exit();
                    }
                    break;
                case "accueil":{
                        $nomPage="Accueil";

                    }
                    break;
                case "ajouter":{

                        $nomPage="Ajouter utilisateur";
                        $navig3="Ajouter utilisateur";
                        //-------------------

                        $classesDpt=$req->getClasseDepartement();
                        $statuts=$req->getStatut();
                    }
                    break;
                case "lister":{

                        $nomPage="Ajouter utilisateur";
                        $navig3="Lister utilisateur";
                        //-------------------
                        $nomPage="Liste des utilisateurs";


                        $lister=active;
                        $users=$req->getUser();
                        $statuts=$req->getStatut();
                    }
                    break;
                case "infos":{

                        $nomPage="Ajouter utilisateur";
                        $navig3="Infos utilisateur";
                        //-------------------
                        $infos=active;
                        $userEnVue=$req->getUser();
                        $statuts=$req->getStatut();
                        //print_r($userEnVue);


                    }
                    break;
                case "parametrage":{

                    }
                    break;
                case "notes":{//pas fini

                        $notes=$req->getNoteByUser($_SESSION["userEnVue"][0]["matUser"]);

                        //$matieres=$req->getMatiereByClasse(4);//recuperation des matières en fonction de la classe
                        

                    }
                    break;
                case "departements":{
                        $departements=$req->getDepartement();
                    }
                    break;
                case "classes":{
                        $classesDpt=$req->getClasseDepartement();
                        $departements=$req->getDepartement();

                        

                    }
                    break;
                case "matiere":{
                        $matieres=$req->getMatiereClasseDepartement();
                        $classesDpt=$req->getClasseDepartement();
                    }
                    break;
                case "users":{
                    }
                    break;
                case "userEnseignant":{
                    }
                    break; 
                case "enseignantMatiere":{
                        $enseignants=$req->getUserByStatut(3);//récupération des nom de tous les enseignants
                        $matieres=$req->getMatiereClasseDepartement();//récupération des matières, la classe et département
                    }
                    break;
                case "userChefsClasse":{
                        $chefsAndAdjoints=$req->getAllChefsAndAdjoint();//récupération de tous les chefs et adjoints de tous les départements

                    }
                    break;
                case "userResponsableClasse":{//récupération de tous les profs responsables de classe
                        $chefsRespoClasses=$req->getAllRespoAndAdjoint();
                    }
                    break;
                case "userResponsableDepartement":{//récupération de tous les responsables de département
                        $chefsRespoDepartements=$req->getAllRespoDepartement();
                    }
                    break;
                case "userTous":{//récupération de tous les responsables de département
                        $usersTous=$req->getUser();
                    }
                    break;
                case "userEleves":{//récupération de tous les élèves
                        $usersEleves=$req->getAllEleve();
                    }
                    break;
                case "enseignantMessage":{//récupération de tous les enseignants
                        $enseignants=$req->getUserByStatut(3);//récupération des nom de tous les enseignants
                    }
                    break;
                case "test":{//récupération de tous les enseignants
                        
                    }
                    break;

                        print_r($chefsAndAdjoint);
                 
                
                

                default:
                    echo "la page recherchée n'existe pas ou est en construction";
                    break;
            }
            include_once("vues/navigation.php");//insertion de la zone de navigation
            include_once("vues/".$_REQUEST["road"].".php");//insertionn de la vue
        }
        else{//s'il y a un paramètre envoyé
            $route=  explode(".",$_REQUEST["road"])["0"];//recuperation de la route sans les parametres
            switch ($route) {//zone de recupération de toutes les variables nécessaires aux pages
                case "infos":{
                        $userEnVue=$_SESSION["userEnVue"]=$req->getUserByid($_REQUEST["param"]);
                    }
                    break;
                case "modifClasse":{
                        $eleves=$req->getEleveByClasse($_REQUEST["param"]);//récupération des élèves d'une classe donnée (paramètre idClasse)
                        $enseignants=$req->getEnseignantByClasse($_REQUEST["param"]);//récupération des enseignants d'une classe donnée (paramètre idClasse)

                    }
                    break;
                case "modifDepartement":{
                        $enseignants=$req->getEnseignantByDepartement($_REQUEST["param"]);//récupération des enseignants d'un département donnée (paramètre idClasse)

                    }
                    break;
                
                    
                case "emploi":{
                 
                    $matieres = $req->getMatiereByClasse($_REQUEST["param"]);
                    $DefaultMatieres = $req->getCalendarByIdClasse($_REQUEST["param"]);
                    
                }break;

                   
                default:
                    echo "la page recherchée n'existe pas ou est en construction";
                    break;
            }

            include_once("vues/".$route.".php");
        }

    }else if(isset($_REQUEST["action"])){ //zone de traitement des actions
        switch($_REQUEST["action"]){
            case "AJOUTERajouter":{
                $chemin=$fonctions->enregImg($_FILES["photoUser"], $_REQUEST["matUser"], "../images/users/");//on place l'image sur le serveur et on recupère le chemin pour l'atteindre
                if($chemin["0"]==1){
                    $req->setUser($_REQUEST,$chemin["1"]);//on ajoute les données dans la base de données
                }
                if($_REQUEST["statutProfil"]==2){
                    $req->setEleve($_REQUEST);
                }elseif($_REQUEST["statutProfil"]==3){
                    $req->setFormateur($_REQUEST);
                }
                header("Location:index.php?road=ajouter&alert=ok");
                exit();
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
                $idMatiere=$req->setMatiere($_REQUEST);//ajout d'une matiere et recupération de son id
                foreach ($_REQUEST["idClasse"] as $idClasse){//Pour cha classe où la matière sera enseignée, association de la classe
                    $req->setClasseMatiere($idClasse,$idMatiere,$_REQUEST["coef".$idClasse]);
                }
                $matieres=$req->getMatiere();
                $matieres=$req->getMatiereClasseDepartement();
                $classesDpt=$req->getClasseDepartement();
                include_once("vues/matiere.php");//On recharge la page
            }
            break;

            case "EMPLOIajouter":{
                $DefaultMatieresValidation = $req->getCalendarByIdClasse($_REQUEST["idClasse"]);
               // print_r($DefaultMatieresValidation );

              if(empty($DefaultMatieresValidation))
              {

              
              
               $req->setEmploi($_REQUEST);
               echo 'added';
              }
              else{
                 $req->updateEmploi($_REQUEST);
                    
                echo 'updated';
               
              }
              
               
               

              
            }
            break;

            case "LISTERsupprimer":{
                $req->delUser($_REQUEST);
                $lister=active;
                $users=$req->getUser();
                $statuts=$req->getStatut();
                include_once("vues/lister.php");//On recharge la page
            }
            break;
            case "INFOSmodifier":{
                $req->updateUser($_REQUEST);
                $userEnVue=$_SESSION["userEnVue"]=$req->getUserByid($_REQUEST["matUser"]);
                include_once("vues/infos.php");//On recharge la page
            }
            break;
            case "MODIFCLASSEresponsable":{//ajout des responsables de classe
                if($_REQUEST["chefClasse"]!="vide"){  //Insertion du chef
                    $req->updateReinitChef($_REQUEST);
                    $req->updateChef($_REQUEST);
                    $req->updateChefClasse($_REQUEST);
                }
                if($_REQUEST["adjointChef"]!="vide"){ //Insertion de l'adjoint du chef
                    $req->updateReinitAdjoint($_REQUEST);
                    $req->updateAdjoint($_REQUEST);
                    $req->updateAdjointClasse($_REQUEST);
                }
                if($_REQUEST["respClasse"]!="vide"){//Insertion du responsable de classe

                    $req->updateReinitResponsable($_REQUEST);//modification de l'ancienne responsabilité de responsable de classe
                    //$req->updateReinitResponsableDepartement($_REQUEST);//--modification de l'ancienne responsabilité de responsable de département
                    $req->updateEnseignantResponsable($_REQUEST);//affectation du rôle de responsable à une classe
                    //$req->updateEnseignantResponsableDepartement($_REQUEST);//affectation du rôle de responsable à une classe
                    $req->updateResponsableClasse($_REQUEST);//affectation d'un prof reponsable à une classe
                    //$req->updateEraseResponsableDepartement($_REQUEST);-- à retoucher idClasse ne correspond pas à idDepartement 
                    $req->updateEraseResponsableDepartement($_REQUEST);

                   
                    //print_r($_REQUEST);

                }
                header("Location:index.php?road=classes");
                exit();
            }
            break;
            case "MODIFDEPARTEMENTresponsable":{
                if($_REQUEST["respDepartement"]!="vide"){//Insertion du responsable de classe

                    $req->updateReinitResponsableDepartement($_REQUEST);//--modification de l'ancienne responsabilité de responsable de département
                    //$req->updateReinitResponsable($_REQUEST);//modification de l'ancienne responsabilité de responsable de classe
                    $req->updateEnseignantResponsableDepartement($_REQUEST);//affectation du rôle de responsable à une classe
                    //$req->updateEnseignantResponsable($_REQUEST);//affectation du rôle de responsable à une classe
                    $req->updateResponsableDepartement($_REQUEST);//affectation d'un prof reponsable à une classe
                    //$req->updateEraseResponsableClasse($_REQUEST);-- à retoucher idClasse ne correspond pas à idDepartement
                    $req->updateEraseResponsableClasse($_REQUEST);

                    
                   // print_r($_REQUEST);

                }
                header("Location:index.php?road=departements");
                exit();
            }
            break;
            default:
               echo "i n'est ni égal à 2, ni à 1, ni à 0.";
        }
    }else if(isset($_REQUEST["reqajax"])){ //zone de traitement des requêtes AJAX
        switch ($_REQUEST["reqajax"]) {//zone de recupération de toutes les variables nécessaires aux pages
            case "ENSEIGNANTMATIEREensmatiere":{
                    print_r(json_encode($req->getIDMatiereByEnseignant($_REQUEST["parametre"])));
                    exit();
                }
                break;
            case "ENSEIGNANTMATIEREenvoiematiere":{
                    $donnees=json_decode(stripslashes($_REQUEST["parametre"]));
                    $matUser=array_shift($donnees);//récupération du matricule de l'enseigant et retrait du matricule parmis les paramètres, il ne reste plus que les id des matières
                    $req->delCoursByEnseignant($matUser);//Suppression de toutes les anciennes affectations
                    foreach ($donnees as $donnee) {
                        list($idMatiere, $idClasse) = explode("*", $donnee);
                           $req->setCours($matUser,$idMatiere,$idClasse);//insertion des nouvelles affectations 
                    }
                    exit();
                }
                break;
            case "USERCHEFSCLASSEenvoyerEmail":{

                    $chefsAndAdjoints=$req->getAllChefsAndAdjoint();//récupération de tous les chefs et adjoints
                    foreach($chefsAndAdjoints as $chefsAndAdjoint){
                        
                    }
                    $fonctions->envoieMail($email,$prenom,$message,$alternative);

                    //print_r($_REQUEST["parametre"]);
                    print_r("email");

                    exit();
                }
                break;
            case "USERCHEFSCLASSEenvoyerSMS":{

                    print_r($_SESSION["user"]["matUser"]);
                    

                    print_r("SMS");

                    exit();
                }
                break;
            case "USERCHEFSCLASSEenvoyerNotif":{

                    $chefsAndAdjoints=$req->getAllChefsAndAdjoint();//récupération de tous les chefs et adjoints
                    foreach($chefsAndAdjoints as $chefsAndAdjoint){
                        $req->setMessage($chefsAndAdjoint["matUser"],$_SESSION["user"]["prenomUser"]." ".$_SESSION["user"]["nomUser"],$_REQUEST["parametre"],$_REQUEST["parametre2"]);
                    }
                    exit();
                }
                break;
            case "envoyerEmail":{
                if($_REQUEST["parametre3"]=="respoClasse"){
                    $respoClasse=$req->getInfoRespoAndAdjoint();
                }else if($_REQUEST["parametre3"]=="respoDepartement"){
                    
                }
                    exit();
                }
                break;
            case "envoyerSMS":{
                    print_r($_REQUEST["parametre3"]);
                    
                    exit();
                }
                break;
            case "envoyerNotif":{
                    if($_REQUEST["parametre3"]=="respoClasse"){
                        $respoClasses=$req->getInfoRespoAndAdjoint();
                        foreach($respoClasses as $respoClasse){
                            $req->setMessage($respoClasse["matUser"],$_SESSION["user"]["prenomUser"]." ".$_SESSION["user"]["nomUser"],$_REQUEST["parametre"],$_REQUEST["parametre2"]);
                        }
                    }else if($_REQUEST["parametre3"]=="respoDepartement"){
                        $respoClasses=$req->getInfoRespoDepartement();
                        foreach($respoClasses as $respoClasse){
                            $req->setMessage($respoClasse["matUser"],$_SESSION["user"]["prenomUser"]." ".$_SESSION["user"]["nomUser"],$_REQUEST["parametre"],$_REQUEST["parametre2"]);
                        }
                    }else if($_REQUEST["parametre3"]=="tous"){
                        $tous=$req->getUser();
                        foreach($tous as $tou){
                            $req->setMessage($tou["matUser"],$_SESSION["user"]["prenomUser"]." ".$_SESSION["user"]["nomUser"],$_REQUEST["parametre"],$_REQUEST["parametre2"]);
                        }
                    }else if($_REQUEST["parametre3"]=="tousEleve"){
                        $tousEleves=$req->getAllEleve();
                        foreach($tousEleves as $tousEleve){
                            $req->setMessage($tousEleve["matUser"],$_SESSION["user"]["prenomUser"]." ".$_SESSION["user"]["nomUser"],$_REQUEST["parametre"],$_REQUEST["parametre2"]);
                        }
                    }else if($_REQUEST["parametre3"]=="tousEnseignant"){
                        $tousEnseignants=$req->getUserByStatut(3);
                        foreach($tousEnseignants as $tousEnseignant){
                            $req->setMessage($tousEnseignant["matUser"],$_SESSION["user"]["prenomUser"]." ".$_SESSION["user"]["nomUser"],$_REQUEST["parametre"],$_REQUEST["parametre2"]);
                        }
                    }

                    print_r("Notif");

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
  include_once("vues/menuBas.php");
?>
