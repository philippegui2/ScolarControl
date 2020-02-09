<div class="col-lg-6">
    <section class="panel">                        
        <header class="panel-heading">
            Classes dans lesquelles j'enseigne
        </header>
        <div class="panel-body">
            <?php
                foreach ($classes as $key => $classe) {?>
            <div class="panel <?php print_r($couleur[$key]);?>">
                  <div class="panel-heading"><?php echo $classe['libClasse']." | ".$classe['libDepartement']; ?></div>
                  <div class="panel-content">
                    <div class="btn-group btn-group-justified">

                        <a class="btn btn-primary" href="../enseignant/index.php?road=listeEleves&param=<?php echo $classe['idClasse'];?>&param2=<?php echo $classe['libClasse']." | ".$classe['libDepartement']; ?>">Liste des élèves</a>


                        <a class="btn btn-success" href="../enseignant/index.php?road=listeEvaluations">Evaluation</a>
                        <a class="btn btn-info" href="../enseignant/index.php?road=matieres&param=<?php echo $classe['idClasse'];?>">Matières</a>
                    </div>
                  </div>
                </div>   
                <?php }?>
        </div>
    </section>
</div>