<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                liste des classes <button type="button" data-toggle="modal" data-target="#ajClasse" title="Ajouter un département" id="" style="display:inline;" class="btn btn-default pull-right btn-minimize" ><i class="fa fa-plus"></i></button>
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
                                <th><i class="fa fa-wrench fa-fw"></i>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($classesDpt as $key => $classeDpt) {?>
                            <tr>
                                <td><?php echo intval($key+1);?></td>
                                <td data-toggle="modal" data-target="<?php echo '#lesMat'.$classeDpt["idClasse"]?>">
                                    <?php echo $classeDpt["libelleClasse"];?>
                                </td>
                                <td><?php echo $classeDpt["libelleDepartement"] ;?></td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="<?php echo '#asMat'.$classeDpt["idClasse"]?>" title="Associer une matière" id="" style="display:inline;" class="btn btn-default pull-right btn-minimize" ><i class="fa fa-chain"></i></button>
                                    <!-- Modal zone-->
                                        <div class="modal fade" id="<?php echo'lesMat'.$classeDpt["idClasse"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Liste des matières enseignées</h4>
                                                    </div>
                                                    <div class="modal-body" style="z-index: 3600;">
                                                            <!--Debut du tableau des matières-->
                                                                
                                                                    <table class=" bobo table table-striped table-bordered table-hover" id="dataTables-example">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><i class="fa fa-list-ol fa-fw"></i></th>
                                                                                <th><i class="fa fa-cube fa-fw"></i>Libellé</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                foreach ($matClasses as $key => $matClasse){ 
                                                                                    if($classeDpt["idClasse"]==$matClasse["idClasse"]){?>
                                                                                    <tr>
                                                                                        <td><?php echo intval($key+1);?></td>
                                                                                        <td>
                                                                                            <?php 

                                                                                                    print_r($nouvelle[$matClasse["idMatiere"]]);

                                                                                                
                                                                                            ?>

                                                                                        </td>
                                                                                    </tr>                                
                                                                            <?php        
                                                                                }}
                                                                            ?>
                                                                        </tbody>
                                                                    </table>

                                                                    <button type="submit" class="btn btn-info" name="action" value="CLASSEassocier">Associer</button>
        
                                                            <!-- fin du tableau des matières-->
                                                    </div>
                                                    <!--Fin du formulaire d'inscription-->
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                    <!-- /.modal -->
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

