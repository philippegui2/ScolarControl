
<?php
//session_start();

?>
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
                <h1 class="text-center" style="margin-bottom: 20px;">Liste des Matières</h1>
            </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom de la matière</th>
                    <th scope="col">Volume Horaire</th>
                    <th scope="col">Nom de L'Enseignant</th>
                    <th scope="col">Plus d'infos</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($matieres as $key => $matiere) {
                # code...             
        ?>
                <tr>
                    <td><?= $matiere['libelle'] ?> </td>
                    <td>12H</td>
                    <td>Jean-Paul KOUNDOUNO</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#"><button type="button" class="btn btn-info">Voir Notes</button></a>
                            <a href="#"><button type="button" class="btn btn-secondary">Middle</button></a>
                            <a href="#"><button type="button" class="btn btn-success">Programme</button></a>
                        </div>
                    </td>
                </tr>
                
            <?php
                                    
            }
            ?>
            </tbody>
        </table>

    </div>
</body>
</html>