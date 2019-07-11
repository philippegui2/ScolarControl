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
                         <a data-toggle="tab" href="#autre">
                             <i class="fa fa-money fa-fw"></i>
                             Autre
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
                                                     </tbody>
                                                   </table>
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
                     <div id="autre" class="tab-pane">
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
