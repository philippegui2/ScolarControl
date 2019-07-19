<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Choix des responsables de la classe
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                    <div class="col-lg-12">
                            <!--Debut du formulaire d'inscription-->
                        <form role="form" method="POST" action="../admin/index.php">
                            <input type="hidden" name="idClasse" value="<?php echo $_REQUEST["param"];?>"/>
                            <input type="hidden" name="idProf" value="<?php echo explode("|", $_REQUEST["param2"])[0];?>"/>
                            <div class="form-group input-group">
                                <select class="form-control" required name="chefClasse">
                                    <option value="vide" >Choisir le chef de classe</option>
                                    <?php foreach ($eleves as $eleve) {?>
                                    <option value="<?php  echo $eleve["matUser"]."| ".$eleve["nomUser"]." ".$eleve["prenomUser"];?>"><?php echo $eleve["nomUser"]." ".$eleve["prenomUser"];?></option>
                                    <?php    
                                        }                                                   
                                    ?>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <select class="form-control" required name="adjointChef">
                                    <option value="vide" >Adjoint au chef de classe</option>
                                    <?php foreach ($eleves as $eleve) {?>
                                    <option value="<?php  echo $eleve["matUser"]."| ".$eleve["nomUser"]." ".$eleve["prenomUser"];?>"><?php echo $eleve["nomUser"]." ".$eleve["prenomUser"];?></option>
                                    <?php    
                                        }                                                   
                                    ?>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <select class="form-control" required name="respClasse">
                                    <option value="vide" >Choisir le professeur responsable</option>
                                    <?php foreach ($enseignants as $enseignant) {?>
                                    <option value="<?php  echo $enseignant["matUser"]."| ".$enseignant["nomUser"]." ".$enseignant["prenomUser"];?>"><?php echo $enseignant["nomUser"]." ".$enseignant["prenomUser"];?></option>
                                    <?php    
                                        }                                                   
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info" name="action" value="MODIFCLASSEresponsable">Créer</button>
                        </form>
                        <!--Fin du formulaire d'inscription-->
                    </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div><!--/.row-->
