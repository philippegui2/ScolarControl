<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form method="POST" action="index.php">
                    <input type="hidden" name="idMatiere" value="<?php echo $_REQUEST["param"];//idMatiere?>"/>
                    <input type="hidden" name="idClasse" value="<?php echo $_REQUEST["param2"];//idClasse?>"/>
                    <input type="text" placeholder=" Veuillez insérer le titre de la partie du cours" name="nomPartieMatiere" size="60"/>
                    <button type="submit" name="action" value="CAHIERTEXTEajoutPartie"><i class="fa fa-plus"></i></button>
                </form>
            </div>
            <!-- Modal zone-->
            <div class="modal fade" id="ajPartie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Validation de la partie du cours</h4>
                        </div>
                        <form method="POST" action="index.php">
                            <div class="modal-body">
                                <input type="hidden" name="idMatiere" value="<?php echo $_REQUEST["param"];//idMatiere?>"/>
                                <input type="hidden" name="idClasse" value="<?php echo $_REQUEST["param2"];//idClasse?>"/>
                                <input type="hidden" id="partieEnVue" name="idPartie" value=""/>
                                <p>Voulez-vous marquer cette partie du cours comme effectuée?</p>
                                <input type="text" placeholder="Ajouter une observation?" name="observation" class="form-control"/>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Fermer</button>
                                <button class="btn btn-info" type="submit" name="action" value="CAHIERTEXTEconfirmEffectue"> Confirmer</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class=" bobo table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><i class="fa fa-cube fa-fw"></i>Partie du cours</th>
                                <th><i class="fa fa-list-ol fa-fw"></i>Etat</th>
                                <th><i class="fa fa-cube fa-fw"></i>Action</th>
                                <th><i class="fa fa-list-ol fa-fw"></i>Observation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($partieCours as $key => $partieCahier) {?>
                            <tr>
                                <td><?php echo $partieCahier["nomPartie"];?></td>
                                <td><?php if($partieCahier["etatPartie"]==1) echo '<i class="fa fa-check-circle fa-fw"></i>';else echo '<i class="fa fa-times-circle fa-fw"></i>'?></td>
                                <td><button identifiant="<?php echo $partieCahier["idPartie"];?>" type="button" data-toggle="modal" data-target="#ajPartie" onclick="document.getElementById('partieEnVue').value=this.getAttribute('identifiant')">valider</button></td>
                                <td><?php echo $partieCahier["observation"];?></td>
                            </tr>                                
                            <?php }?>
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


