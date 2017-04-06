 $(function()
 {
              $('#ajout').hide();//on cache le bouton
              /*
      			  $('#saisie1,#saisie1').mouseenter(function()
              {
                  var leFocus = '.'+$(this).attr('id');
									$(leFocus).html('<font color="red"> obligatoire</font>');
      				});*/

			 $('#saisie1,#saisie2').keydown(function()
			 {
					if ($('#saisie1').val()!="" && $('#saisie2').val()!="")
						{
							$('#ajout').show();
						}
					else
					  {
							$('#ajout').hide();
						}
			 });

			 $('#saisie1,#saisie2').mouseout(function()
			 {
					if ($('#saisie1').val()!="" && $('#saisie2').val()!="")
						{
							$('#ajout').show();
						}
					else
					  {
							$('#ajout').hide();
						}
			 });

});
