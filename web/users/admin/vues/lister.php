<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liste des utilisateurs
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class=" bobo table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><i class="fa fa-user fa-fw"></i>Prénom</th>
                                <th><i class="fa fa-user fa-fw"></i>Nom</th>
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
                                        echo '<td>'.$user['prenomUser'].'</td> <td>'.$user['nomUser'].'</td>   <td>'.$user['matUser'].'</td>   <td>'.$statuts[$user['statutUser']-1]["nomStatut"].'</td>';
                                ?>

                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="../admin/index.php?road=infos&param=<?php echo $user['matUser'];?>" style="color: #2b2b2b;"><i class="fa fa-eye fa-fw"></i></a>
                                              <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                              <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php    }

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
