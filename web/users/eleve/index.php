

<?php
    
    session_start();

    include_once("../../commun/requetes.class.php");
    include_once("modele/Requetes.class.php");
    include_once("../../../server/baseConf.php");

    define("NOMPAGE", "Accueil");
      define("ENTETEPAGE", "Entete");
      include_once("menu.php");


    $requete=new Requetes(HOSTNAME, BASENAME, USERNAME, PASSWORD);

    $requetes = new RequeteLocal(HOSTNAME,BASENAME,USERNAME,PASSWORD);


    if(isset($_REQUEST["road"]) && $_REQUEST["road"]=="accueil"){

      

      include_once("vues/accueil.php");
    }
    
   /* if (isset($_REQUEST['road']) && $_REQUEST['road']=="custom") {
      # code...    
      $_SESSION['pseudo'] = $_GET['pseudo'];
      header("Location: vues/custom.php");
    } */
    if (isset($_REQUEST['road']) && $_REQUEST['road'] == 'profil'){

     
      //création des variables de session
      $_SESSION['pseudo'] = $_GET['pseudo'];
      $pseudo = $_GET['pseudo'];
      include_once('vues/profil.php');  

    }

    if (isset($_REQUEST['road']) && $_REQUEST['road'] == "notes") {
      # code...
      
      //création des variables de session
      $_SESSION['pseudo'] = $_GET['pseudo'];
      $pseudo = $_GET['pseudo'];
      include_once('vues/note.php');   
    }

    if (isset($_REQUEST['road']) && $_REQUEST['road'] == "lister") {
      # code...
      
      $_SESSION['pseudo'] = $_GET['pseudo'];
      $pseudo = $_GET['pseudo'];
      
      include_once('vues/matiere.php');   

    }

    if (isset($_GET['road']) && $_GET['road'] == "update") {
      # code...
      
      $_SESSION['pseudo'] = $_GET['pseudo'];
      //header("Location: vues/custom.php?pseudo=".$_SESSION['pseudo']);
      echo '<meta http-equiv="Refresh" content="0;url=vues/custom.php?pseudo="'.$_SESSION['pseudo'].'">';
      exit();

    }
    
      if (isset($_GET['road']) && $_GET['road'] == "updated") {
        # code...
        $password = $_POST['password'];
        $password1 = $_POST['password1'];

        if ($password == $password1) {
          # code...
          //j'insere dans la bdd   
                 
         $test = $requete->updatePassword($_SESSION['pseudo'],md5($password));
         if(!$test){
          echo '<meta http-equiv="Refresh" content="0;url=index.php?road=accueil">';
          exit();
        }else{
        
          echo 'echec update password user';
        }   
          
        }else{
          echo '<meta http-equiv="Refresh" content="0;url=index.php?road=update&errolog=erreur">';
          exit();
        }

      }

      // la zone de traitement de la scolarite de l'etudiant

      if (isset($_GET['road']) && $_GET['road']== 'scolarite') {
        # code...
        $info = $requetes->getInfoScolariteForStudent($_SESSION['user']['matUser']);
        // var_dump($info);

        var_dump($_SESSION);


      }elseif (isset($_GET['road']) && $_GET['road']== 'evaluation') { //zone de traitement des evaluations de l'etudiant
        # code...
        // echo 'dev';
        $classe = $requetes->getClasseForStudent($_SESSION['user']['matUser']);
        $evaluations = $requetes->getInfoEvaluationForStudent($classe[0]['idClasse']);

        var_dump($evaluations);
      }

      // 
      
?>


<?php
  include_once("menuBas.php");
?>

