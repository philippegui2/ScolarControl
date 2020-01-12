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
            <div class="row mb-4">
                <h1 class="text-center">Bulletin de Notes</h1>
            </div>
            <div class="bg-light py-3 px-3">
                   
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Nom de la matière</th>
                            <th scope="col">Volume Horaire</th>
                            <th scope="col">Note du Controle</th>
                            <th scope="col">Note du TP</th>
                            <th scope="col">Note d'Examen</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($notes as $key => $note) {
                                    # code...             
                            ?>
                                    <tr>
                                    <!-- <th scope="row"><?=$i+1?></th> -->
                                        <td><?= $note['libelle'] ?> </td>
                                        <td>12H</td>
                                        <td><?= $note['noteControle'] ?> </td>
                                        <td><?= $note['noteTP'] ?> </td>
                                        <td><?= $note['noteExamen'] ?> </td>
                                    </tr>
                                    
                                <?php
                                                        
                                }
                                ?>
                        </tbody>
                    </table>
            </div>    
    </div>
</body>
</html>