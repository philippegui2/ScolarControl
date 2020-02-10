<!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../bSelect/dist/js/bootstrap-select.js"></script>
    <script src="../../DataTables/datatables.min.js"></script>
    <script src="../../js2/datePicker.js"></script>
    <!-- nice scroll -->
    <script src="../../js/jquery.scrollTo.min.js"></script>
    <script src="../../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="../../js/scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#dateP').datepicker({
                format: "dd/mm/yyyy",
            });  
            $('#dateP2').datepicker({
                format: "dd/mm/yyyy",
            });
        });
        $(document).ready(function(){
            $('#table_list').DataTable();
        });
        function disparaitAlertOK(){
            $(function(){
                $('#alertOK:even').hide(6000);
                $("#leLoading").hide();
            });
        }
        disparaitAlertOK();
    </script>
    <?php if($_REQUEST['road']=="allnotes" OR $_REQUEST['road']=="notes"){ ?>
    <script type="text/javascript">
        function modifNote(idUser){ 
            $(function(){
                $("#nomPrenom").html($("#prenomUser"+idUser).html()+" "+$("#nomUser"+idUser).html());
                $("#placeNoteControle").val($("#noteControle"+idUser).html());
                $("#placeNoteTP").val($("#noteTP"+idUser).html());
                $("#placeNoteExamen").val($("#noteExamen"+idUser).html());
                $("#placeIdMatiereNotes").val($("#idMatiere"+idUser).val());
                $("#placeIdentifiant").val(idUser);
            });
        }
        function disparaitAlertOK(){
           $(function(){
               $('#alertOK:even').hide(4000);
           });
        }
        disparaitAlertOK();
    </script>
    <?php }?>
    <script type="text/javascript">
        function CAHIERTEXTEconfirmEffectue(idPartie){//Page enseignantMatiere, affichage du tableau de correspondance enseignant et matières
            //$("#partieEnVue").attr('value',idPartie); 
            alert(idPartie);
            $(function(){  
                    //var param="index.php?reqajax=CAHIERTEXTEconfirmEffectue&param="+idPartie;
                    $.ajax({
                        type: 'GET',
                        url: param, 
                        timeout: 5000,
                        cache: true,
                        success: function(data){
                            //var data2=JSON.parse(data);
                            //$("input").prop('checked', false);//décocher tout au départ
                        }, 
                        error: function(){
                            alert('Erreur de connexion'); 
                        } 
                    });
                }
            );
        }
    </script>
  </body>
</html>
