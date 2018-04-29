<!DOCTYPE html>
<?php
  include_once("commun/controlleur.php");
?>
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" method="POST" action="index.php">
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <?php
                if ($_REQUEST["errolog"]=="erreur") {?>
                  <div class="alert alert-block alert-danger fade in">
                      <button data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove"></i>
                      </button>
                       Le login ou le mot de passe est incorrect
                  </div>
            <?php    }
            ?>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="login" placeholder="Login" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Mot de passe">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Se souvenir de moi
                <span class="pull-right"> <a href="#"> Mot de passe oublié?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Valider</button>
            <button class="btn btn-info btn-lg btn-block" type="button">S'inscrire</button>
        </div>
      </form>

    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2017 ScolarControl | By : TeGuiLab
                </div>

            </div>
        </div>
    </footer>

  </body>
</html>
