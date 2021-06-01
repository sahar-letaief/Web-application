<?php
include '../../Controller/animalerieC.php';
require '../../Model/access.php';
include "../../config.php";

$error = "";
$accessC=new AccessC();
$list1=$accessC->afficherAccessoire();
$alimentC=new AlimentC();
$list2=$alimentC->afficherAliment();




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
                    title: {
                        text: "Quantité dispo par produit animalerie"
                    },
                    axisX: {
                        title: "ID produit"
                    },
                    axisY: {
                        title: "QTE disponible en stock"
                    },
                    legend: {
                        cursor: "pointer",
                        itemclick: toggleDataSeries
                    },
                    data: [{
                        type: "scatter",
                        name: "Accessoires",
                        showInLegend: true,
                        toolTipContent: "<span style=\"color:#4F81BC \">{name}</span><br>ID access: {x}<br>QTE dispo: {y}",
                        dataPoints: [
                            <?php foreach ($list1 as $row){
                            ?>
                            { x: <?php  echo $row['id'] ?>, y: <?php  echo $row['qte']?> },
                            <?php
                            }
                            ?>
                        ]
                    },
                        {
                            type: "scatter",
                            name: "Aliments",
                            showInLegend: true,
                            markerType: "triangle",
                            toolTipContent: "<span style=\"color:#c70505 \">{name}</span><br>ID aliment: {x}<br>QTE dispo: {y}",
                            dataPoints: [
                                <?php foreach ($list2 as $row){
                                ?>
                                { x: <?php  echo $row['id'] ?>, y: <?php  echo $row['qte']?> },
                                <?php
                                }
                                ?>

                            ]
                        }]
                });
                chart.render();

                function toggleDataSeries(e) {
                    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    } else {
                        e.dataSeries.visible = true;
                    }
                    e.chart.render();
                }

            }
        </script>
    </div>
    <a href="afficher.php" class="btn btn-lg btn-info btn-block">RETOUR</a>
</main>

<script src="../assets/js/plugins/chartjs.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>