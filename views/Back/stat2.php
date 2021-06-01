<?php
include '../../Controller/animalerieC.php';
require '../../Model/aliment.php';
include "../../config.php";


$error = "";
$alimentC=new AlimentC();
$aliment=$alimentC->countAliment();
$query="select count(a.type) as Nombre , t.type from aliments a join type t where a.type=t.id_type GROUP by a.type";
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
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title: {
                        text: "Repartition des aliments selon type d'animaux"
                    },
                    data: [{
                        type: "doughnut",
                        startAngle: 240,
                        yValueFormatString: "##0.00\"%\"",
                        indexLabel: "{label} {y}",
                        dataPoints: [
                            <?php foreach ($list as $row){
                                ?>
                            {y: <?php  echo ($row['Nombre']*100)/$aliment ?>, label: "<?php  echo $row['type'] ?>" },
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