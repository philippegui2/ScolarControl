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
    <script src="../../bSelect/dist/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../../js/jquery.scrollTo.min.js"></script>
    <script src="../../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="../../js/scripts.js"></script>
    <script src="../../js2/JQUI/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../js2/datePicker.js"></script>
    <script type="text/javascript" src="../../js2/scolarcontrol.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_list').DataTable();
        } );
        function disparaitAlertOK(){
            $(function(){
                $('#alertOK:even').hide(4000);
                $("#leLoading").hide();
            });
        }
        disparaitAlertOK();
         
        $(document).ready(function (){
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
        
        function ENSEIGNANTMATIEREgestCaseAAcocher(idPub){//Page enseignantMatiere, affichage du tableau de correspondance enseignant et matières
            $("#ensEnVue").attr('value',idPub);
            $(function(){  
                    var param="../admin/index.php?reqajax=ENSEIGNANTMATIEREensmatiere2";
                    $.ajax({
                        type: 'GET',
                        url: param, 
                        timeout: 5000,
                        cache: true,
                        success: function(data){
                            var data2=JSON.parse(data);
                            $("input").prop('checked', false);//décocher tout au départ
                            $('#corpsEnseignantMatiere tr').each(function(index){//remplissage des lignes
                                var ligneTabNomPrenom=$(this).find("#nomPrenomEnseigant");
                                var ligneTabInput=$(this).find("input");
                                $.each(data2,function(index,obj){//recupération du contenu venu de la base de données
                                    if(obj.idMatiere === ligneTabInput.attr("identifiant") && obj.idClasse === ligneTabInput.attr("identclasse")){
                                      if(obj.matUser === idPub){
                                          ligneTabInput.prop('checked', true);
                                          ligneTabInput.attr('disabled', false);
                                          ligneTabNomPrenom.html(obj.prenomUser+" "+obj.nomUser);
                                      }else{
                                          ligneTabNomPrenom.html(obj.prenomUser+" "+obj.nomUser);
                                          ligneTabInput.attr('disabled', true);
                                      }
                                    }
                                });
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
                $("#leLoading").show();
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
                        document.location.reload(true);
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }    
        function USERCHEFSCLASSEenvoyer(option){
            $(function(){
                $('#message').attr('style','background: url(../../img/loading.gif) center no-repeat;z-index:-12000;');//apparution du loading
                if(option=="email"){
                    var param="../admin/index.php?reqajax=USERCHEFSCLASSEenvoyerEmail&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val();
                }else if(option=="sms"){
                    var param="../admin/index.php?reqajax=USERCHEFSCLASSEenvoyerSMS&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val();
                }else if(option=="notif"){
                    var param="../admin/index.php?reqajax=USERCHEFSCLASSEenvoyerNotif&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val();
                }
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        $('#message').attr('style','');//disparution du loading
                        $('#messageNotice').html("<center>Message envoyé</center>").css('color','red').fadeOut(5000,'swing');
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
        
        function envoyerEmail(option){
            $(function(){
                $('#message').attr('style','background: url(../../img/loading.gif) center no-repeat;z-index:-12000;');//apparution du loading
                
                var param="../admin/index.php?reqajax=envoyerEmail&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val()+"&parametre3="+option;
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        //$('#message').attr('style','');//disparution du loading
                        //$('#messageNotice').html("<center>Message envoyé</center>").css('color','red').fadeOut(2000,'swing');
                        alert(data);
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
        
        function envoyerSMS(option){
            $(function(){
                $('#message').attr('style','background: url(../../img/loading.gif) center no-repeat;z-index:-12000;');//apparution du loading
                
                var param="../admin/index.php?reqajax=envoyerSMS&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val()+"&parametre3="+option;
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        $('#message').attr('style','');//disparution du loading
                        $('#messageNotice').html("<center>Message envoyé</center>").css('color','red').fadeOut(2000,'swing');
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
        
        function envoyerNotif(option){
            $(function(){
                $('#message').attr('style','background: url(../../img/loading.gif) center no-repeat;z-index:-12000;');//apparution du loading
                
                var param="../admin/index.php?reqajax=envoyerNotif&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val()+"&parametre3="+option;
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        $('#message').attr('style','');//disparution du loading
                        $('#messageNotice').html("<center>Message envoyé</center>").css('color','red').fadeOut(2000,'swing');
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
        
        function USERCHEFSCLASSEenvoyer(option){
            $(function(){
                $('#message').attr('style','background: url(../../img/loading.gif) center no-repeat;z-index:-12000;');//apparution du loading
                if(option=="email"){
                    var param="../admin/index.php?reqajax=USERCHEFSCLASSEenvoyerEmail&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val();
                }else if(option=="sms"){
                    var param="../admin/index.php?reqajax=USERCHEFSCLASSEenvoyerSMS&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val();
                }else if(option=="notif"){
                    var param="../admin/index.php?reqajax=USERCHEFSCLASSEenvoyerNotif&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val();
                }
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        $('#message').attr('style','');//disparution du loading
                        $('#messageNotice').html("<center>Message envoyé</center>").css('color','red').fadeOut(5000,'swing');
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
        
        function envoyerEmail(option){
            $(function(){
                $('#message').attr('style','background: url(../../img/loading.gif) center no-repeat;z-index:-12000;');//apparution du loading
                
                var param="../admin/index.php?reqajax=envoyerEmail&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val()+"&parametre3="+option;
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        //$('#message').attr('style','');//disparution du loading
                        //$('#messageNotice').html("<center>Message envoyé</center>").css('color','red').fadeOut(2000,'swing');
                        alert(data);
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
        
        function envoyerSMS(option){
            $(function(){
                $('#message').attr('style','background: url(../../img/loading.gif) center no-repeat;z-index:-12000;');//apparution du loading
                
                var param="../admin/index.php?reqajax=envoyerSMS&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val()+"&parametre3="+option;
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        $('#message').attr('style','');//disparution du loading
                        $('#messageNotice').html("<center>Message envoyé</center>").css('color','red').fadeOut(2000,'swing');
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
        
        function envoyerNotif(option){
            $(function(){
                $('#message').attr('style','background: url(../../img/loading.gif) center no-repeat;z-index:-12000;');//apparution du loading
                
                var param="../admin/index.php?reqajax=envoyerNotif&parametre="+$('#message').val()+"&parametre2="+$('#objectMessage').val()+"&parametre3="+option;
                $.ajax({
                    type: 'GET',
                    url: param, 
                    timeout: 5000,
                    cache: true,
                    success: function(data){
                        $('#message').attr('style','');//disparution du loading
                        $('#messageNotice').html("<center>Message envoyé</center>").css('color','red').fadeOut(2000,'swing');
                    }, 
                    error: function() {
                        alert('Erreur de connexion'); 
                    } 
                });
                
            });
        }
    </script>
    
    
<?php if($_REQUEST["road"]=="recherchePayement"){?>
    <script type="text/javascript">
        $(function(){
            //zone d'initialisation
                $("#idClasse").hide();
                $("#labelidClasse").hide();
            //fin zone d'initialisation
            $("#idDepartement").click(function(){
                if($("#idDepartement").prop('selected',true).val()!=0){
                    RECHERCHEPAYEMENTgetClassesByDepartement($("#idDepartement").prop('selected',true).val())
                    $("#idClasse").show();
                    $("#labelidClasse").show();
                }else{
                    $("#idClasse").hide();
                    $("#labelidClasse").hide();
                }
                    
            }
            );  
	});
        
        
        
        
        
        function RECHERCHEPAYEMENTgetClassesByDepartement(idDepartement){//Page enseignantMatiere, affichage du tableau de correspondance enseignant et matières
            //$("#eleveEnVue").attr('value',idEleve);
            $(function(){
                    var param="../admin/index.php?reqajax=RECHERCHEPAYEMENTgetClassesByDepartement&param="+idDepartement;
                    $.ajax({
                        type: 'GET',
                        url: param, 
                        timeout: 5000,
                        cache: true,
                        success: function(data){
                            var data2=JSON.parse(data);
                            $.each(data2,function(index,obj){//recupération du contenu venu de la base de données
                                $('#idClasse').append(`<option value="${obj.idClasse}"> ${obj.libelleClasse} </option>'`);
                            });
                        }, 
                        error: function() {
                            alert('Erreur de connexion'); 
                        } 
                    });
                }
            );
        }
    </script>
<?php }?>
    
<?php if($_REQUEST["road"]=="userEleves"){?>
    <script type="text/javascript">
        function USERELEVESgestCaseAAcocher(idEleve){//Page enseignantMatiere, affichage du tableau de correspondance enseignant et matières
            $("#eleveEnVue").attr('value',idEleve);
            $(function(){  
                    var param="../admin/index.php?reqajax=USERELEVESchangeClasse&param="+idEleve;
                    $.ajax({
                        type: 'GET',
                        url: param, 
                        timeout: 5000,
                        cache: true,
                        success: function(data){
                            var data2=JSON.parse(data);
                            $("input").prop('checked', false);//décocher tout au départ
                            $("#input"+data2[0].id).prop('checked',true); 
                        }, 
                        error: function() {
                            alert('Erreur de connexion'); 
                        } 
                    });
                }
            );
        }
    </script>
<?php }?>

<?php if($_REQUEST["road"]=="payement" OR $_REQUEST["road"]=="infos"){?>
    <script type="text/javascript">
        function PAYEMENTgetCaseAAcocher(idEleve){//Page enseignantMatiere, affichage du tableau de correspondance enseignant et matières
            $("#eleveEnVue").attr('value',idEleve);
            $(function(){  
                    var param="../admin/index.php?reqajax=PAYEMENTgetPayement&param="+idEleve;
                    $.ajax({
                        type: 'GET',
                        url: param, 
                        timeout: 5000,
                        cache: true,
                        success: function(data){
                            var data2=JSON.parse(data);
                            $("input").prop('checked', false);//décocher tout au départ
                            $('#corpsOffres tr').each(function(index){//remplissage des lignes
                                var ligneTabDateDate=$(this).find("#datePayement");
                                    ligneTabDateDate.html("");//réinitialisation
                                var ligneTabInput=$(this).find("input");
                                    ligneTabInput.attr('disabled', false);//réinialisation
                                var lignemontantPayement=$(this).find("#montantPayement");
                                    lignemontantPayement.html("");//reinitialisation
                                $.each(data2,function(index,obj){//recupération du contenu venu de la base de données
                                    if(obj.idOffre === ligneTabInput.attr("identifiant")){
                                        ligneTabInput.prop('checked', true);
                                        ligneTabInput.attr('disabled', true);
                                        ligneTabDateDate.html(obj.datePayement);
                                        lignemontantPayement.html(obj.montantPayement);
                                        lignemontantPayement.show();
                                    }
                                });
                            });
                        }, 
                        error: function() {
                            alert('Erreur de connexion'); 
                        } 
                    });
                }
            );
        }
        
        function afficheZoneMontant(idOffre){
            if($(':checkbox[identifiant='+idOffre+']:checked').val()){
                //alert($(':checkbox[identifiant='+idOffre+']:checked').val());
                $('td[identifiant='+idOffre+']').html('<input type="text" name="montant[]"/>');
            }else 
                $('td[identifiant='+idOffre+']').html('');
        }
        //afficheZoneMontant();
    </script>
<?php }?>

<?php if($_REQUEST["road"]=="matiere"){?>
    <script type="text/javascript">
        function MATIEREgetClasseMatiere(idMatiere){//Page enseignantMatiere, affichage du tableau de correspondance enseignant et matières
            $("#matiereEnVue").attr('value',idMatiere);
            $(function(){  
                    var param="../admin/index.php?reqajax=MATIEREgetClasseMatiere&param="+idMatiere;
                    $.ajax({
                        type: 'GET',
                        url: param, 
                        timeout: 5000,
                        cache: true,
                        success: function(data){
                            var data2=JSON.parse(data);
                            
                            $("input").prop('checked', false);//décocher tout au départ
                            $('#corpsMatiereClasse tr').each(function(index){//remplissage des lignes
                                //var ligneTabNomPrenom=$(this).find("#nomPrenomEnseigant");
                                var ligneTabInput=$(this).find("input");
                                $.each(data2,function(index,obj){//recupération du contenu venu de la base de données
                                    if(obj.idClasse === ligneTabInput.attr("identifiant")){
                                        ligneTabInput.prop('checked', true);
                                        ligneTabInput.attr('disabled', false);
                                    }
                                });
                            });
                        }, 
                        error: function() {
                            alert('Erreur de connexion'); 
                        } 
                    });
                }
            );
        }
        
        function afficheZoneMontant(idOffre){
            if($(':checkbox[identifiant='+idOffre+']:checked').val()){
                //alert($(':checkbox[identifiant='+idOffre+']:checked').val());
                $('td[identifiant='+idOffre+']').html('<input type="text" name="montant[]"/>');
            }else 
                $('td[identifiant='+idOffre+']').html('');
        }
        //afficheZoneMontant();
    </script>
<?php }?>