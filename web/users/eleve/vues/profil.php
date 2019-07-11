<!DOCTYPE html>
<html lang="fr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScolarControl | Login</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
    <?php

                  
        include_once("../../commun/requetes.class.php");
        include_once("../../../server/baseConf.php");


        $requete=new Requetes(HOSTNAME, BASENAME, USERNAME, PASSWORD);
        $resultat = $requete->user($_SESSION['pseudo']);

        var_dump($resultat);
        
    ?>
    </div>
</body>
</html>