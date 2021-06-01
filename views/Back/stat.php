<?php
include '../../Controller/animalerieC.php';
require '../../Model/access.php';
include "../../config.php";


$error = "";
$accessC=new AccessC();
$access=$accessC->countAccess();

$alimentC=new AlimentC();
$aliment=$alimentC->countAliment();
$total=$aliment+$access;
$aliment=($aliment*100)/$total;
$access=($access*100)/$total;
//$access=6;
//$aliment=3;



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
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Repartition des produits animalerie entre accessoires & aliments"
                },
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00\"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints: [
                        {y: <?php  echo($aliment) ?>, label: "Aliments"},
                        {y: <?php  echo($access) ?>, label: "Accessoires"},
                    ]
                }]
            });
            chart.render();

        }
    </script>
    </div>
    <a href="afficher.php" class="btn btn-lg btn-info btn-block">RETOUR</a>
</main>
<script src="../assets/js/plugins/chartjs.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>