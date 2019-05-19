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
                  <div class="panel-content"><?php ?></div>
                </div>   
                <?php }?>
        </div>
    </section>
</div>