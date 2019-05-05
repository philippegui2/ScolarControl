

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
    
    if (isset($_REQUEST['road']) && $_REQUEST['road']=="custom") {
      # code...    
      $_SESSION['pseudo'] = $_GET['pseudo'];
      header("Location: vues/custom.php");
    }

    if (isset($_GET['road']) && $_GET['road'] == "update") {
      # code...
      $password = $_POST['password'];
      $password1 = $_POST['password1'];

      if ($password == $password1) {
        # code...
        //j'insere dans la bdd
        
       $test = $requete->updatePassword($_SESSION['pseudo'],md5($password));
       echo '<meta http-equiv="Refresh" content="0;url=index.php?road=accueil">';
       exit();       
        
      } else {
        # code...
        //je redirrige vers le formulaire de custom password
        header("Location: vues/custom.php");

      }
      
      
    }

  


?>


<?php
  include_once("menuBas.php");
?>

