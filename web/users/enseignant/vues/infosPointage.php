<div id="leLoading" class="loader" style="position:absolute;left:50%;z-index:200;"></div>
<div class="row">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Zone de recherche</h4>
            </div>
            <div class="panel-body" style="z-index: 3600;">
                <form role="form" method="POST" action="index.php">
                    
                    <div class="form-group input-group"> 
                        <label>Date de début</label>
                        <span class="input-group-addon"><i class="fa fa-calendar fa-faw"></i></span>
                        <input type="text" class="form-control" placeholder="Date de début" name="dateDebut" id="dateP" required>
                    </div>
                    
                    <div class="form-group input-group">
                        <label>Date de fin &nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <span class="input-group-addon"><i class="fa fa-calendar fa-faw"></i></span>
                        <input type="text" class="form-control" placeholder="Date de fin" name="dateFin" id="dateP2">
                    </div>
                    <input type='hidden' name='param' value='<?php echo $_SESSION["user"]["matUser"];?>'/>
                    <button type="submit" class="btn btn-info" name="action" value="INFOSPOINTAGErechercher">Rechercher</button>
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
            <table class="table">
              <thead>
                <tr>
                    <th>classe</th>
                    <th>date (aaa-mm-jj HH-mm-ss)</th>
                    <th>durée</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($pointages as $pointage){ ?>
                    <tr identifiant="<?php echo $eleve["matUser"];?>" class="active" data-toggle="modal" data-target="#ajoutEleveClasse" onclick="PAYEMENTgetCaseAAcocher(this.getAttribute('identifiant'))">
                        <td><?php echo $pointage["libelle"][0]." ".$pointage["libelle"][1];?></td>
                        <td><?php echo $pointage["datePointage"];?></td>
                        <td><?php echo $pointage["dureePointage"];?> H</td> 
                    </tr>
                <?php $totalHeure=intval($totalHeure+$pointage["dureePointage"]);} ?>
                    <tr style="background-color:grey;color:white;">
                        <td colspan="2">TOTAL</td>
                        <td><?php echo $totalHeure;?> H</td>
                    </tr>
              </tbody>
            </table>
        </section>
    </div>
</div><!--/.row-->
<?php  $_SESSION["resulaeRecherche"]=""; ?>