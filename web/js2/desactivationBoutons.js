//masquage des boutons si la zone de texte est vide
            if(test<=2)
            {  
                $('#boutHospitalisation').attr("disabled","disabled");
                $('#boutPrescription').attr("disabled","disabled");
            }
            //réapparution des boutons si la zone de texte est non vide
             $('#diagEntree').keydown(function()
             {
                if ($('#diagEntree').val()!="")
                    {
                        $('#boutHospitalisation').removeAttr("disabled");
                        $('#boutPrescription').removeAttr("disabled");
                    }
             });

             $('#diagEntree').mouseout(function()
             {
                if ($('#diagEntree').val()=="")
                    {
                        $('#boutHospitalisation').attr("disabled","disabled");
                        $('#boutPrescription').attr("disabled","disabled");
                    }
             });