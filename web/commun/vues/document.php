<!-- debut modal ajouter un document-->
<div class="modal fade" id="ajouterDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="controleurAdmin.php" method="post">
              <div class="modal-header">
                <button type="submit" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ajouter un document</h4>
              </div>
              <div class="modal-body">
                <!-- debut input-->

                <div class="">
                    <label for="firstname" class="control-label col-lg-2">
                      Titre
                   </label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="libelleTypeCapteur" name="libelleTypeCapteur" type="text" placeholder="Titre du document" />
                  </div>
                </div><br/><br/><br/>
                <div class="">
                    <label for="firstname" class="control-label col-lg-2">
                      Auteur
                   </label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="libelleTypeCapteur" name="libelleTypeCapteur" type="text" placeholder="auteur du document" />
                  </div>
                </div><br/><br/><br/>

                <div class="">
                    <label for="firstname" class="control-label col-lg-2">
                      Cathegorie
                   </label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="libelleTypeCapteur" name="libelleTypeCapteur" type="text" placeholder="cathegorie du document" />
                  </div>
                </div><br/><br/><br/>

                <div class="">
                    <label for="firstname" class="control-label col-lg-2">
                      Type
                   </label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="libelleTypeCapteur" name="libelleTypeCapteur" type="text" placeholder="type du document" />
                  </div>
                </div><br/><br/><br/>

                <div class="">
                    <label for="firstname" class="control-label col-lg-2">
                      Année publication
                   </label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="libelleTypeCapteur" name="libelleTypeCapteur" type="text" placeholder="année de publication" />
                  </div>
                </div><br/><br/><br/>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary" name="faire" value="chercherCapteur" name="faire">Rechercher</button>
              </div>
        </form>
        </div>
      </div>
    </div>
<!-- fin modal ajouter document-->
<!-- debut modal ajouter une cathegorie de document-->
      <div class="modal fade" id="ajouterCathegorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="controleurAdmin.php" method="post">
                <div class="modal-header">
                  <button type="submit" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Ajouter une Cathegorie de document</h4>
                </div>
                <div class="modal-body">
                  <!-- debut input-->
                  <div class="">
                      <label for="firstname" class="control-label col-lg-2">
                        <a href="#">
                          <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                     </label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="libelleTypeCapteur" name="libelleTypeCapteur" type="text" placeholder="Ajouter une cathegorie de document" />
                    </div>
                  </div><br/><br/><br/>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-primary" name="faire" value="chercherCapteur" name="faire">Ajouter</button>
                </div>
          </form>
          </div>
        </div>
      </div>
      <!-- fin modal ajouter une cathegorie de document-->
      <!-- debut modal ajouter un type de document-->
            <div class="modal fade" id="ajouterType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="controleurAdmin.php" method="post">
                      <div class="modal-header">
                        <button type="submit" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Ajouter une type de Document</h4>
                      </div>
                      <div class="modal-body">
                        <!-- debut input-->
                        <div class="">
                            <label for="firstname" class="control-label col-lg-2">
                              <a href="#">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </a>
                           </label>
                            <div class="col-lg-10">
                              <input class=" form-control" id="libelleTypeCapteur" name="libelleTypeCapteur" type="text" placeholder="Ajouter un type de document" />
                          </div>
                        </div><br/><br/><br/>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" name="faire" value="chercherCapteur" name="faire">Ajouter</button>
                      </div>
                </form>
                </div>
              </div>
            </div>
            <!-- fin modal ajouter type de document-->
<!-- debut de la partie row -1-->
<div class="row">
  <!-- debut de la partie gauche-->
<div class="col-lg-2" style="background-color:gray;height:259px;margin-left:50px;">
  <h3 style="color:black;"><strong>DECOUVREZ</br></strong></h3><h4 style="color:white;"><strong>LES NOUVEAUX LIVRES </strong></h4>
  <center><img src="../../img/licone_livre.png" alt="" style="height:70px;"></center><br/><br/>
    <nav class="" style="height:40px;width: 110px;margin-bottom:0px;background-color:black;position:0px;">
        <h4 style="color:white; margin-left:10px;"><strong>CeSoTech</strong><br/>School</h4>
    </nav>
</div>
<!-- debut de la partie gauche-->
<!-- debut de la partie carousel-->
<div class="col-md-9 col-md-offset-0" style="background-color:#082434;">
			<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel" style="margin-top:30px">

					  <div class="carousel-inner" >
					    <div class="item active" >
					      <div class="col-md-3" >
									<a href="#"><img src="../../img/valantine.jpg" class="img-responsive">
										<div class="blog-text" style="background-color:white; width:150px;">
                     <center><p style="color: black;"><strong>Lorem Ipsum</strong><br/> is simply dummy</p></center>
                  </div>
									</a>
								</div>
					    </div>
					    <div class="item">
								<div class="col-md-3 col-sm-6 col-xs-12" >
									<a href="#"><img src="../../img/arbre.jpg" class="img-responsive">
										<div class="blog-text" style="background-color:white;width:150px;">
										 <center><p style="color: black;"><strong>Lorem Ipsum</strong> <br/>is simply dummy</p></center>
									</div>
									</a>
								</div>
					    </div>
					    <div class="item">
								<div class="col-md-3 col-sm-6 col-xs-12" >
									<a href="#"><img src="../../img/vie.jpg" class="img-responsive">
										<div class="blog-text" style="background-color:white;width:150px;">
										<center><p style="color:black;"><strong>Lorem Ipsum</strong></br> is simply dummy</p></center>
									</div>
									</a>
								</div>
					    </div>
					    <div class="item">
								<div class="col-md-3 col-sm-6 col-xs-12" >
									<a href="#"><img src="../../img/vie.jpg" class="img-responsive">
										<div class="blog-text" style="background-color:white;width:150px;">
										 <center><p style="color: black;"><strong>Lorem Ipsum</strong></br> is simply dummy</p></center>
									</div>
									</a>
								</div>
					    </div>
					  </div>

			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev" >
			 <span class="icon-prev" style="color:green"></span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="icon-next fa-4x" style="color:green"></span>
			</a>
