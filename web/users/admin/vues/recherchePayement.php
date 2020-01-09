<div id="leLoading" class="loader" style="position:absolute;left:50%;z-index:200;"></div>
<div class="row">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Choisir des critères de recherche</h4>
            </div>
            <div class="panel-body" style="z-index: 3600;">
                <form role="form" method="POST" action="../admin/index.php">
                    <label class="control-label col-lg-3" for="inputSuccess">Département</label>
                    <div class="form-group input-group">
                        <select class="form-control" required name="idDepartement" id="idDepartement">
                            <option value="0">Tous les départements</option>
                            <?php foreach ($departements as $departement){?>
                            <option value="<?php echo $departement['id']; ?>"><?php echo $departement['libelle']; ?></option>    
                            <?php }?>
                        </select>  
                    </div>
                    <label class="control-label col-lg-3" for="inputSuccess" id='labelidClasse'>Classe</label>
                    <div class="form-group input-group"> 
                        <select class="form-control" required name="idClasse" id="idClasse">
                            <option value="0">Toutes les classes</option>
                        </select>
                    </div>
                    <label class="control-label col-lg-3" for="inputSuccess" id='labelidClasse'>Element</label>
                    <div class="form-group input-group"> 
                        <select class="form-control" required name="idOffre">
                            <?php foreach ($offres as $offre){?>
                            <option value="<?php echo $offre['idOffre']; ?>"><?php echo $offre['libelleOffre']; ?></option>    
                            <?php }?>
                        </select>
                    </div>
                    <label class="control-label col-lg-3" for="inputSuccess" id='labelidClasse'>Payé ou non</label>
                    <div class="form-group input-group"> 
                        <select class="form-control" required name="paye" id="idClasse">
                            <option value='oui'>Payé</option>
                            <option value='non'>Non payé</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info" name="action" value="RECHERCHEPAYEMENTrechercher">Rechercher</button>
                </form>
            </div>
                        <!--Fin du formulaire d'inscription-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Resultat de recherche
            </header>
            <table class="table display" id="table_list">
              <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Prénoms</th>
                    <th>nom</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($eleves as $eleve){ ?>
                    <tr identifiant="<?php echo $eleve["matUser"];?>" class="active" data-toggle="modal" data-target="#ajoutEleveClasse" onclick="PAYEMENTgetCaseAAcocher(this.getAttribute('identifiant'))">
                        <td><?php echo $eleve["matUser"];?></td>
                        <td><?php echo $eleve["prenomUser"];?></td>
                        <td><?php echo $eleve["nomUser"];?></td> 
                    </tr>
                <?php } ?>       
              </tbody>
            </table>
        </section>
    </div>
</div><!--/.row-->
<?php  $_SESSION["resulaeRecherche"]=""; ?>