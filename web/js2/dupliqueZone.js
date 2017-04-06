 $(function()
 {
 		//$('#aa' + 0).hide();
		$('#aa' + 1).hide();
		$('#aa' + 2).hide();
		$('#aa' + 3).hide();
		$('#aa' + 4).hide(); 
		$('#aa' + 5).hide();
		$('#aa' + 6).hide();
		$('#aa' + 7).hide();
		$('#aa' + 8).hide();
		$('#aa' + 9).hide();
});


function duplique()
{
	//je me sert l'de la valeur de l'id de change div pour différencier les attributs name
	$(function()
	{
	    //incerentation du numero de l'id pour le nouvel element
	    var numero=parseInt($('#actuelle').val());//recuperation du nombre de medicament actuel de l'ordonnance 
	    var test=parseInt($('#nom' + numero).val());//recuperation du contenu de nom de medicament en cours pour verification de remplissage
	    if(test==0)
	    {
	    	alert("veuillez d'abord choisir un médicament");
	    }
	    else
	    {
	    	
		    numero+=1;
		    $('#aa' + numero).show();
		    
		    $('#actuelle').attr('value',numero);
	    }
	    


	});
}

function supprimer()
{
	//je me sert l'de la valeur de l'id de change div pour différencier les attributs name
	$(function()
	{
	    //incerentation du numero de l'id pour le nouvel element
	    var numero=parseInt($('#actuelle').val());
	    if(numero>0)
	    {
	    	$('#aa' + numero).hide();
	    	numero-=1;
	    	$('#actuelle').attr('value',numero);
	    }

	});
}

function liberer()//cette fonction permet de verifier qu'un médicament est choisis avant avant d'incrementer le nombre de medicament
{
	//je me sert l'de la valeur de l'id de change div pour différencier les attributs name
	$(function()
	{
	    //incrementation du numero de l'id pour le nouvel element
	    var numero=parseInt($('#actuelle').val());//recuperation du nombre de medicament actuel de l'ordonnance 
	    var test=parseInt($('#nom' + numero).val());//recuperation du contenu de nom de medicament en cours pour verification de remplissage
	    if(test==0)
	    {
	    	alert("veuillez d'abord choisir un médicament");
	    }

	});
}