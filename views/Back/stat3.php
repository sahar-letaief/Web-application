<?php
include '../../Controller/animalerieC.php';
require '../../Model/access.php';
include "../../config.php";

$error = "";
$accessC=new AccessC();
$access=$accessC->countAccess();
$query="select count(a.type) as Nombre , t.type from accessoires a join type t where a.type=t.id_type GROUP by a.type";
$db= config::getConnexion();
$list =  $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once "header_animalerie_admin.php";
?>


<main class="main-content mt-1 border-radius-lg">
    <a href="stat.php" class="btn btn-lg btn-info btn-block">repartition produits</a>
    <a href="stat2.php" class="btn btn-lg btn-info btn-block">repartition aliments</a>
    <a href="stat3.php" class="btn btn-lg btn-info btn-block">repartition accessoires</a>
    <a href="stat5.php" class="btn btn-lg btn-info btn-block">QTE par produit</a>
    <a href="stat4.php" class="btn btn-lg btn-info btn-block">+</a>
    </head>
    <body>
    <div>
        <div id="chartContainer" style="height: 600px; width: 98%;"></div>
        <script>
            window.onload = function () {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title:{
                        text: "Repartition des Accessoires selon type d'animaux"
                    },
                    data: [{
                        type: "funnel",
                        indexLabel: "{label}  {y}",
                        toolTipContent: "<b>{label}</b>: {y} <b>({percentage}%)</b>",
                        neckWidth: 2,
                        neckHeight: 0,
                        valueRepresents: "area",
                        dataPoints: [
                            <?php foreach ($list as $row){
                            ?>
                            {y: <?php  echo ($row['Nombre']*100)/$access ?>, label: "<?php  echo $row['type'] ?> "},
                            <?php
                            }
                            ?>
                        ]
                    }]
                });
                calculatePercentage();
                chart.render();

                function calculatePercentage() {
                    var dataPoint = chart.options.data[0].dataPoints;
                    var total = dataPoint[0].y;
                    for(var i = 0; i < dataPoint.length; i++) {
                        if(i == 0) {
                            chart.options.data[0].dataPoints[i].percentage = 100;
                        } else {
                            chart.options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total) * 100).toFixed(2);
                        }
                    }
                }

            }
        </script>
    </div>
    <a href="afficher.php" class="btn btn-lg btn-info btn-block">RETOUR</a>
</main>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>
</body>
</html>