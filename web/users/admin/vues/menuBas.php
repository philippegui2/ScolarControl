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
                format: "dd/mm/yyyy"
            });  

        });
        
        function transfertInfo(valeur){
            var valeur=valeur.split('*');
            $(function(){  
                $("#noui").html(valeur[1]+" "+valeur[2]);
                $("#nouiID").attr("value",valeur[0]);
            });
        }
        
        $(function()
	{   
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
    </script>