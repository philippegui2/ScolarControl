<?php
  define("NOMPAGE", "Accueil");
  define("ENTETEPAGE", "Entete");
  include_once("menu.php");
?>

<?php
    if(isset($_REQUEST["road"]) && $_REQUEST["road"]=="accueil"){
        include_once("vues/accueil.php");
    }
  

?>


<?php
  include_once("menuBas.php");
?>

