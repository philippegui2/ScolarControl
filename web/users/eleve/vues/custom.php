<?php
        session_start();
        $_SESSION['pseudo'] = $_GET['pseudo'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>ScolarControl | Login</title>

    <!-- Bootstrap CSS -->
    <link href="/ScolarControl/web/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="/ScolarControl/web/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="/ScolarControl/web/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="/ScolarControl/web/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="/ScolarControl/web/css/style.css" rel="stylesheet">
    <link href="/ScolarControl/web/css/style-responsive.css" rel="stylesheet" />

</head>
<body>
    <div class="container">
                <form class="login-form" method="POST" action="../index.php?road=updated">
                    <div class="login-wrap">
                        <p class="login-img"><i class="icon_lock_alt"></i></p>
                        <?php

                        // modification de cette a uploader dans ma branche git
                            if (isset($_REQUEST['errolog']) AND $_REQUEST["errolog"]=="erreur") {?>
                            <div class="alert alert-block alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                le mot de passe n'est pas identique !
                            </div>
                        <?php    }
                        ?>

                            <div class="alert alert-block alert-info fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                Veuillez Personnaliser Votre Mot de Passse 
                            </div>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Nouveau Mot de Passe" autofocus>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                            <input type="password" class="form-control" name="password1" placeholder="Confirmer Mot de passe">
                        </div>
                        
                        <button class="btn btn-info btn-lg btn-block" type="submit">Modifier</button>
                    </div>
                 </form>
           
    </div>
</body>
</html>