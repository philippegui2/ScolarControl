
<div class="col-lg-6">
    <section class="panel">                        
        <header class="panel-heading">
            Les matières que j'enseigne en <span class="label label-info"><?php echo $classe["libelleClasse"]." ".$classe["libelleDepartement"]; ?></span>
        </header>
        <div class="panel-body">
            <?php
                foreach ($matieres as $key => $matiere) {?>
                    <a class="btn btn-block btn-default" href="../enseignant/index.php?road=allnotes&param=<?php echo $matiere["idMatiere"];?>&param2=<?php echo $_REQUEST["param"];//param=idClasse?>">
                        <?php echo $matiere["libelleMatiere"]; ?>
                    </a>
            <?php }?>
        </div>
    </section>
</div>


