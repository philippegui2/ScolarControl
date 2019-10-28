<div class="modal fade" id="ajoutEleveClasse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:70%;">
        <form action='index.php' method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    Liste des classes 
                    <button type="button" class="btn btn-danger pull-right btn-minimize" data-dismiss="modal" style="display:inline;">Fermer</button>
                    <button type="submit" name='action' value='USERELEVESchangeClasse'  title="mettre à jour" id=""  class="btn btn-info pull-right btn-minimize" style="display:inline;margin-right:2px;" onclick="">mettre à jour</button>
                </div>
                <div class="modal-body" style="z-index: 3600;">
                    <input type="hidden" id="eleveEnVue" value="" name="idEleve"> <!-- Stockage de l'id de l'utilisateur choisis pour utilisation dans les fonctions js-->
                    <table class="table" id="">
                        <thead>
                          <tr>
                            <th>Classe</th>
                            <th>Département</th>
                            <th><i class="fa fa-check-circle fa-fw"></i></th>
                          </tr>
                        </thead>
                        <tbody id="corpsEleveclasse">
                        <?php foreach($classes as $classe){?>
                            <tr class="active">
                                <td><?php echo $classe["libelleClasse"];?></td>
                                <td><?php echo $classe["libelleDepartement"];?></td>
                                <td><input id="<?php  echo "input".$classe["idClasse"];?>" name="idClasse" value="<?php  echo $classe["idClasse"];?>" type="radio"/></td>
                            </tr>
                        <?php } ?>       
                        </tbody>
                    </table>   
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div>

<div id="leLoading" class="loader" style="position:absolute;left:50%;z-index:200;"></div>

<div class="row">
    <div class="col-lg-10 col-md-10 col-sm-10">
        <section class="panel">
            <header class="panel-heading">
                Liste des chefs de département
                 <button type="button" data-toggle="modal" data-target="#EnvoieTexto" title="Envoyer un texto à tous" id="" style="display:inline;" class="btn btn-info pull-right btn-minimize" >Écrire à tous</button>
            </header>
            <!--//----- debut zone modal-->
            <div class="modal fade" id="EnvoieTexto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Envoyer un message à tous</h4>
                        </div>
                        <div class="modal-body" style="z-index: 3600;">
                            <!--Debut du formulaire d'enregistrement-->
                                <form role="form" method="POST" action="../admin/index.php">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                        <input type="text" class="form-control" id="objectMessage" placeholder="Objet du message"/>
                                    </div>
                                    <span id="messageNotice"></span>
                                    <div class="form-group input-group"> 
                                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                                        <textarea class="form-control" rows="3" id="message" placeholder="Ecrire le message ici" style=""></textarea>
                                    </div>
                                    <button type="button" class="btn btn-info" name="action" value="USERCHEFSCLASSEenvoyerEmail" onclick="envoyerEmail('tousEleve')">Envoyer email</button>
                                    <button type="button" class="btn btn-primary" name="action" value="USERCHEFSCLASSEenvoyerSMS" onclick="envoyerSMS('tousEleve')">Envoyer SMS</button>
                                    <button type="button" class="btn btn-success" name="action" value="USERCHEFSCLASSEenvoyerNotif" onclick="envoyerNotif('tousEleve')">Envoyer Texto</button>
                                </form>
                            <!-- fin du formulaire d'enregistrement-->
                        </div>
                        <!--Fin du formulaire d'inscription-->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!--//----- fin zone modal-->
            <table class="table display" id="table_list">
              <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Prénoms</th>
                    <th>nom</th>
                    <th>Classe</th>
                    <th>Departement</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($usersEleves as $usersEleve){ ?>
                    <tr identifiant="<?php echo $usersEleve["matUser"];?>" class="active" data-toggle="modal" data-target="#ajoutEleveClasse" onclick="USERELEVESgestCaseAAcocher(this.getAttribute('identifiant'))">
                        <td><?php echo $usersEleve["matUser"];?></td>
                        <td><?php echo $usersEleve["prenomUser"];?></td>
                        <td><?php echo $usersEleve["nomUser"];?></td> 
                        <td><?php echo $usersEleve["libelleClasse"];?></td>
                        <td><?php echo $usersEleve["libelleDepartement"];?></td>
                    </tr>
                <?php } ?>       
              </tbody>
            </table>
        </section>
    </div>
    <!--div class="col-lg-2 col-md-2 col-sm-2">
        <a class="" href="../admin/index.php?road=userEnseignant">
            <div class="info-box gray-bg">
                    <i class="fa fa-user fa-fw"></i>
                    <div class="count">Enseignant</div>
                    <div class="title">Gestion des enseignants</div>
            </div><!--/.info-box-->
        <!--/a>
    </div-->
</div><!--/.row-->