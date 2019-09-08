<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liste des élèves de <span class="label label-info"><?php echo $_REQUEST["param2"];?></span>
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
                                <th><i class="fa fa-gear fa-fw"></i>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($eleves as $user){?>
                                    <tr>
                                        <td><?php echo $user['prenomUser'];?></td> <td><?php echo $user['nomUser'];?></td>   <td><?php echo $user['matUser'];?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-success" href="../enseignant/index.php?road=infosEleves&param=<?php echo $user['matUser'];?>" style="color: #2b2b2b;"><i class="fa fa-eye fa-fw"></i></a>
                                            </div>
                                        </td>
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
