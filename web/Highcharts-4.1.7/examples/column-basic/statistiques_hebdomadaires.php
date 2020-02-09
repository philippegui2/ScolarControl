<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Statistique | Pluie </title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery-2.1.4.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
        function etoile(donnees,lesDates,nombre) 
        {
            
            /*
            var tabdate=lesDates.split('*');
            var tabesp=ESP.split('*');
            var tabyoff=YOFF.split('*');
            var tabdate=lTHIAROYE.split('*');*/

            $(function () {
                $('#container').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Pluies des sept derniers jours'
                    },
                    subtitle: {
                        text: 'Source: pluviomètres'
                    },
                    xAxis: {
                        categories: [
                            lesDates[6]["laDate"],
                            lesDates[5]["laDate"],
                            lesDates[4]["laDate"],
                            lesDates[3]["laDate"],
                            lesDates[2]["laDate"],
                            lesDates[1]["laDate"],
                            lesDates[0]["laDate"]
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Quantité de pluie (mm)'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'ESP',
                        data: [parseInt(donnees[6*3]["sum(basculement)"])*0.2794, parseInt(donnees[5*3]["sum(basculement)"])*0.2794, parseInt(donnees[4*3]["sum(basculement)"])*0.2794, parseInt(donnees[3*3]["sum(basculement)"])*0.2794, parseInt(donnees[2*3]["sum(basculement)"])*0.2794, parseInt(donnees[1*3]["sum(basculement)"])*0.2794, parseInt(donnees[0*3]["sum(basculement)"])*0.2794]

                    }, {
                        name: 'YOFF',
                        data: [parseInt(donnees[6*3]["sum(basculement)"])*0.2794, parseInt(donnees[5*3+1]["sum(basculement)"])*0.2794, parseInt(donnees[4*3+1]["sum(basculement)"])*0.2794, parseInt(donnees[3*3+1]["sum(basculement)"])*0.2794, parseInt(donnees[2*3+1]["sum(basculement)"])*0.2794, parseInt(donnees[1*3+1]["sum(basculement)"])*0.2794, parseInt(donnees[0*3+1]["sum(basculement)"])*0.2794]

                    }, {
                        name: 'THIAROYE',
                        data: [parseInt(donnees[6*3]["sum(basculement)"])*0.2794, parseInt(donnees[5*3+2]["sum(basculement)"])*0.2794, parseInt(donnees[4*3+2]["sum(basculement)"])*0.2794, parseInt(donnees[3*3+2]["sum(basculement)"])*0.2794, parseInt(donnees[2*3+2]["sum(basculement)"])*0.2794, parseInt(donnees[1*3+2]["sum(basculement)"])*0.2794, parseInt(donnees[0*3+2]["sum(basculement)"])*0.2794]

                    }]
                });
            });
        }
        </script>
    </head>
    <body>
        <?php include("connect.php");?>
            <?php
                    $bdd=connection();
                    $result=$bdd->prepare("select distinct laDate,idpluvio,sum(basculement) from donnees group by laDate,idpluvio order by laDate Desc");
                    $result->execute();
                    $ESP="";$YOFF="";$THIAROYE="";
                    $donnees=$result->fetchAll();

                    $result=$bdd->prepare("select distinct laDate from donnees order by laDate Desc");
                    $result->execute();
                    $lesDates=$result->fetchAll();
                    /*
                    while ($donnees=$result->fetch())
                    {
                        echo $donnees["laDate"]." ".$donnees["idpluvio"]." ".$donnees["sum(basculement)"]."</br>";
                        $lesDates=$lesDates.$donnees["laDate"]."*";//recuperation des dates
                        if($donnees["idpluvio"]== 1)
                            $ESP=$ESP.$donnees["sum(basculement)"]."*";
                        if($donnees["idpluvio"]== 2)
                            $YOFF=$YOFF.$donnees["sum(basculement)"]."*";
                        if($donnees["idpluvio"]== 3)
                            $THIAROYE=$THIAROYE.$donnees["sum(basculement)"]."*";
                    }
                    echo "ESP ".$ESP." YOFF ".$YOFF." THIAROYE ".$THIAROYE; $poli="moussa";*/
                                           //data: [donnees[6*3]["sum(basculement)"], donnees[5*3]["sum(basculement)"], donnees[4*3]["sum(basculement)"], donnees[3*3]["sum(basculement)"], donnees[2*3]["sum(basculement)"], donnees[1*3]["sum(basculement)"], donnees[0*3]["sum(basculement)"]]


                //echo'<input type="submit" value="visionner" onclick="javascript:etoile('.$donnees.');">';
            
            ?>
        <script type="text/javascript">
            etoile(<?php echo json_encode($donnees);?>,<?php echo json_encode($lesDates);?>,3);
        </script>

        <script src="../../js/highcharts.js"></script>
        <script src="../../js/modules/exporting.js"></script>

        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    </body>
</html>
