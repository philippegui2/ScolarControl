<?php  
    echo '<img alt="Photo utilisateur" height="135px" width="135px" src="'.$_SESSION["userEnVue"]["0"]["photo"]. '" class="img-circle" style="width:100;height:auto;"/>';
    print_r(" ".$_SESSION["userEnVue"]["0"]["prenomUser"]." ".$_SESSION["userEnVue"]["0"]["nomUser"]." - ".$_SESSION["userEnVue"][0]["matUser"]); 
?>
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
                                        <input type="hidden" name="identifiant" id="placeIdentifiant" value="<?php echo $_SESSION["userEnVue"][0]["matUser"];?>" /> 
                                        <input type="hidden" name="idMatiere"   id="placeIdMatiereNotes" /> <!-- idMatière à récupérer pour faire marcher -->
                                        <input type="hidden" name="redirect" value="notes"/>
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
    
    <?php 
        if(isset($_REQUEST["alert"]) and $_REQUEST["alert"]=="ok"){?>
        <div class="alert alert-success fade in" id="alertOK">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <strong>Super!</strong> la modification a été effectuée avec succès.
        </div>            
    <?php    }
    ?>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><i class=""></i>Matière</th>
                    <th><i class=""></i>Coefficient</th>
                    <th><i class=""></i>Note Contrôle</th>
                    <th><i class=""></i>Note TP</th>
                    <th><i class=""></i>Note Examens</th>
                    <th><i class=""></i>moyenne</th>
                    <?php if($_SESSION["user"]["statutUser"]==3){?>
                        <th><i class=""></i>action</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notes as $key => $note){?>
                    <tr>
                        <input type="hidden" id="idMatiere<?php echo $_SESSION["userEnVue"][0]["matUser"];?>" value="<?php echo $note["idMatiere"];?>"/>
                        <td><?php echo $note["libelle"];?></td>
                        <td><?php echo $note["coefficient"];?></td>
                        <td id="noteControle<?php echo $_SESSION["userEnVue"][0]["matUser"];?>"><?php echo $note["noteControle"];?></td>
                        <td id="noteTP<?php echo $_SESSION["userEnVue"][0]["matUser"];?>"><?php echo $note["noteTP"];?></td>
                        <td id="noteExamen<?php echo $_SESSION["userEnVue"][0]["matUser"];?>"><?php echo $note["noteExamen"];?></td>
                        <td><?php echo (intval($note["noteControle"])+intval($note["noteTP"])+intval($note["noteExamen"])*2)/4;?> </td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#modifNote" onclick="modifNote('<?php echo $_SESSION["userEnVue"][0]["matUser"];?>')"><i class="fa fa-pencil-square-o fa-fw"></i></button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>   
</div><!--/.row-->

