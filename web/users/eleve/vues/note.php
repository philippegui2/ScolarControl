<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
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
            //appel de la requete qui renvoie les notes d'un eleve
            $resultat = $requete->bulletin($_SESSION['pseudo']);
        ?>
            
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de la matière</th>
                <th scope="col">Volume Horaire</th>
                <th scope="col">Note du Controle</th>
                <th scope="col">Note du TP</th>
                <th scope="col">Note d'Examen</th>

                </tr>
            </thead>
            <tbody>
        <?php
            for ($i=0; $i < 4; $i++) { 
             
        ?>
                <tr>
                <th scope="row"><?=$i+1?></th>
                    <td><?= $resultat[$i]['libelle'] ?> </td>
                    <td>12H</td>
                    <td><?= $resultat[$i]['noteControle'] ?> </td>
                    <td><?= $resultat[$i]['noteTP'] ?> </td>
                    <td><?= $resultat[$i]['noteExamen'] ?> </td>
                </tr>
                
            <?php
                                    
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>