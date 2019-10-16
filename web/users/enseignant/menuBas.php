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
    <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
    <!-- nice scroll -->
    <script src="../../js/jquery.scrollTo.min.js"></script>
    <script src="../../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="../../js/scripts.js"></script>
    <?php if($_REQUEST['road']=="allnotes" OR $_REQUEST['road']=="notes"){ ?>
    <script type="text/javascript">
         $(document).ready( function () {
            $('#table_list').DataTable();
        } );
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
  </body>
</html>
