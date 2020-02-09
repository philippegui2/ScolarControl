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

function etoile(premiere,deuxieme,troisieme,quatrieme,cinquieme,sixieme,septieme) {
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
        <?php
                include("connect2.php");
                include("connect.php");
                $query = "SELECT * FROM dic_citoyen";
                $result = mysql_query($query) or die (mysql_error());
                $anneeactuelle=date("Y");
                $tranche1=0;
                $tranche2=0;
                $tranche3=0;
                $tranche4=0;
                $tranche5=0;
                $tranche6=0;
                $tranche7=0;
                $tranche8=0;
                while($ligne=mysql_fetch_row($result))
                {
                    $annee=explode("-",$ligne[3]);
                    $annee=$annee[0];
                    $difference=$anneeactuelle-$annee;
                    if($difference>=10 and $difference<=20)
                        $tranche1++;
                    if($difference>=21 and $difference<=30)
                        $tranche2++;
                    if($difference>=31 and $difference<=40)
                        $tranche3++;
                    if($difference>=41 and $difference<=50)
                        $tranche4++;
                    if($difference>=51 and $difference<=60)
                        $tranche5++;
                    if($difference>=61 and $difference<=70)
                        $tranche6++;
                    if($difference>=71 and $difference<=80)
                        $tranche7++;
                    if($difference>=81 and $difference<=90)
                        $tranche8++;
                }

        echo'<input type="submit" value="visionner" onclick="javascript:etoile('.$tranche1.','.$tranche2.','.$tranche3.','.$tranche4.','.$tranche5.','.$tranche6.','.$tranche7.');">';
        ?>

<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>
<script src="../../js/modules/exporting.js"></script>
<div id="containers" style="height: 400px"></div>
	</body>
</html>
