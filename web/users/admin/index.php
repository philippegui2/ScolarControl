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
                case "anneescolaire":{
                        $nomPage="Année scolaire";
                        $navig2="paramètres";
                        $navig2Lien="parametrage";
                        $navig3="anneescolaire";
                        //-------------------
                        $anneeScolaires=$req->getAnneeScolaire();
                    }
                    break;
                case "ajouter":{
                        $nomPage="Ajouter des utilisateurs";
                        $navig3="Ajouter utilisateur";
                        //-------------------
                        $classesDpt=$req->getClasseDepartement();
                        $statuts=$req->getStatut();
                    }
                    break;
                case "lister":{
                        $nomPage="Liste des utilisateurs";
                        $navig3="Lister utilisateur";
                        //-------------------
                        $lister=active;
                        $users=$req->getUser();
                        $statuts=$req->getStatut();
                    }
                    break;
                case "infos":{
                        $nomPage="Infos des utilisateurs";
                        $navig3="Infos utilisateur";
                        //-------------------
                        $infos=active;
                        $userEnVue=$req->getUser();
                        $statuts=$req->getStatut();
                    }
                    break;
                case "parametrage":{
                        $nomPage="Parametrage général";
                        $navig3="Paramètres";
                        //-------------------
                    }
                    break;
                case "notes":{//pas fini
                        $notes=$req->getNoteByUser($_SESSION["userEnVue"][0]["matUser"]);
                    }
                    break;
                case "departements":{
                        $nomPage="Gestion des départements";
                        $navig3="Départements";
                        //-------------------
                        $departements=$req->getDepartement();
                        $anneeScolaires=$req->getAnneeScolaire();
                    }
                    break;
                case "classes":{
                        $nomPage="Gestion des classes";
                        $navig3="Classes";
                        //-------------------
                        $classesDpt=$req->getClasseDepartement();
                        $departements=$req->getDepartement();
                    }
                    break;
                case "matiere":{
                        $nomPage="Gestion des matières";
                        $navig3="matières";
                        //----------------------
                        $matieres=$req->getMatiere();
                        $classesDpt=$req->getClasseDepartement();
                    }
                    break;
                case "users":{
                        $nomPage="Gestion des utilisateurs";
                        $navig3="utilisateurs";
                        //----------------------
                    }
                    break;
                case "userEnseignant":{
                        $nomPage="Gestion des enseignants";
                        $navig2="utilisateurs";
                        $navig2Lien="users";
                        $navig3="enseignants";
                        //----------------------
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
                        $nomPage="Tous les utilisateurs";
                        $navig2="utilisateurs";
                        $navig2Lien="users";
                        $navig3="Tous les utilisateurs";
                        //----------------------
                        $usersTous=$req->getUser();
                    }
                    break;
                case "userEleves":{//récupération de tous les élèves
                        $usersEleves=$req->getAllEleve();
                        $classes=$req->getClasseDepartement();
                    }
                    break;
                case "enseignantMessage":{//récupération de tous les enseignants
                        $nomPage="Message vers les enseignants";
                        $navig2="gestion des enseigants";
                        $navig2Lien="userEnseignant";
                        $navig3="messages";
                        //------------------------
                        $enseignants=$req->getUserByStatut(3);//récupération des nom de tous les enseignants
                    }
                    break;
                case "payement":{//Zone de gestion des payements de scolarité
                        $offres=$req->getOffre();//récupération de toutes les offres
                        $usersEleves=$req->getAllEleve();
                        $classes=$req->getClasseDepartement();
                    }
                    break;
                case "recherchePayement":{//recherche avancée sur les payements
                        $departements=$req->getDepartement();//recupère la liste des départements
                        $offres=$req->getOffre();
                        $eleves=$_SESSION["resulaeRecherche"];
                    }
                    break;
                case "pointage":{//pointage
                        $nomPage="Pointage des enseignants";
                        $navig2="gestion des enseigants";
                        $navig2Lien="userEnseignant";
                        $navig3="pointage";
                        //------------------------
                        $enseignants=$req->getUserByStatut(3);//récupération des nom de tous les enseignants
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
                    }
                    break;
                case "test":{//pointage
                        
                    }
                    break;
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
                        //param = idEleve
                        $classe=$req->getEleveClasseDepartementByIdEleve($_REQUEST["param"])[0];
                        $userEnVue=$_SESSION["userEnVue"]=$req->getUserByid($_REQUEST["param"]);//récupération des informations d'un utilisateur sélectionné
                        $offres=$req->getOffre();//récupération de toutes les offres
                        $payement=$req->getPayementByEleve($_REQUEST['param']);
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
                    echo "la page recherchée n'existe pas ou est en construction";
                    break;
            }
            include_once("vues/navigationParam.php");//insertion de la zone de navigation
            include_once("vues/".$route.".php");//insertion du bas de page 
        }
    /***
     * Fin zone de traitement des liens
     * 
     * 
     * 
     * 
     * Début zone de traitement des actions
     */
    }else if(isset($_REQUEST["action"])){ //zone de traitement des actions
        switch($_REQUEST["action"]){
            case "AJOUTERajouter":{
                if($req->getUserByid($_REQUEST["matUser"])){
                    header("Location:index.php?road=ajouter&alert=existe");
                    exit();
                }else{
                    $chemin=$fonctions->enregImg($_FILES["photoUser"], $_REQUEST["matUser"], "../images/users/");//on place l'image sur le serveur et on recupère le chemin pour l'atteindre
                    if($chemin["0"]==1){
                        $req->setUser($_REQUEST,$chemin["1"]);//on ajoute les données dans la base de données
                    }else{
                        $req->setUser($_REQUEST,"../../img/defaultUser.jpg");
                    }
                    if($_REQUEST["statutProfil"]==2){
                        $req->setEleve($_REQUEST);
                    }elseif($_REQUEST["statutProfil"]==3){
                        $req->setFormateur($_REQUEST);
                    }
                    header("Location:index.php?road=ajouter&alert=ok");
                    exit();
                }
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
                header('Location:?road=matiere&alert=add');
            }
            break;

            case "EMPLOIajouter":{
                $DefaultMatieresValidation = $req->getCalendarByIdClasse($_REQUEST["idClasse"]);
               // print_r($DefaultMatieresValidation );

              if(empty($DefaultMatieresValidation)){
               $req->setEmploi($_REQUEST);
               header('Location:index.php?road=emploi&param='.$_REQUEST['idClasse'].'&alert=add');
              }
              else{
                 $req->updateEmploi($_REQUEST);
                 header('Location:index.php?road=emploi&param='.$_REQUEST['idClasse'].'&alert=edit');
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
                }
                header("Location:?road=classes");
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
                }
                header("Location:?road=departements");
                exit();
            }
            break;
            case "USERELEVESchangeClasse":{
                $req->updateClasseEleve($_REQUEST);
                header("Location:?road=userEleves");
                exit();
            }
            break;
            case "PAYEMENTajouter":{
                    $req->setOffre($_REQUEST);
                    header("Location:?road=payement");
                    exit();
                }
            break;
            case "PAYEMENTValider":{
                    $payements=$_REQUEST['payement'];
                    $montants=$_REQUEST['montant'];
                    foreach ($payements as $key => $payement){
                        $req->setPayement($_REQUEST['matUser'],$payement,$montants[$key]);
                    }
                    header("Location:index.php?road=payement");
                    exit();
                }
            break;
            case "INFOSValiderPayement":{
                    $payements=$_REQUEST['payement'];
                    $montants=$_REQUEST['montant'];
                    foreach ($payements as $key => $payement){
                        $req->setPayement($_REQUEST['matUser'],$payement,$montants[$key]);
                    }
                    header("Location:?road=infos&param=".$_REQUEST['matUser']."#payement");
                    exit();
                }
            break;
            case "MATIEREchangeClasse":{
                    $idClasses=$_REQUEST['idClasse'];
                    $req->deleteMatiereClasse($_REQUEST);
                    print_r($_REQUEST);
                    foreach ($idClasses as $key => $idClasse){
                        $req->setClasseMatiere($idClasse,$_REQUEST["idMatiere"]);
                    }
                    header("Location:?road=matiere&alert=edit");
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
            case "RECHERCHEPAYEMENTrechercher":{
                    print_r($_REQUEST);
                    if($_REQUEST['paye']=="oui"){
                        if($_REQUEST['idDepartement']=="0"){
                            $eleves=$req->getElevePayementOKDptAll($_REQUEST["idOffre"]);
                        }else{
                            if($_REQUEST['idClasse']=="0"){
                                $eleves=$req->getElevePayementOKByDpt($_REQUEST["idOffre"],$_REQUEST["idDepartement"]);
                            }else{
                                $eleves=$req->getElevePayementOKByDptAndClasse($_REQUEST["idOffre"],$_REQUEST["idDepartement"],$_REQUEST["idClasse"]);
                            }
                        }
                    }else if($_REQUEST['paye']=="non"){
                        if($_REQUEST['idDepartement']=="0"){
                            $eleves=$req->getElevePayementNODptAll($_REQUEST["idOffre"]);
                        }else{
                            if($_REQUEST['idClasse']=="0"){
                                $eleves=$req->getElevePayementNOByDpt($_REQUEST["idOffre"],$_REQUEST["idDepartement"]);
                            }else{
                                $eleves=$req->getElevePayementNOByDptAndClasse($_REQUEST["idOffre"],$_REQUEST["idDepartement"],$_REQUEST["idClasse"]);
                            }
                        }
                    }
                    $_SESSION["resulaeRecherche"]=$eleves;
                    header("Location:?road=recherchePayement");
                    exit();
                }
            break;
            case "ANNEESCOLAIREAjouter":{
                    $req->setAnneeScolaire($_REQUEST);
                    header("Location:?road=anneescolaire&alert=ok");
                    exit();
                }
            break;
            case "POINTAGEValider":{
                    $req->setPointage($_REQUEST);
                    header("Location:?road=pointage&alert=ok");
                    exit();
                }
            break;
            default:
               echo "i n'est ni égal à 2, ni à 1, ni à 0.";
        }
        /***
        * Fin zone de traitement des actions
        * 
        * 
        * Début zone de traitement des requêtes Ajax
        */
    }else if(isset($_REQUEST["reqajax"])){ //zone de traitement des requêtes AJAX
        switch ($_REQUEST["reqajax"]) {//zone de recupération de toutes les variables nécessaires aux pages
            case "ENSEIGNANTMATIEREensmatiere2":{
                //récupération de la liste des cours et les enseignants qui les donnent
                    print_r(json_encode($req->getCours()));
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
            case "PAYEMENTgetPayement":{
                    print_r(json_encode($req->getPayementByEleve($_REQUEST['param'])));
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
                    exit();
                }
                break;
                case "USERELEVESchangeClasse":{
                    print_r(json_encode($req->getEleveClasseById($_REQUEST["param"])));
                    exit();
                }
                break;
            case "MATIEREgetClasseMatiere":{
                    print_r(json_encode($req->getMatiereClasseDepartementByMatiere($_REQUEST["param"])));
                    exit();
                }
                break;
            case "RECHERCHEPAYEMENTgetClassesByDepartement":{
                    print_r(json_encode($req->getClasseByDpt($_REQUEST["param"])));
                    exit();
                }
                break;
            case "POINTAGEgetClassesByEnseignant":{
                //Récupération des classes dans lesquelles enseigne un enseignant donné
                    print_r(json_encode($req->getClasseByEnseignant($_REQUEST["param"])));
                    exit();
                }
                break;
            case "AGENDAsetRendezvous":{
                    //Enregistrer un rendez-vous
                    $req->setRendezvous($_REQUEST['laDate'],$_REQUEST['titre'],$_SESSION["user"]["matUser"]);
                    exit();
                }
                break;
            case "AGENDAupdateRendezvous":{
                    //Enregistrer un rendez-vous
                    $req->updateRendezvous($_REQUEST['laDateDebut'],$_REQUEST['laDateFin'],$_REQUEST['id']);
                    print_r(json_encode($_REQUEST));
                    exit();
                }
                break;
            case "AGENDAgetRendezvous":{
                    //Récupération des données de l'agenda
                    $rdvs=$req->getRendezvous();
                    $rendezvous=array();
                    foreach ($rdvs as $key => $rdv){
                        array_push(
                            $rendezvous,
                            array(
                                'id' => $rdv["idRendezvous"],
                                'title' => $rdv["titreRendezvous"],
                                'start' => $rdv["dateRendezvous"],
                                'end' => $rdv["dateFinRendezvous"],
                                'url' => "",
                                'color' => "green"//type 2 pour les autres types de rendez-vous
                            )
                        );
                    }
                    print_r(json_encode($rendezvous));
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
