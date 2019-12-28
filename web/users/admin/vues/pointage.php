<div class="row">
    <?php 
            if(isset($_REQUEST["alert"]) and $_REQUEST["alert"]=="ok"){?>
            <div class="alert alert-success fade in" id="alertOK">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Super!</strong> Operation effectuée avec succès.
            </div>            
        <?php }?>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liste des enseignants
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table id="table_list" class="display">
                        <thead>
                            <tr>
                                <th><i class="fa fa-user fa-fw"></i>Matricule</th>
                                <th><i class="fa fa-user fa-fw"></i>Prénom</th>
                                <th><i class="fa fa-user fa-fw"></i>Nom</th>
                                <th><i class="fa fa-gear fa-fw"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($enseignants as $enseignant){?>
                                <tr>
                                    <td><?php echo $enseignant["matUser"];?></td>
                                    <td><?php echo $enseignant["prenomUser"]; ?></td>
                                    <td><?php echo $enseignant["nomUser"];?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a title="Voir les pointages" class="btn btn-primary" href="?road=infosPointage&param=<?php echo $enseignant['matUser'];?>" style="color: #2b2b2b;"><i class="fa fa-eye fa-fw"></i></a>
                                            <a class="btn btn-success" href="../admin/?road=pointage"><i class="icon_check_alt2"></i></a>
                                            <a title="Effectuer un pointage" identifiant="<?php echo $enseignant["matUser"]."*".$enseignant["prenomUser"]."*".$enseignant["nomUser"];?>" href="#" data-toggle="modal" data-target="#modifInfosUser" class="btn btn-info" onclick="POINTAGEgestCaseAAcocher(this.getAttribute('identifiant'));"><i class="icon_pencil-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="modifInfosUser" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4> Pointage du formateur</h4>
                                </div> <!-- fin modal header -->

                                <div class="modal-body">

                                  <h4> Valider le pointage de <b><span id="noui"></span></b> ?</h4>

                                </div><!-- fin modal body -->

                                <div class="modal-footer">
                                    <form method="POST" action="../admin/index.php">
                                      <input id="nouiID" type="hidden" name="idFormateur" value="">
                                        <div class="form-group input-group">
                                            <select class="form-control" required name="idClasse" id="corpsSelectClasse">
                                                <option value="0">choisir la classe</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <select class="form-control" required name="dureePointage" id="corpsSelectClasse">
                                                <option value="0">durée</option>
                                                <option value="1">1H</option>
                                                <option value="2">2H</option>
                                                <option value="3">3H</option>
                                                <option value="4">4H</option>
                                                <option value="5">5H</option>
                                            </select>
                                        </div>
                                      <button type="submit" class="btn btn-danger" name="action" value="POINTAGEValider">OUI</button>
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
