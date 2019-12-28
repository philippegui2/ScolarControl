<div class="row">
    <?php
        if(isset($_REQUEST["alert"]) and $_REQUEST["alert"]=="add"){?>
        <div class="alert alert-success fade in" id="alertOK">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <strong>Super!</strong> Nouvelle matière ajoutée avec succès.
        </div>
    <?php
     }elseif (isset($_REQUEST["alert"]) and $_REQUEST["alert"]=="edit") {?>
      <div class="alert alert-success fade in" id="alertOK">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <strong>Super!</strong> Modification effectuée avec succès.
        </div>
    <?php }
    ?>
    <div class="col-lg-10">
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
                                    <form role="form" method="POST" action="../admin/">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-university fa-fw"></i></span>
                                            <input type="text" class="form-control" placeholder="Ajouter le libellé de la nouvelle matière" name="designation">
                                        </div>
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th><i class="fa fa-check-circle fa-fw"></i></th>
                                                <th>Classe</th>
                                                <th>Département</th>
                                                <th>Coefficient</th>
                                              </tr>
                                            </thead>
                                            <tbody id="corpsEnseignantMatiere">
                                             <?php foreach($classesDpt as $classe){?>
                                                  <tr class="active">  
                                                      <td><input identifiant="<?php  echo $classe["idClasse"];?>" class="<?php  echo $classe["idClasse"];?>" type="checkbox" name="idClasse[]" value='<?php  echo $classe["idClasse"];?>' onclick="MATIEREApparution(this.getAttribute('identifiant'))"/></td>
                                                      <td><?php echo $classe["libelleClasse"];?></td>
                                                      <td><?php echo $classe["libelleDepartement"];?></td>
                                                      <td id="<?php echo "coef".$classe["idClasse"];?>" class="MATIEREdoou">
                                                          <select class="form-control" required name="<?php echo "coef".$classe["idClasse"];?>">
                                                            <option value="1">Choisir le coefficient de la matiere</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                      </td>
                                                  </tr>
                                              <?php } ?>       
                                            </tbody>
                                        </table>                       
                                        <button type="submit" class="btn btn-info" name="action" value="MATIEREajouter">Ajouter</button>
                                    </form>
                                <!-- fin du formulaire d'enregistrement-->
                        </div>
                        <!--Fin du formulaire d'inscription-->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        
            <!-- /.panel-heading -->
            
            <div class="modal fade" id="ajoutEleveClasse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:70%;">
                    <form action='index.php' method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                Cocher les classes dans lesquelles sont enseignées la matière sélectionnée
                                <button type="button" class="btn btn-danger pull-right btn-minimize" data-dismiss="modal" style="display:inline;">Fermer</button>
                                <button type="submit" name='action' value='MATIEREchangeClasse'  title="mettre à jour" id=""  class="btn btn-info pull-right btn-minimize" style="display:inline;margin-right:2px;" onclick="">mettre à jour</button>
                            </div>
                            <div class="modal-body" style="z-index: 3600;">
                                <input type="hidden" id="matiereEnVue" name="idMatiere" value=""/>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th><i class="fa fa-check-circle fa-fw"></i></th>
                                        <th>Classe</th>
                                        <th>Département</th>
                                      </tr>
                                    </thead>
                                    <tbody id="corpsMatiereClasse">
                                     <?php foreach($classesDpt as $classe){?>
                                          <tr class="active">
                                              <td><input identifiant="<?php  echo $classe["idClasse"];?>" class="<?php  echo $classe["idClasse"];?>" type="checkbox" name="idClasse[]" value='<?php  echo $classe["idClasse"];?>'/></td>
                                              <td><?php echo $classe["libelleClasse"];?></td>
                                              <td><?php echo $classe["libelleDepartement"];?></td>
                                          </tr>
                                      <?php } ?>       
                                    </tbody>
                                </table>    
                            </div>
                        </div><!-- /.modal-content -->
                    </form>
                </div><!-- /.modal-dialog -->
            </div>
            
            
            
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="bobo table table-striped table-bordered table-hover display" id="table_list">
                        <thead>
                            <tr>
                                <th><i class="fa fa-list-ol fa-fw"></i></th>
                                <th><i class="fa fa-cube fa-fw"></i>Libellé</th>
                                <th><i class="fa fa-gear fa-fw"></i>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($matieres as $key => $matiere) {?>
                            <tr>
                                <td><?php echo intval($key+1);?></td>
                                <td><?php echo $matiere["libelle"];?></td>
                                <td>
                                    <div class="btn-group">
                                      <a class="btn btn-primary" href="#"   identifiant="<?php echo $matiere["id"];?>" class="active" data-toggle="modal" data-target="#ajoutEleveClasse" onclick="MATIEREgetClasseMatiere(this.getAttribute('identifiant'))"    ><i class="icon_pencil"></i></a>
                                      <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                    </div>
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


