<?php
  session_start();
  $prenom=$_SESSION['prenomUser'];
 if(!isset($_SESSION['idUser']))
  {
     echo '<meta http-equiv="Refresh" content="0;url=index.php">';
  exit();
  }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="jquery-2.1.4.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">

function etoile() {
    $('#containers').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Diagramme des ages par tranche'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['[10-20]',   premiere],
                ['21-30]',       deuxieme],
                /*{
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },*/
                ['31-40]',    troisieme],
                ['41-50]',     quatrieme],
                ['51-60]',   cinquieme],
                ['61-70]',   sixieme],
                ['71-80]',   septieme]
            ]
        }]
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
                    echo "ESP ".$ESP." YOFF ".$YOFF." THIAROYE ".$THIAROYE; $poli="Salomon";

                //echo'<input type="submit" value="visionner" onclick="javascript:etoile('.$poli.');">';
            
            

        echo'<input type="submit" value="visionner" onclick="javascript:etoile();">';
        ?>

<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>
<script src="../../js/modules/exporting.js"></script>
<div id="containers" style="height: 400px"></div>
	</body>
</html>
