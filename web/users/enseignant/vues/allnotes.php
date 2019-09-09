<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liste des notes en <span class="label label-info"><?php echo $notes[0]["libelle"];?></span>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class=" bobo table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><i class="fa fa-user fa-fw"></i>Prénom</th>
                                <th><i class="fa fa-user fa-fw"></i>Nom</th>
                                <th><i class="fa fa-user fa-fw"></i>Matricule</th>
                                <th><i class="fa fa-file-text fa-fw"></i>Note Contrôle</th>
                                <th><i class="fa fa-file-text fa-fw"></i>Note TP</th>
                                <th><i class="fa fa-file-text fa-fw"></i>Note Examen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($notes as $note){?>
                                    <tr>
                                        <td><?php echo $note['prenomUser'];?></td> 
                                        <td><?php echo $note['nomUser'];?></td>   
                                        <td><?php echo $note['matUser'][0];?></td>
                                        <td><?php echo $note['noteControle'];?></td>
                                        <td><?php echo $note['noteTP'];?></td>
                                        <td><?php echo $note['noteExamen'];?></td>
                                    </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div><!--/.row-->
