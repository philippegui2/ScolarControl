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
    
    <?php if($_REQUEST["road"]=="agenda"){?>
        <script src="../../js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
        <script src="../../assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <!--script for this page only-->
        
        
        <script>    
            var Script = function () {
                /* initialize the external events
                 -----------------------------------------------------------------*/
                $('#external-events div.external-event').each(function(){
                    alert("ici");
                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    };

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject);

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 999,
                        revert: true,      // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });

                });

                /* initialize the calendar
                 -----------------------------------------------------------------*/

                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay){
                        var title = prompt('Nom du nouvel élément');
                        if (title) {
                            var laDate=(start).toISOString().substring(0, 10);
                            var param ='../admin/index.php?reqajax=AGENDAsetRendezvous&titre='+title+'&laDate='+laDate;
                            $.ajax({
                            type: 'GET',
                            url: param, 
                            timeout: 3000,
                            success: function(data){
                              document.location.href="?road=agenda";
                            }, error: function() {
                            alert('La requête n\'a pas abouti'); } });
                        }
                    },
                    <?php 
                        if($_SESSION['user']["statutUser"]=="1"){
                            echo "editable: true,";
                        } else{
                            echo "editable: false,";
                        }
                     ?>
                    
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function(date, allDay){ // this function is called when something is dropped   
                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject');

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')){
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }
                    },
                    
                    eventClick: function(event, delta){
                        var title = prompt("Entrer le nouveau nom pour modifier");

                    },
                    
                    eventDrop: function(event, delta){
                        alert(event.title + ' a bougé de ' + delta + ' jours\n');
                        if((event.end - event.start)<=0){
                            var laDateDebut=(event.start).toISOString().substring(0, 10);
                            var param ='../admin/index.php?reqajax=AGENDAupdateRendezvous&id='+event.id+'&laDateDebut='+laDateDebut+'&laDateFin='+laDateDebut;
                        }else{
                            var laDateDebut=(event.start).toISOString().substring(0, 10);
                            var laDateFin=(event.end).toISOString().substring(0, 10);
                            var param ='../admin/index.php?reqajax=AGENDAupdateRendezvous&id='+event.id+'&laDateDebut='+laDateDebut+'&laDateFin='+laDateFin;
                        }
                        $.ajax({
                            type: 'GET',
                            url: param, 
                            timeout: 3000,
                            success: function(data){
                              //document.location.href="?road=agenda";
                            }, error: function() {
                                alert('La requête n\'a pas abouti'); 
                            } 
                        });
                    },
                            
                    eventResize: function(event, delta) {

                        if((event.end - event.start)<=0){
                            var laDateDebut=(event.start).toISOString().substring(0, 10);
                            var param ='../admin/index.php?reqajax=AGENDAupdateRendezvous&id='+event.id+'&laDateDebut='+laDateDebut+'&laDateFin='+laDateDebut;
                        }else{
                            var laDateDebut=(event.start).toISOString().substring(0, 10);
                            var laDateFin=(event.end).toISOString().substring(0, 10);
                            var param ='../admin/index.php?reqajax=AGENDAupdateRendezvous&id='+event.id+'&laDateDebut='+laDateDebut+'&laDateFin='+laDateFin;
                        }
                        $.ajax({
                            type: 'GET',
                            url: param, 
                            timeout: 3000,
                            success: function(data){
                              //document.location.href="?road=agenda";
                            }, error: function() {
                                alert('La requête n\'a pas abouti'); 
                            } 
                        });
                    },      
                            
                    events: "../admin/index.php?reqajax=AGENDAgetRendezvous",
                    
                    loading: function(bool) {
                        if (bool) $('#loading').show();
                        else $('#loading').hide();
                    }
                });
            }();
            
   
        function AGENDAgetRendezvous(){//Page enseignantMatiere, affichage du tableau de correspondance enseignant et matières
            $(function(){  
                    var param="../admin/index.php?reqajax=AGENDAgetRendezvous";
                    $.ajax({
                        type: 'GET',
                        url: param, 
                        timeout: 5000,
                        cache: true,
                        success: function(data){
                            //var data2=JSON.parse(data);
                            alert(data);
                        }, 
                        error: function() {
                            alert('Erreur de connexion'); 
                        } 
                    });
                }
            );
        }
        </script>    
        
        
        
        <script src="../../js/jquery.rateit.min.js"></script>
    <?php }?>
    
    
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_list').DataTable();
        } );
        function disparaitAlertOK(){
            $(function(){
                $('#alertOK:even').hide(6000);
                $("#leLoading").hide();
            });
        }
        disparaitAlertOK();
         
        $(document).ready(function (){
            $('#dateP').datepicker({
                format: "dd/mm/yyyy",
            });
            $('#dateP2').datepicker({
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
<?php if($_REQUEST["road"]=="enseignantMatiere"){?>      
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
<?php }?>      
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
                            var afficheOptionSelect='<option value="0">Toutes les classes</option>';
                            $.each(data2,function(index,obj){//recupération du contenu venu de la base de données
                                afficheOptionSelect=afficheOptionSelect+`<option value="${obj.idClasse}"> ${obj.libelleClasse} </option>`;
                            }); 
                            $('#idClasse').html(afficheOptionSelect);
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

<?php if($_REQUEST["road"]=="pointage"){?>
    <script>
        function POINTAGEgestCaseAAcocher(valeur){//Page Pointage, affichage du tableau de correspondance enseignant et matières
            var valeur=valeur.split('*');
            $(function(){  
                $("#noui").html(valeur[1]+" "+valeur[2]);
                $("#nouiID").attr("value",valeur[0]);
            });
            $(function(){  
                    var param="../admin/index.php?reqajax=POINTAGEgetClassesByEnseignant&param="+valeur[0];
                    $.ajax({
                        type: 'GET',
                        url: param, 
                        timeout: 5000,
                        cache: true,
                        success: function(data){
                            var data2=JSON.parse(data);
                            var afficheOptionSelect='<option value="0">choisir la classe</option>';
                            $.each(data2,function(index,obj){//recupération du contenu venu de la base de données
                                afficheOptionSelect=afficheOptionSelect+`<option value="${obj.idClasse}"> ${obj.libClasse} ${obj.libDepartement}</option>`;
                            }); 
                            $('#corpsSelectClasse').html(afficheOptionSelect);
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