<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                liste des classes <button type="button" data-toggle="modal" data-target="#ajClasse" title="Ajouter une classe" id="" style="display:inline;" class="btn btn-default pull-right btn-minimize" ><i class="fa fa-plus"></i></button>
            </div>
            <!-- Modal zone-->
            <div class="modal fade" id="ajClasse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Enregister une nouvelle classe</h4>
                        </div>
                        <div class="modal-body" style="z-index: 3600;">
                                <!--Debut du formulaire d'enregistrement-->
                                    <form role="form" method="POST" action="../admin/index.php">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-university fa-fw"></i></span>
                                            <input type="text" class="form-control" placeholder="Ajouter le libellé de la nouvelle classe" name="libDpt">
                                        </div>
                                         
                                        <div class="form-group input-group">
                                            <select class="form-control" required name="departement">
                                                <option value="0">departement</option>
                                                <?php 
                                                    foreach ($departements as $departement) 
                                                    {
                                                        echo '<option value="'.$departement['id'].'">'.$departement['libelle'].'</option>';
                                                    }                                                   
                                                ?>
                                            </select>
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" class="btn btn-info" name="action" value="CLASSEajouter">Créer</button>
                                    </form>
                                <!-- fin du formulaire d'enregistrement-->
                        </div>
                        <!--Fin du formulaire d'inscription-->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        
            <!-- /.panel-heading -->
            
            
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class=" bobo table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><i class="fa fa-list-ol fa-fw"></i></th>
                                <th><i class="fa fa-cube fa-fw"></i>Classe</th>
                                <th><i class="fa fa-cube fa-fw"></i>Département</th>

                                <th> <i class="fa fa-calendar fa-fw"></i>Calendrier</th>

                                <th> <i class="fa fa-user fa-fw"></i>Chef</th>
                                <th> <i class="fa fa-user fa-fw"></i>Adjoint</th>
                                <th> <i class="fa fa-user fa-fw"></i>Responsable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($classesDpt as $key => $classeDpt) {?>
                            <tr href="#">
                                <td><?php echo intval($key+1);?></td>
                                <td data-toggle="modal" data-target="<?php echo '#lesMat'.$classeDpt["idClasse"]?>">
                                    <?php echo $classeDpt["libelleClasse"];?>
                                </td>
                                <td><?php echo $classeDpt["libelleDepartement"] ;?></td>
                                <td>

                                    <a href="../admin/index.php?road=emploi&param=<?php echo $classeDpt["idClasse"];?>" >
                                      <i class="fa fa-calendar fa-fw" ></i></a>

                                    <!-- Modal zone-->
                                   
                                    <!-- /.modal -->
                                </td>
                                <td>
                                    <?php echo $classeDpt["chefClasse"] ;?>
                                </td>
                                <td>
                                    <?php echo $classeDpt["adjointChef"] ;?>
                                </td>
                                <td>
                                    <?php echo $classeDpt["profResponsable"] ;?>
                                </td>
                                <td>
                                    <a href="../admin/index.php?road=modifClasse&param=<?php echo $classeDpt["idClasse"];?>&param2=<?php echo $classeDpt["profResponsable"];?>"><i class="fa fa-pencil-square-o fa-fw"></i></a>
                                </td>
                            </tr>                                
                            <?php        
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->                                  
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div><!--/.row-->

