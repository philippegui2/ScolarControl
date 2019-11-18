<div class="row">
    <div class="modal fade" id="modifNote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 id="nomPrenom" class="modal-title" id="myModalLabel" style="display:inline;"></h4> - notes en <?php echo $notes[0]["libelle"];?>
                </div>
                <div class="modal-body" style="z-index: 3600;">
                        <!--Debut du formulaire d'enregistrement-->
                            <form role="form" method="POST" action="../enseignant/">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th><i class="fa fa-file-text fa-fw"></i>Note Contrôle</th>
                                        <th><i class="fa fa-file-text fa-fw"></i>Note TP</th>
                                        <th><i class="fa fa-file-text fa-fw"></i>Note Examen</th>
                                      </tr>
                                    </thead>
                                    <tbody id="corpsEnseignantMatiere">
                                      <tr>
                                        <td><input type="text" name="noteControle" id="placeNoteControle"></td>
                                        <td><input type="text" name="noteTP" id="placeNoteTP"></td>
                                        <td><input type="text" name="noteExamen" id="placeNoteExamen"></td>
                                        <input type="hidden" name="identifiant" id="placeIdentifiant" />
                                        <input type="hidden" name="idMatiere" id="placeIdMatiere" value="<?php echo $_REQUEST["param"];?>"/>
                                      </tr>
                                    </tbody>
                                </table>                       
                                <button type="submit" class="btn btn-info" name="action" value="ALLNOTESmodifNote">valider</button>
                            </form>
                        <!-- fin du formulaire d'enregistrement-->
                </div>
                <!--Fin du formulaire d'inscription-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    
    <div class="col-lg-12">
        <?php if(isset($_REQUEST["alert"]) and $_REQUEST["alert"]=="ok"){?>
            <div class="alert alert-success fade in" id="alertOK">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Super!</strong> la modification a été effectuée avec succès.
            </div>            
        <?php }?>

        <div class="panel panel-default">
            <div class="panel-heading">
                Liste des notes en <span class="label label-info"><?php echo $notes[0]["libelle"];?></span> 
                &nbsp;<a class="btn btn-primary pull-right" href="index.php?road=cahierTexte&param=<?php echo $_REQUEST["param"];//idMatiere?>&param2=<?php echo $_REQUEST["param2"];//idClasse?>"> Voir le cahier de texte</a>
                &nbsp;<a class="btn btn-success pull-right" href="index.php?road=evaluations&param=<?php echo $_REQUEST["param"];//idMatiere?>&param2=<?php echo $_REQUEST["param2"];//idClasse?>"> Préparer un examen</a>
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
                                <th><i class="fa fa-file-text fa-fw"></i>Note Contrôle</th>
                                <th><i class="fa fa-file-text fa-fw"></i>Note TP</th>
                                <th><i class="fa fa-file-text fa-fw"></i>Note Examen</th>
                                <th><i class="fa fa-gears fa-fw"></i>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($eleves as $eleve){?>
                                    <tr>
                                        <td id="prenomUser<?php echo$eleve['matUser'];?>"><?php echo $eleve['prenomUser'];?></td> 
                                        <td id="nomUser<?php echo$eleve['matUser'];?>"><?php echo $eleve['nomUser'];?></td>   
                                        <td><?php echo $eleve['matUser'];?></td>
                                        <?php foreach ($notes as $note) {
                                                if($note['matUser'][0]==$eleve['matUser']) { ?>
                                                    <td id="noteControle<?php echo $eleve['matUser'];?>"><?php echo $note['noteControle'];?></td>
                                                    <td id="noteTP<?php echo $eleve['matUser'];?>"><?php echo $note['noteTP'];?></td>
                                                    <td id="noteExamen<?php echo $eleve['matUser'];?>"><?php echo $note['noteExamen'];?></td>
                                                <?php }
                                                ?>
                                        <?php } ?>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modifNote" onclick="modifNote('<?php echo $eleve['matUser'];?>')"><i class="fa fa-pencil-square-o fa-fw"></i></button>
                                        </td>
                                    </tr>
                            <?php }
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
