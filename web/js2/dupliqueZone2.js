function supptou()
{
	alert
	 $(function()
	 {
	 		//$('#aa' + 0).hide();
			$('#aaa' + 1).hide();
			$('#aaa' + 2).hide();
			$('#aaa' + 3).hide();
			$('#aaa' + 4).hide(); 
			$('#aaa' + 5).hide();
			$('#aaa' + 6).hide();
			$('#aaa' + 7).hide();
			$('#aaa' + 8).hide();
			$('#aaa' + 9).hide();
	});
}
supptou();

function duplique2()
{
	//je me sert l'de la valeur de l'id de change div pour différencier les attributs name
	$(function()
	{
	    //incerentation du numero de l'id pour le nouvel element
	    var numero=parseInt($('#actuellea').val());//recuperation du nombre de medicament actuel de l'ordonnance 
	    var test=parseInt($('#nom' + numero).val());//recuperation du contenu de nom de medicament en cours pour verification de remplissage
	    if(test==0)
	    {
	    	alert("veuillez d'abord choisir un médicament");
	    }
	    else
	    {
	    	
		    numero+=1;
		    $('#aaa' + numero).show();
		    
		    $('#actuellea').attr('value',numero);
	    }
	    


	});
}

function supprimer2()
{
	//je me sert l'de la valeur de l'id de change div pour différencier les attributs name
	$(function()
	{
	    //incerentation du numero de l'id pour le nouvel element
	    var numero=parseInt($('#actuellea').val());
	    if(numero>0)
	    {
	    	$('#aaa' + numero).hide();
	    	numero-=1;
	    	$('#actuellea').attr('value',numero);
	    }

	});
}

function liberer2()//cette fonction permet de verifier qu'un médicament est choisis avant avant d'incrementer le nombre de medicament
{
	//je me sert l'de la valeur de l'id de change div pour différencier les attributs name
	$(function()
	{
	    //incrementation du numero de l'id pour le nouvel element
	    var numero=parseInt($('#actuellea').val());//recuperation du nombre de medicament actuel de l'ordonnance 
	    var test=parseInt($('#nom' + numero).val());//recuperation du contenu de nom de medicament en cours pour verification de remplissage
	    if(test==0)
	    {
	    	alert("veuillez d'abord choisir un médicament");
	    }

	});
}