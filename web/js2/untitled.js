function duplique()
{
	//je me sert l'de la valeur de l'id de change div pour différencier les attributs name
	$(function()
	{
	    //incerentation du numero de l'id pour le nouvel element
	    var numero=parseInt($('#actuelle').val());
	    numero+=1;
	    $('#actuelle').attr('value',numero)
	    
	    $('.changediv').append("<p>icici</p>");

	});
}


function dupliques()
{
	/*/je me sert l'de la valeur de l'id de change div pour différencier les attributs name
	$(function()
	{
	    //incerentation du numero de l'id pour le nouvel element
	    var numero=parseInt($('#actuelle').val());
	    numero+=1;
	    $('#actuelle').attr('value',numero)
	    //duplication de zone 
	    var nouveau=$('.zoneMedicament').clone();//.insertBefore($('#molo'));
	    	//changement de l'attribut id de la nouvelle zone
	    	nouveau.attr('class',\"ici\"+numero);/*
	    	nouveau.find(\"#nom0\").attr(\"name\",\"nom\"+numero);//modification name zone saisie nom medeicament
	    	nouveau.find(\"#nom0\").attr(\"id\",\"nom\"+numero);

	    	nouveau.find(\"#prise0\").attr(\"name\",\"prise\"+numero);//modification name zone saisie prise medeicament
	    	nouveau.find(\"#prise0\").attr(\"id\",\"prise\"+numero);

	    	nouveau.find(\"#moment0\").attr(\"name\",\"moment\"+numero);//modification name zone saisie moment medeicament
	    	nouveau.find(\"#moment0\").attr(\"id\",\"moment\"+numero);

	    	nouveau.find(\"#chiffre0\").attr(\"name\",\"chiffre\"+numero);//modification name zone saisie chiffre medicament
	    	nouveau.find(\"#chiffre0\").attr(\"id\",\"chiffre\"+numero);

	    	nouveau.find(\"#periode0\").attr(\"name\",\"periode\"+numero);//modification name zone saisie periode medeicament
	    	nouveau.find(\"#periode0\").attr(\"id\",\"periode\"+numero);*//*
	    	nouveau.insertAfter($('.zoneMedicament'));
	    //remise à zero du premier formuaire
	    //$('.zoneMedicament').find(':input').not(':button, :submit, :reset, :hidden') .val('')
		//	.prop('checked', false)
		//	.prop('selected', false);

		//$('.zoneMedicament').find('.selectpicker').prop('selected', false);
		//$('.zoneMedicament').find('option[selected]').removeAttr('selected');
		//$('.zoneMedicament').find('.selectpicker').val(\" \");
		//$('.zoneMedicament').find('.selectpicker').attr('selectedIndex','-1');
		//$('.zoneMedicament').find('.selectpicker').val($(this).find('option:first').val());
		//$('.zoneMedicament').find('select').val([]);
		//insertion de la nouvelle zone
    	//nouveau.insertAfter($('.zoneMedicament'));
    	//alert(\"nom\"+numero)
	    //$('#zoneMedicament:first').wrap('<a></a>');

	});*/
}
