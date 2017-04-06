<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liste des utilisateurs
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><i class="fa fa-user fa-fw"></i>Nom</th>
                                <th><i class="fa fa-user fa-fw"></i>Prénom</th>
                                <th><i class="fa fa-user fa-fw"></i>Matricule</th>
                                <th><i class="fa fa-user fa-fw"></i>Statut</th>
                                <th><i class="fa fa-gear fa-fw"></i>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                foreach($users as $user)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$user['nomUser'].'</td> <td>'.$user['prenomUser'].'</td>   <td>'.$user['matUser'].'</td>   <td>'.$statuts[$user['statutUser']-1]["nomStatut"].'</td>'  ;

                                    /////Bouton de modification
                                    //ce formulaire envoie à la page trouverätient.php l'identifiant de l'utilisateur et la page qui servira de vue
                                    echo '<td>
                                    <form action="infosPatient.php" method="POST" style="display:inline;">
                                        <input type=hidden  name="id" value="'.$user['id'].'"/>
                                        <button class="btn btn-primary" >
                                        Afficher
                                        </button>
                                    </form>';
                                    echo '</tr>';
                                }

                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div><!--/.row-->
