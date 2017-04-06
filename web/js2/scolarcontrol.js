/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Les noms de fonctions sont composées comme suit
 * ** NOMDELAPAGEDANSLAQUELLEELLESETROUVEnomDeLaFonction **
 */

function AJOUTERajouterUtilisateur(){
    $(function() 
        {       
            var param="../index.php?consultations=0"+"&finirConsultation="+$('#finirConsultation').val();
                $.ajax({
                type: 'GET',
                url: param, timeout: 3000,
                success: function(data) 
                {
                    alert("consultation terminée");
                }, error: function() {
                alert('La requête n\'a pas abouti'); } });
        }
      );
}
