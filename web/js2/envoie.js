
$(function() 
  { 
    $('#action').click(
      function() 
      {
          var param ='enregistrementPriseEnCompte.php?'+'taille='+$('#taille').val()+'&poids='+$('#poids').val()+'&temperature='+$('#temperature').val()+'&pouls='+$('#pouls').val()+'&tension='+$('#tension').val();
          $.ajax({
          type: 'GET',
          url: param, timeout: 3000,
          success: function(data) 
          {
              document.location.href="choix.php"; 
          }, error: function() {
          alert('La requête n\'a pas abouti'); } });
      }
    ); 
  }
);
