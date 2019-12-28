<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                liste des départements | Vous pouvez modifier le responsable de département <button type="button" data-toggle="modal" data-target="#ajDepartement" title="Ajouter un département" id="" style="display:inline;" class="btn btn-default pull-right btn-minimize" ><i class="fa fa-plus"></i></button>
            </div>
            <!-- Modal zone-->
            <div class="modal fade" id="ajDepartement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Enregister un nouveau département</h4>
                        </div>
                        <div class="modal-body" style="z-index: 3600;">
                                <!--Debut du formulaire d'enregistrement-->
                                    <form role="form" method="POST" action="../admin/index.php">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-university fa-fw"></i></span>
                                            <input type="text" class="form-control" placeholder="Ajouter le libellé du nouveau département" name="libDpt">
                                        </div>
                                        <div class="form-group input-group">
                                            <label for="anneeScolaire">Année Scolaire</label>
                                            <select class="form-control" required name="idAnnee">
                                                <?php foreach($anneeScolaires as $key => $anneeScolaire){ ?>
                                                <option value="<?php echo $anneeScolaire['idAnnee'];?>"> <?php echo $anneeScolaire['libelleAnnee'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>                         
                                        <button type="submit" class="btn btn-info" name="action" value="DEPARTEMENTajouter">Créer</button>
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
                                <th><i class="fa fa-user fa-fw"></i>Responsable</th>
                                <th><i class="fa fa-calendar-o fa-fw"></i>Année Scolaire</th>
                                <th>modifier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($departements as $key => $departement) {?>
                            <tr>
                                <td>
                                    <?php echo intval($key+1);?>
                                </td>
                                <td>
                                    <?php echo $departement["libelle"];?>
                                </td>
                                <td>
                                    <?php echo $departement["responsable"];?>
                                </td>
                                <td>
                                    <?php echo $departement["libelleAnnee"];?>
                                </td>
                                <td>
                                    <a href="../admin/index.php?road=modifDepartement&param=<?php echo $departement["id"];?>"><i class="fa fa-pencil-square-o fa-fw"></i></a>
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

