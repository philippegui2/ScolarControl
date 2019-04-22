<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Nouvel Utilisateur
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                    <div class="col-lg-12">
                            <!--Debut du formulaire d'inscription-->
                        <form enctype="multipart/form-data" role="form" method="POST" action="../admin/index.php">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="matricule" name="matUser">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Nom" required name="nomUser">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Prénom" required name="prenomUser">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-home fa-faw"></i></span>
                                <input type="text" class="form-control" placeholder="Adresse" name="adresseUser">
                            </div>
                            <!--zone d'affichage du calendrier-->
                            <div style="position:absolute;bottom:200%;">
                            <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
                                <tr>
                                    <td id="ds_calclass"></td>
                                </tr>
                            </table>
                            </div>
                            <!--fin zone d'affichage du calendrier-->
                            <!-- Les champs texte avec le code "onclick" déclenchant le script -->
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-faw"></i></span>
                                <input type="text" class="form-control" placeholder="Date de naissance" name="naissanceUser" id="dateP">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker fa-faw"></i></span>
                                <input type="text" class="form-control" placeholder="Lieu de naissance" name="lieuNaissanceUser">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-phone fa-faw"></i></span>
                                <input type="tel" class="form-control" placeholder="Telephone" name="contactUser">
                            </div>
                            <div class="form-group input-group">
                                <select class="form-control" required name="sexeUser">
                                    <option value="X" >Sexe de l'utilisateur</option>
                                    <option value="Masculin" >Masculin</option>
                                    <option value="Feminin" >Feminin</option>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <label>Statut</label>
                                <select class="form-control" required name="statutProfil" id="statut">
                                    <option value="0">choisir</option>
                                    <?php 
                                        foreach ($statuts as $statut) 
                                        {
                                            echo '<option value="'.$statut['idStatut'].'">'.$statut['nomStatut'].'</option>';
                                        }                                                   
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Photo</label>
                                <input type="file" id="exampleInputFile" name="photoUser">
                            </div>
                            <!-- zone des ajouts-->
                                <div id="eleve">
                                    <div class="form-group input-group">
                                        <select class="form-control" required name="classeEleve">
                                            <option value="0">choisir la classe</option>
                                            <?php 
                                                foreach ($classesDpt as $classeDpt) 
                                                {
                                                    echo '<option value="'.$classeDpt['idClasse'].'">'.$classeDpt['idClasse']."".$classeDpt['libelleClasse']." ".$classeDpt['libelleDepartement'].'</option>';
                                                }                                                   
                                            ?>
                                        </select>
                                    </div>                         
                                </div>
                            
                            
                            <!-- fin zone des ajouts-->
                            <button type="submit" class="btn btn-info" name="action" value="AJOUTERajouter">Créer</button>
                        </form>
                        <!--Fin du formulaire d'inscription-->
                    </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div><!--/.row-->
