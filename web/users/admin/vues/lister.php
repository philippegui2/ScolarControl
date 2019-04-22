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
                                              <a identifiant="<?php echo $user['matUser']."*".$user['prenomUser']."*".$user['nomUser'];?>" href="#" data-toggle="modal" data-target="#modifInfosUser" class="btn btn-danger" onclick="transfertInfo(this.getAttribute('identifiant'));"><i class="icon_close_alt2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php    }

                            ?>
                        </tbody>
                    </table>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modifInfosUser" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <?php echo'<h4> Supprimer un utilisateur</h4>';?>
                                </div> <!-- fin modal header -->

                                <div class="modal-body">

                                  <h4> Voulez-vous vraiment supprimer <span id="noui"></span> ?</h4>

                                </div><!-- fin modal body -->

                                <div class="modal-footer">
                                    <form method="POST" action="../admin/index.php">
                                      <input id="nouiID" type="hidden" name="matUser" value="">
                                      <button type="submit" class="btn btn-danger" name="action" value="LISTERsupprimer">OUI</button>
                                      <button type="button" class="btn btn-info" data-dismiss="modal">NON</button>  
                                    </form>
                                </div><!-- /.modal-content -->

                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                      <!--"Fin ce qui apparait quand on clique sur le bouton "modifier" de voir profile-->
                    </div>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div><!--/.row-->
