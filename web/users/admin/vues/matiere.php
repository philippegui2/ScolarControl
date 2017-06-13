<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                liste des matières <button type="button" data-toggle="modal" data-target="#ajMatiere" title="Ajouter un département" id="" style="display:inline;" class="btn btn-default pull-right btn-minimize" ><i class="fa fa-plus"></i></button>
            </div>
            <!-- Modal zone-->
            <div class="modal fade" id="ajMatiere" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Enregister une nouvelle matière</h4>
                        </div>
                        <div class="modal-body" style="z-index: 3600;">
                                <!--Debut du formulaire d'enregistrement-->
                                    <form role="form" method="POST" action="../admin/index.php">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-university fa-fw"></i></span>
                                            <input type="text" class="form-control" placeholder="Ajouter le libellé de la nouvelle matière" name="designation">
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <select class="form-control" required name="classeMatiere">
                                                <option value="0">choisir la classe</option>
                                                <?php 
                                                    foreach ($classesDpt as $classeDpt) 
                                                    {
                                                        echo '<option value="'.$classeDpt['idClasse'].'">'.$classeDpt['libelleClasse']." ".$classeDpt['libelleDepartement'].'</option>';
                                                    }                                                   
                                                ?>
                                            </select>
                                        </div>
                                        
                                        
                                        
                                                                 
                                        <button type="submit" class="btn btn-info" name="action" value="MATIEREajouter">Créer</button>
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
                                <th><i class="fa fa-cube fa-fw"></i>Libellé</th>
                                <th><i class="fa fa-home fa-fw"></i>Classe</th>
                                <th><i class="fa fa-home fa-fw"></i>Département</th>
                                <th><i class="fa fa-wrench fa-fw"></i>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($matieres as $key => $matiere) {?>
                            <tr>
                                <td><?php echo intval($key+1);?></td>
                                <td><?php echo $matiere["libelleMatiere"];?></td>
                                <td><?php echo $matiere["libelleClasse"];?></td>
                                <td><?php echo $matiere["libelleDepartement"];?></td>
                                <td></td>
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


