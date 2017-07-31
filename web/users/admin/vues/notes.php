<?php  
    echo '<img alt="Photo utilisateur" height="135px" width="135px" src="'.$_SESSION["userEnVue"]["0"]["photo"]. '" class="img-circle" style="width:100;height:auto;"/>';
    print_r(" ".$_SESSION["userEnVue"]["0"]["prenomUser"]." ".$_SESSION["userEnVue"]["0"]["nomUser"]); 
?>
<div class="row">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><i class=""></i>Matière</th>
                    <th><i class=""></i>Coefficient</th>
                    <th><i class=""></i>Note Contrôle</th>
                    <th><i class=""></i>Note TP</th>
                    <th><i class=""></i>Note Examens</th>
                    <th><i class=""></i>moyenne</th>
                    <?php if($_SESSION["userEnVue"]["0"]["statutUser"]==3)
                         echo '<th><i class=""></i>action</th>';
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notes as $key => $note) {?>
                    <tr>
                        <td><?php echo $note["libelle"];?></td>
                        <td><?php echo $note["coefficient"];?></td>
                        <td><?php echo $note["noteControle"];?></td>
                        <td><?php echo $note["noteTP"];?></td>
                        <td><?php echo $note["noteExamen"];?></td>
                        <td><?php echo (intval($note["noteControle"])+intval($note["noteTP"])+intval($note["noteExamen"])*2)/4;?> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>   
</div><!--/.row-->

