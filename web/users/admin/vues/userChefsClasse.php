<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
        <section class="panel">
            <header class="panel-heading">
                Liste des chefs de classe et leurs adjoints
                 <button type="button" data-toggle="modal" data-target="#EnvoieTexto" title="Envoyer un texto à tous" id="" style="display:inline;" class="btn btn-info pull-right btn-minimize" >Écrire à tous</button>
            </header>
            <!--//- debut zone modal-->
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

                                        <span class="input-group-addon"><i class="fa fa-university fa-fw"></i></span>
                                        <textarea class="form-control" rows="3" id="message"></textarea>

                                    </div>
                                    <button type="button" class="btn btn-info" name="action" value="USERCHEFSCLASSEenvoyerEmail" onclick="USERCHEFSCLASSEenvoyer('email')">Envoyer email</button>
                                    <button type="button" class="btn btn-primary" name="action" value="USERCHEFSCLASSEenvoyerSMS" onclick="USERCHEFSCLASSEenvoyer('sms')">Envoyer SMS</button>
                                    <button type="button" class="btn btn-success" name="action" value="USERCHEFSCLASSEenvoyerNotif" onclick="USERCHEFSCLASSEenvoyer('notif')">Envoyer Texto</button>
                                </form>
                            <!-- fin du formulaire d'enregistrement-->
                        </div>
                        <!--Fin du formulaire d'inscription-->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!--//- fin zone modal-->
            <table class="table">
              <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Classe</th>
                    <th>Département</th>
                    <th>Role</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($chefsAndAdjoints as $chefsAndAdjoint){?>
                     <tr class="active">
                         <td><?php echo $chefsAndAdjoint["matUser"];?></td>
                         <td><?php echo $chefsAndAdjoint["prenomUser"];?></td>
                         <td><?php echo $chefsAndAdjoint["nomUser"];?></td>
                         <td><?php echo $chefsAndAdjoint["libClasse"];?></td>
                         <td><?php echo $chefsAndAdjoint["libDepartement"];?></td>
                         <td>
                             <?php if($chefsAndAdjoint["role"]=="2") 
                                        echo "Chef";
                                   else
                                        echo "Adjoint";
                             ?>
                         </td>
                     </tr>
                <?php } ?>       
              </tbody>
            </table>
        </section>
    </div>
</div><!--/.row-->

