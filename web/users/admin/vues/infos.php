<div class="row">
    <div class="col-lg-9">
       <section class="panel">
             <header class="panel-heading tab-bg-info">
                 <ul class="nav nav-tabs">
                     <li class="active">
                         <a data-toggle="tab" href="#profile">
                             <i class="fa fa-user fa-fw"></i>
                             <?php echo $userEnVue[0]['prenomUser']." ".$userEnVue[0]['nomUser'];?>
                         </a>
                     </li>
                     <li class="">
                         <a data-toggle="tab" href="#dossier">
                             <i class="fa fa-folder-open fa-fw"></i>
                             Dossier
                         </a>
                     </li>
                     <li class="">
                         <a data-toggle="tab" href="#payement">
                             <i class="fa fa-money fa-fw"></i>
                             Scolarité
                         </a>
                     </li>
                 </ul>
             </header>
             <div class="panel-body">
                 <div class="tab-content">
                     <div id="profile" class="tab-pane active">
                       <div class="col-lg-12">
                       <section class="panel">
                           <div class="panel-body bio-graph-info">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="row">
                                               <div class="col-md-3">
                                                   <header class="panel-heading">
                                                       <img alt="Photo utilisateur" height="135px" width="135px" src="<?php echo $userEnVue[0]['photo'];?>" class="img-circle" style="width:100;height:auto;"/>
                                                   </header>
                                               </div>
                                               <div class="col-md-9">
                                                   <table class="table table-responsive">
                                                     <tbody>
                                                     <tr>
                                                         <th>Inscription</th>
                                                         <td><?php echo   $fonctions->formatDate($userEnVue[0]['dateInscription']); ; ?></td>
                                                     </tr>
                                                     <tr>
                                                         <th>Sexe</th>
                                                         <td><?php echo $userEnVue[0]['sexeUser']; ?></td>
                                                     </tr>
                                                     <tr>
                                                         <th>Naissance</th>
                                                         <td><?php echo $fonctions->formatDate($userEnVue[0]['naissanceUser'])." à ".$userEnVue[0]['lieuNaissance'];?></td>
                                                     </tr>
                                                     <tr>
                                                         <th>Age</th>
                                                         <td><?php echo $fonctions->age($userEnVue[0]['naissanceUser']); ?></td>
                                                     </tr>
                                                     <tr>
                                                         <th>Adresse</th>
                                                         <td><?php echo $userEnVue[0]['adresseUser']; ?></td>
                                                     </tr>
                                                     <tr>
                                                         <th>Téléphone</th>
                                                         <td><?php echo $userEnVue[0]['contactUser']; ?></td>
                                                     </tr>
                                                     <tr>
                                                         <th>Etat du payement</th>
                                                         <td><?php echo "à jour ou pas"; ?></td>
                                                     </tr>
                                                     </tbody>
                                                   </table>
                                                   <button   data-toggle="modal" data-target="#modifInfosUser" style="" type="button" class="btn btn-info"  name="modifInfosPat" id="modifInfosPat" value="" >Modifier</button>
                                                   <!--"Ce qui apparait quand on clique sur le bouton "modifier" de voir profile-->
                                                   <!-- Modal -->
                                                   <div class="modal fade" id="modifInfosUser" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog">
                                                       <div class="modal-content">
                                                         <div class="modal-header">
                                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                           <?php echo'<h4 class="modal-title" id="ModalLabel">'.$user['prenom'].' '.$user['nom'].' | Modifier les infos du patient</h4>';?>
                                                         </div> <!-- fin modal header -->

                                                             <div class="modal-body">

                                                               <!--Debut du formulaire d'inscription-->
                                                               <form role="form">

                                                                   <div class="form-group input-group">
                                                                       <span class="input-group-addon">Nom</span>
                                                                       <?php echo'<input type="text" class="form-control" placeholder="Nom" required name="nomPatient" id="nomPatient" value="'.$userEnVue[0]['nomUser'].'">';?>
                                                                   </div>
                                                                   <div class="form-group input-group">
                                                                       <span class="input-group-addon">Prénom</span>
                                                                       <?php echo'<input type="text" class="form-control" placeholder="'.$user['prenom'].'" required id="prenomPatient" name="prenomPatient" value="'.$userEnVue[0]['prenomUser'].'">';?>
                                                                   </div>
                                                                   <div class="form-group input-group">
                                                                       <span class="input-group-addon">Naissance</span>
                                                                       <?php echo'<input type="text" class="form-control" placeholder="'.$user['prenom'].'" required id="prenomPatient" name="prenomPatient" value="'.$userEnVue[0]['naissanceUser'].'">';?>
                                                                   </div>
                                                                   <div class="form-group input-group">
                                                                       <span class="input-group-addon">Lieu</span>
                                                                       <?php echo'<input type="text" class="form-control" placeholder="Lieu de naissance" required id="lieuNaissancePatient" name="lieuNaissancePatient" value="'.$userEnVue[0]['lieuNaissance'].'">';?>
                                                                   </div>
                                                                   <div class="form-group input-group">
                                                                       <span class="input-group-addon">Adresse</span>
                                                                       <?php echo'<input type="text" class="form-control" placeholder="Adresse" required id="adressePatient" name="adressePatient" value="'.$userEnVue[0]['adresseUser'].'">';?>
                                                                   </div>


                                                                   <div class="form-group input-group">
                                                                       <span class="input-group-addon">Téléphone</span>
                                                                       <?php echo'<input type="num" class="form-control" placeholder="Telephone" required id="contactPatient" name="contactPatient" value="'.$userEnVue[0]['contactUser'].'">';?>
                                                                   </div>

                                                                   <div class="form-group input-group">
                                                                     <span class="input-group-addon"> sexe </span>
                                                                       <select class="form-control" required id="sexePatient" name="sexePatient">
                                                                          <?php echo'<option value="'.$user['sexe'].'" >'.$userEnVue[0]['sexeUser'].'</option>';?>
                                                                          <option value="M" >Masculin</option>
                                                                          <option value="F" >Feminin</option>
                                                                       </select>
                                                                   </div>

                                                               </form>
                                                               <!--Fin du formulaire d'inscription-->

                                                             </div><!-- fin modal body -->
                                                             <div class="modal-footer">
                                                                     <button type="button" id="boutModifInfosPatient" class="btn btn-danger" data-dismiss="modal" onclick="envoieModifPatient()" >Modifier</button>
                                                                     <button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>


                                                       </div><!-- /.modal-content -->

                                                     </div><!-- /.modal-dialog -->


                                                



                                                   </div><!-- /.modal -->
                                                 <!--"Fin ce qui apparait quand on clique sur le bouton "modifier" de voir profile-->
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                           </div>
                           </div>
                       </section>
                       </div>
                       </div>

                     <!-- edit-profile -->
                     <div id="dossier" class="tab-pane">
                       <div class="col-lg-6">
                       <section class="panel">
                             <div class="panel-body bio-graph-info">
                                <div class="form-group">
                                 <a href="../admin/index.php?road=notes" > <button type="button" class="btn btn-outline btn-info btn-lg btn-block">Etat des notes</button> </a>
                                </div>

                                <div class="form-group" >
                                 <a href="../admin/index.php?road=notes" ><button type="submit" class="btn btn-outline btn-info btn-lg btn-block">Etat de la ponctualité</button></a>
                                </div>

                             </div>
                       </section>
                       </div>
                     </div>

                     <!-- consultation -->
                     <div id="payement" class="tab-pane">
                       <div class="col-lg-6">
                       <section class="panel">
                             <div class="panel-body bio-graph-info">

                             </div>
                       </section>
                       </div>
                     </div>

                 </div>
             </div>
         </section>
    </div>
</div>
