<div class="row">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><i class=""></i>Matière</th>
                    <th><i class=""></i>Note cours</th>
                    <th><i class=""></i>Note TP</th>
                    <th><i class=""></i>Note Examens</th>
                    <th><i class=""></i>moyenne</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matieres as $key => $matiere) {?>
                    <tr>
                        <td><?php echo $matiere["libelleMatiere"];?></td>
                        <td>13</td>
                        <td>14</td>
                        <td>12</td>
                        <td>13</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    
    
    
    
    
</div><!--/.row-->

