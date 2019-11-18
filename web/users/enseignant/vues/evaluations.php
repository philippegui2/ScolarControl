<div class="col-lg-12 col-md-12 col-sx-12">
    <section class="panel col-lg-4 col-md-4 col-sx-4" >                        
        <header class="panel-heading">
            Préparer une évaluation
        </header>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12 col-sx-12">
                <form action="index.php" method="POST">
                    <label>Date de l'évaluation</label>
                    <div class="form-group input-group"> 
                        <span class="input-group-addon"><i class="fa fa-calendar fa-faw"></i></span>
                        <input type="text" class="form-control" placeholder="Date de l'évaluation" name="dateEvaluation" id="dateP">
                    </div>
                    <label>Heure de début</label><br/>
                    <div class="form-group input-group"> 
                        <select style="width:75px;" required="true" name="heureEvaluation">
                            <option value=''>Heure</option>
                            <option value='orale'>8</option>
                            <option value='ecrite'>9</option>
                            <option value='qcm'>10</option>
                            <option value='mixte'>11</option>
                            <option value='orale'>12</option>
                            <option value='ecrite'>13</option>
                            <option value='qcm'>14</option>
                            <option value='mixte'>15</option>
                            <option value='orale'>16</option>
                            <option value='ecrite'>17</option>
                            <option value='qcm'>18</option>
                            <option value='mixte'>19</option>
                            <option value='orale'>20</option>
                            <option value='ecrite'>21</option>
                        </select>
                        <select  style="width:75px;" required="true" name="minuteEvaluation">
                            <option value=''>Minute</option>
                            <option value='orale'>00</option>
                            <option value='ecrite'>10</option>
                            <option value='qcm'>20</option>
                            <option value='mixte'>30</option>
                            <option value='orale'>40</option>
                            <option value='ecrite'>50</option>
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
                    <button type="submit" class="btn btn-info"><span class="icon_check_alt"></span> Valider</button>
                </form>
            </div>
        </div>
    </section>
</div>