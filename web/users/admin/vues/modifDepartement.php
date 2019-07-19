<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Choix du reponsable du département 
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                    <div class="col-lg-12">
                            <!--Debut du formulaire d'inscription-->
                        <form role="form" method="POST" action="../admin/index.php">
                            <input type="hidden" name="idDepartement" value="<?php echo $_REQUEST["param"];?>"/>
                            
                            <div class="form-group input-group">
                                <select class="form-control" required name="respDepartement">
                                    <option value="vide" >Choisir le responsable du département</option>
                                    <?php foreach ($enseignants as $enseignant){?>
                                    <option value="<?php  echo $enseignant["matUser"]."| ".$enseignant["nomUser"]." ".$enseignant["prenomUser"];?>"><?php echo $enseignant["nomUser"]." ".$enseignant["prenomUser"];?></option>
                                    <?php    
                                        }                                                   
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info" name="action" value="MODIFDEPARTEMENTresponsable">Choisir</button>
                        </form>
                        <!--Fin du formulaire d'inscription-->
                    </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div><!--/.row-->
