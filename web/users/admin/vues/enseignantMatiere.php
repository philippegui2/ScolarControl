<div class="modal fade" id="ajoutEnseignantClasse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-header">
                Liste des matières 
                <button type="button" class="btn btn-danger pull-right btn-minimize" data-dismiss="modal" style="display:inline;">Fermer</button>
                <button type="button"  title="mettre à jour" id=""  class="btn btn-info pull-right btn-minimize" style="display:inline;margin-right:2px;" data-dismiss="modal" onclick="ENSEIGNANTMATIEREenvoieEnsMat()">mettre à jour</button>
            </div>
            <div class="modal-body" style="z-index: 3600;">
                <input type="hidden" id="ensEnVue"> <!-- Stockage de l'id de l'utilisateur choisis pour utilisation dans les fonctions js-->
                <table class="table">
                    <thead>
                      <tr>
                        <th>Libellé</th>
                        <th>Classe</th>
                        <th>Département</th>
                        <th>Enseignant</th>
                        <th><i class="fa fa-check-circle fa-fw"></i></th>
                      </tr>
                    </thead>
                    <tbody id="corpsEnseignantMatiere">
                    <?php foreach($matieres as $matiere){?>
                        <tr class="active">
                            <td><?php echo $matiere["libelleMatiere"];?></td>
                            <td><?php echo $matiere["libelleClasse"];?></td>
                            <td><?php echo $matiere["libelleDepartement"];?></td>
                            <td id="nomPrenomEnseigant"></td>
                            <td><input identifiant="<?php  echo $matiere["idMatiere"];?>" identclasse="<?php  echo $matiere["idClasse"];?>" type="checkbox" name="<?php echo 'enMat'.$matUser?>" id="" value='<?php  echo $matiere["idMatiere"]."*".$matiere["idClasse"];?>'/></td>
                        </tr>
                    <?php } ?>       
                    </tbody>
                </table>   
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="leLoading" class="loader" style="position:absolute;left:50%;z-index:200;"></div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <section class="panel">
            <header class="panel-heading">
                Liste des enseignants | Cliquer sur l'enseignant pour lui affecter des matières
            </header>
            <table class="table">
              <thead>
                <tr>
                  <th>Matricule</th>
                  <th>Prénoms</th>
                  <th>Nom</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach($enseignants as $enseignant){?>
                    <tr identifiant="<?php echo $enseignant["matUser"];?>" class="active" data-toggle="modal" data-target="#ajoutEnseignantClasse" onclick="ENSEIGNANTMATIEREgestCaseAAcocher(this.getAttribute('identifiant'))">
                        <td><?php echo $enseignant["matUser"];?></td>
                        <td><?php echo $enseignant["prenomUser"]; ?></td>
                        <td><?php echo $enseignant["nomUser"];?></td>
                    </tr>
                <?php } ?>       
              </tbody>
            </table>
        </section>
    </div>
</div><!--/.row-->

