<div class="modal fade" id="Offres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ajouter une nouvelle année scolaire</h4>
            </div>
            <div class="modal-body" style="z-index: 3600;">
                <!--Debut du formulaire d'enregistrement-->
                    <form role="form" method="POST" action="../admin/index.php">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                            <input type="text" class="form-control" name="libelleAnnee" placeholder="Année scolaire" required/>
                        </div>
                        <span id="messageNotice"></span>
                        <button type="submit" class="btn btn-info" name="action" value="ANNEESCOLAIREAjouter">Ajouter l'année scoalaire</button>
                    </form>
                <!-- fin du formulaire d'enregistrement-->
            </div>
            <!--Fin du formulaire d'inscription-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="row">
    <?php 
            if(isset($_REQUEST["alert"]) and $_REQUEST["alert"]=="ok"){?>
            <div class="alert alert-success fade in" id="alertOK">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Super!</strong> Année Scolaire ajoutée avec succès.
            </div>            
        <?php }?>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Choix de parametrage
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div data-toggle="modal" data-target="#Offres" title="Jouter une nouvelle année scolaire"  class="btn btn-info">
                    <div class="col-lg-3">
                        <div>
                            <h4>Nouvelle année scolaire</h4>
                                <i class="fa fa-plus fa-5x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liste des années scolaires
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table display" id="table_list">
                    <thead>
                      <tr>
                          <th>N°</th>
                          <th>Année Scolaire</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($anneeScolaires as $key => $anneeScolaire){ ?>
                          <tr identifiant="<?php echo $usersEleve["matUser"];?>" class="active" data-toggle="modal" data-target="#ajoutEleveClasse" onclick="PAYEMENTgetCaseAAcocher(this.getAttribute('identifiant'))">
                              <td><?php echo intval($key+1);?></td>
                              <td><?php echo $anneeScolaire["libelleAnnee"];?></td>
                          </tr>
                      <?php } ?>       
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        
    </div>
</div><!--/.row-->