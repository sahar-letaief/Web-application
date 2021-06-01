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
    <a href="afficher.php" class="btn btn-lg btn-info btn-block">repartition aliments</a>
    <a href="afficher.php" class="btn btn-lg btn-info btn-block">repartition accessoires</a>
    <a href="stat5.php" class="btn btn-lg btn-info btn-block">QTE par produit</a>
    <a href="stat4.php" class="btn btn-lg btn-info btn-block">+</a>
    </head>
    <body>
    <div>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script>
            window.onload = function () {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    zoomEnabled: true,
                    title:{
                        text: "quantité disponible par accessoire"
                    },
                    axisX: {
                        title:"ID accessoire",
                        minimum: 0,
                        maximum: 200
                    },
                    axisY:{
                        title: "QTE disponible",
                    },
                    data: [{
                        type: "scatter",
                        toolTipContent: "<b>ID: </b>{x} <br/><b>QTE: </b>{y}",
                        dataPoints: [
                            <?php foreach ($list1 as $row){
                                                  ?>
                            { x: <?php  echo $row['id'] ?>, y: <?php  echo $row['qte']?> },
                            <?php
                            }
                            ?>
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