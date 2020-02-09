<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery-2.1.4.js"></script>
		<style type="text/css">
${demo.css}
		</style>




		<script type="text/javascript">
            $(function () {
                $(document).ready(function () {
                    Highcharts.setOptions({
                        global: {
                            useUTC: false
                        }
                    });

                    <?php include("connect.php");?>
                    

                    $('#container').highcharts({
                        chart: {
                            type: 'spline',
                            animation: Highcharts.svg, // don't animate in old IE
                            marginRight: 10,
                            events: {
                                load: function () {

                                    // set up the updating of the chart each second
                                    var series = this.series[0];
                                    setInterval(function () { 
                                        $.ajax({
                                            type: 'GET',
                                            url: 'recuperation.php', timeout: 3000,
                                            success: function(data) 
                                            {
                                                var decoupe=JSON.parse(data);
                                                var x = (new Date()).getTime(),i=parseInt(decoupe[0][0])*0.2794;
                                                series.addPoint([x, i], true, true);
                                            }, error: function() {
                                            alert('il y a problème'); } });
                                    }, 5000);
                                }
                            }
                        },
                        title: {
                            text: 'Visualisation des données en temps réel'
                        },
                        xAxis: {
                            type: 'datetime',
                            tickPixelInterval: 150
                        },
                        yAxis: {
                            title: {
                                text: 'Milimètre'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            formatter: function () {
                                return '<b>' + this.series.name + '</b><br/>' +
                                    Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                                    Highcharts.numberFormat(this.y, 2);
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        exporting: {
                            enabled: false
                        },
                        series: [{
                            name: 'donnée pluvio en mm',
                            data: (function () {
                                // generate an array of random data
                                var data = [],
                                    time = (new Date()).getTime(),
                                    i;

                                for (i = -19; i <= 0; i += 1) {
                                    data.push({
                                        x: time + i * 1000,
                                        y: Math.random()
                                    });
                                }
                                return data;
                            }())
                        }]
                    });
                });
            });
		</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
