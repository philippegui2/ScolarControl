function compare(arg1,arg2) {
	if(arg1!=arg2)
	{
		$(function(){
			$('#sortie').html("<font color=\"red\">valeurs differentes</font>");
			$('#ajout').hide();
 		});
	}
	else
	{
		$(function(){
			$('#ajout').show();
 		});
	}
		
}

$(function()
{
	$('#ajout').hide();//on cache le bouton
	
	$('#param2').mouseout(function()
	 {
			compare($('#param1').val(),$('#param2').val());

	 });
	$('#param2').keydown(function()
	 {
			$('#sortie').html("");
	 });
});

