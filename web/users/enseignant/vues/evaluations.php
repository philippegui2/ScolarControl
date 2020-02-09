<div class="col-lg-12 col-md-12 col-sx-12">
    <section class="panel col-lg-5 col-md-5 col-sx-5" >                        
        <header class="panel-heading">
            Préparer une évaluation en <?php echo $_REQUEST['param4'];?>
        </header>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12 col-sx-12">
                <form action="index.php" method="POST">
                    <input type="hidden" name="idCours" value="<?php echo $_REQUEST["param3"];?>"/>
                    <input type="hidden" name="param" value="<?php echo $_REQUEST["param"];?>"/>
                    <input type="hidden" name="param2" value="<?php echo $_REQUEST["param2"];?>"/>
                    <input type="hidden" name="param4" value="<?php echo $_REQUEST["param4"];?>"/>
                    <input type="hidden" name="classeEvaluation" value="<?php echo $classe['libelleClasse']." ".$classe['libelleDepartement'];?>"/>
                    <label>Date de l'évaluation</label>
                    <div class="form-group input-group"> 
                        <span class="input-group-addon"><i class="fa fa-calendar fa-faw"></i></span>
                        <input type="text" class="form-control" placeholder="Date de l'évaluation" name="dateEvaluation" id="dateP">
                    </div>
                    <label>Heure de début</label><br/>
                    <div class="form-group input-group"> 
                        <select style="width:75px;" required="true" name="heureEvaluation">
                            <option value=''>Heure</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13'>13</option>
                            <option value='14'>14</option>
                            <option value='15'>15</option>
                            <option value='16'>16</option>
                            <option value='17'>17</option>
                            <option value='18'>18</option>
                            <option value='19'>19</option>
                            <option value='20'>20</option>
                            <option value='21'>21</option>
                        </select>
                        <select  style="width:75px;" required="true" name="minuteEvaluation">
                            <option value=''>Minute</option>
                            <option value='00'>00</option>
                            <option value='10'>10</option>
                            <option value='20'>20</option>
                            <option value='30'>30</option>
                            <option value='40'>40</option>
                            <option value='50'>50</option>
                        </select>
                    </div>
                    <label>Type d'évaluation</label>
                    <div class="form-group input-group"> 
                        <select class="form-control input-sm m-bot15" name="typeEvaluation">
                            <option value=''>Choisir</option>
                            <option value='orale'>Orale</option>
                            <option value='ecrite'>Ecrite</option>
                            <option value='qcm'>QCM</option>
                            <option value='mixte'>Mixte</option>
                        </select>
                    </div>
                    <button type="submit" name="action" value="EVALUATIONvalider" class="btn btn-info"><span class="icon_check_alt"></span> Valider</button>
                </form>
            </div>
        </div>
    </section>
</div>