</div>
<!-- debut de la partie de la partie carousel-->
</div>

  <!-- debut de la partie row-1-->
<div class="container" style="margin-top: 50px; ">
    <div class="row" style="background-color:white">
      <!-- debut de la partie recherche-->
    <div class="col-lg-5" style="background-color:#d1b993; padding-left:10px; height:300px;margin-left:20px;">

      <a href="#">
          <img src="../../img/main-droit.png" alt="" style="height:50px;margin-left:160px;margin-top:-20px;">
          <div class="" style="height:50px;width: 150px;margin-left:250px;margin-top:-60px;background-color:#082434;border-radius:15px 0px 15px 0px" data-toggle="modal" data-target="#ajouterDocument">
                <h4 style="color:white; margin-left:10px;"><strong>Ajouter</strong><br/>un livre
                </h4>
                <a class="btn btn-success" style="margin-left:90px; margin-top:-70px;">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
          </div>
      </a>

        <h3 style="color:black;margin-top:60px;"><strong>RECHERCHER </strong>UN DOCUMENT</h3>
        <p style="color:black;font-size:20px;">retouvez tous vos documents gratuitement</p>
        <input type="text" name="" value="" placeholder="titre du document"  style="margin-left:5px;">

         <select class="selectpicker"  name="idUtilisateur" id="idUtilisateur" data-live-search="true" >
               <option value="0">Catégorie </option>
               <option value=""></option>
          </select><br/><br/>
        <center><button type="button" class="btn btn-primary btn-lg">Chercher</button></center>

    </div>
      <!-- fin de la partie recherche-->

      <!-- debut de la partie cathegories-->
      <div class="col-lg-3" style="margin-left:20px;background-color:#26c281;">
          <div class="row" style="margin:10px;">
            <span class="vertical-line"><h3>Les Catégories de Document</h3> </span>
         </div>

         <center>
            <h4 style="color:black;">cliquez pour ajouter une catégorie de document</h4>
            <img src="../../img/main-bas.png" alt="" style="height:40px;"/>
         </center>

         <center>
           <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ajouterCathegorie">Ajouter</button>
         </center>
         <a href="../admin/?road=informatique">
           <div class=" brown-bg headercat" style="">
             <header class="" style="background-color:white; border:1px; border-radius:5px;">
                   <center style="color:black;"><strong><h4>Informatique</h4></strong></center>
            </header>
                <center>  Informatique</center>
              <hr>
           </div>
         </a>

         <a href="#">
           <div class=" brown-bg headercat" style="">
             <header class="" style="background-color:white; border:1px; border-radius:5px;">
                   <center style="color:black;"><strong><h4>Electronique</h4></strong></center>
            </header>
                <center>  Electronique</center>
              <hr>
           </div>
         </a>

      </div>
      <!-- fin de la partie cathegories-->

      <!-- debut de la partie types-->
      <div class="col-lg-3" style="margin-left:20px;background-color:#e4e9eb;">
            <div class="row" style="margin:10px;">
              <span class="vertical-line"><h3>Les Types de Document </h3> </span>
           </div>
           <center>
              <h4 style="color:black;">cliquez pour ajouter un type de document</h4>
              <img src="../../img/main-bas.png" alt="" style="height:40px;"/>
           </center>
            <center>
               <a>
                  <button type="button" class="btn btn-default" style="background-color:#26c281;" data-toggle="modal" data-target="#ajouterType">Ajouter</button>
              </a>
            </center>

            <a href="#">
                <div class=" brown-bg headercat" style="">
                  <header class="" style="background-color:white; border:1px; border-radius:5px;">
                        <center style="color:black;"><strong><h4>Livre</h4></strong></center>
                 </header>
                     <center>  Les livres </center>
                   <hr>
                </div>
            </a>

           <a href="#">
             <div class=" brown-bg headercat" style="">
                 <header class="" style="background-color:white; border:1px; border-radius:5px;">
                   <center style="color:black;"><strong><h4>Article</h4></strong></center>
                </header>
                    <center>  Article</center>
                  <hr>
             </div>
           </a>
      </div>
      <!-- fin de la partie types-->
    </div>

	</div>
  	<!-- fin de la partie row -2-->
