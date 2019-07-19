<!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
  </body>
</html>
<!-- javascripts -->
    <script src="../../js/jquery.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="../../js/html5shiv.js"></script>
      <script src="../../js/respond.min.js"></script>
      <script src="../../js/lte-ie7.js"></script>
    <![endif]-->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../../js/jquery.scrollTo.min.js"></script>
    <script src="../../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="../../js/scripts.js"></script>
    <script src="../../js2/JQUI/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../js2/datePicker.js"></script>
    <script type="text/javascript" src="../../js2/scolarcontrol.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#dateP').datepicker({
                format: "dd/mm/yyyy",
            });  

        });
        
        function transfertInfo(valeur){//Page LISTER Récupération des informations de l'utilisateur cliqué pour suppression
            var valeur=valeur.split('*');
            $(function(){  
                $("#noui").html(valeur[1]+" "+valeur[2]);
                $("#nouiID").attr("value",valeur[0]);
            });
        }
        
        $(function(){
            //prise en compte dans la page matiere
            $(".MATIEREdoou").hide();
            //Fin prise en compte dans la page matiere
            //zone d'initialisation
                $("#eleve").hide();
            //fin zone d'initialisation
            $("#statut").click(function(){
                if($("#statut").prop('selected',true).val()==2){
                    $("#eleve").show();
                }else{
                    $("#eleve").hide();
                }
                    
            }
            );  
	});
        
        function MATIEREApparution(id){
            $(function(){
                if($("."+id).prop('checked'))
                    $("#coef"+id).show();
                else
                    $("#coef"+id).hide();
            });
        }
        
        function ENSEIGNANTMATIEREaffTableau(idPub){//Page enseignantMatiere, affichage du tableau de correspondance enseignant et matières
        $("#loading-div").show();
        $("#ensEnVue").attr('value',idPub);
            $(function(){  
                    var param="../admin/index.php?reqajax=ENSEIGNANTMATIEREensmatiere&parametre="+idPub;
                    $.ajax({
                        type: 'GET',
                        url: param, 
                        timeout: 5000,
                        cache: true,
                        success: function(data){
                            var data2=JSON.parse(data);
                            $("input").prop('checked', false);//décocher tout au départ
                            var data_length = data2.length;
                            $('#corpsEnseignantMatiere tr input').each(function(index){
                                for (var i = 0; i < data_length; i++) {
                                    if(data2[i].idMatiere === $(this).attr("identifiant")){
                                        $(this).prop('checked', true);
                                    }
                                }
                            });
                        }, 
                        error: function() {
                            alert('Erreur de connexion'); 
                        } 
                    });
                }
            );
        }
        
        function ENSEIGNANTMATIEREenvoieEnsMat(){
            $(function(){
                var checkbox_val = [$("#ensEnVue").val()];
                $('#corpsEnseignantMatiere tr input:checked').each(function(index){
                    checkbox_val.push(this.value);
                });
                var param="../admin/index.php?reqajax=ENSEIGNANTMATIEREenvoiematiere&parametre="+JSON.stringify(checkbox_val);
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
        
        function USERCHEFSCLASSEenvoyer(option){
            $(function(){
                if(option=="email"){
                    var param="../admin/index.php?reqajax=USERCHEFSCLASSEenvoyerEmail&parametre="+$('#message').val();
                }else if(option=="sms"){
                    var param="../admin/index.php?reqajax=USERCHEFSCLASSEenvoyerSMS&parametre="+$('#message').val();
                }else if(option=="notif"){
                    var param="../admin/index.php?reqajax=USERCHEFSCLASSEenvoyerNotif&parametre="+$('#message').val();
                }
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        alert(data);
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
    </script>