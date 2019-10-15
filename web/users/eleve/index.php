

<?php
    
    session_start();

    include_once("../../commun/requetes.class.php");
    include_once("../../../server/baseConf.php");


    $requete=new Requetes(HOSTNAME, BASENAME, USERNAME, PASSWORD);


    if(isset($_REQUEST["road"]) && $_REQUEST["road"]=="accueil"){

      define("NOMPAGE", "Accueil");
      define("ENTETEPAGE", "Entete");
      include_once("menu.php");

      include_once("vues/accueil.php");
    }
    
   /* if (isset($_REQUEST['road']) && $_REQUEST['road']=="custom") {
      # code...    
      $_SESSION['pseudo'] = $_GET['pseudo'];
      header("Location: vues/custom.php");
    } */
    if (isset($_REQUEST['road']) && $_REQUEST['road'] == 'profil'){

      define("NOMPAGE", "Accueil");
      define("ENTETEPAGE", "Entete");
      include_once("menu.php");
      //création des variables de session
      $_SESSION['pseudo'] = $_GET['pseudo'];
      $pseudo = $_GET['pseudo'];
      include_once('vues/profil.php');  

    }

    if (isset($_REQUEST['road']) && $_REQUEST['road'] == "notes") {
      # code...
      define("NOMPAGE", "Accueil");
      define("ENTETEPAGE", "Entete");
      include_once("menu.php");
      //création des variables de session
      $_SESSION['pseudo'] = $_GET['pseudo'];
      $pseudo = $_GET['pseudo'];
      include_once('vues/note.php');   
    }

    if (isset($_REQUEST['road']) && $_REQUEST['road'] == "lister") {
      # code...
      define("NOMPAGE", "Accueil");
      define("ENTETEPAGE", "Entete");
      include_once("menu.php");
      $_SESSION['pseudo'] = $_GET['pseudo'];
      $pseudo = $_GET['pseudo'];
      
      include_once('vues/matiere.php');   

    }

    if (isset($_GET['road']) && $_GET['road'] == "update") {
      # code...
      
      $_SESSION['pseudo'] = $_GET['pseudo'];
      header("Location: vues/custom.php?pseudo=".$_SESSION['pseudo']);

    }
    
      if (isset($_GET['road']) && $_GET['road'] == "updated") {
        # code...
        $password = $_POST['password'];
        $password1 = $_POST['password1'];

        if ($password == $password1) {
          # code...
          //j'insere dans la bdd   
                 
         $test = $requete->updatePassword($_SESSION['pseudo'],md5($password));
          echo $_SESSION['pseudo'];
          exit();
         if($test){
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
      
?>


<?php
  include_once("menuBas.php");
?>

