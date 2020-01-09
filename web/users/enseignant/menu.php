<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>ScolarControl |<?php echo NOMPAGE;?></title>

    <!-- Bootstrap CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../../css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <link rel="stylesheet" type="text/css" href="../../css/datePicker.css"/>
    <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css"/>
    <!-- font icon -->
    <link href="../../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../../css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="../../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="../../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="../../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="../../css/owl.carousel.css" type="text/css">
    <link href="../../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="../../css/fullcalendar.css">
    <link href="../../css/widgets.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/style-responsive.css" rel="stylesheet" />
    <link href="../../css/xcharts.min.css" rel=" stylesheet">
    <link href="../../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <style>
        .loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid blue;
          border-right: 16px solid green;
          border-bottom: 16px solid red;
          border-left: 16px solid pink;
          width: 120px;
          height: 120px;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="../../js/html5shiv.js"></script>
      <script src="../../js/respond.min.js"></script>
      <script src="../../js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
    <!-- header start -->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="../enseignant/?road=accueil" class="logo">Scolar<span class="lite">Control</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>
                </ul>
                <!--  search form end -->
            </div>

            <div class="top-nav notification-row">
                &copy; TeGuiLab, all rights reserved
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="../../img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php echo $_SESSION['user']["prenomUser"]." ".$_SESSION['user']["nomUser"];?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="../enseignant/?road=monProfile"><i class="icon_profile"></i> Mon Profile</a>
                            </li>
                            <li>
                                <a href="../enseignant/?road=notifications"><i class="icon_mail_alt"></i> Messagerie</a>
                            </li>
                            <li>
                                <a href="login.html"><i class="icon_document_alt"></i> Documentation</a>
                            </li>
                            <li>
                                <a href="../../commun/controlleur.php?logout='logout'"><i class="icon_key_alt"></i> Deconnexion</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="../enseignant/?road=accueil">
                          <i class="fa fa-home fa-fw"></i>
                          <span>Accueil</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="../enseignant/?road=accueil">
                          <i class="fa fa-info-circle fa-fw"></i>
                          <span>Informations</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="" href="../enseignant/?road=listeclasses">
                          <i class="fa fa-university fa-fw"></i>
                          <span>Mes classes</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="../enseignant/?road=accueil">
                          <i class="fa fa-gears fa-fw"></i>
                          <span>Parametrage</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="" href="../enseignant/?road=agenda">
                          <i class="fa fa-calendar fa-fw"></i>
                          <span>Agenda</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="" href="../enseignant/?road=infosPointage">
                          <i class="fa fa-pencil-square fa-fw"></i>
                          <span>Pointage</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- debu contenu page -->
