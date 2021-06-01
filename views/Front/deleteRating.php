<?php
include_once "../../Controller/RatingClient/RatingC.php";
$var = $_GET['var'];
 $ratingC = new Ratingc();
 $LIEN = "Heberg.php?var=$var";
     $ratingC->DeleteRating($_GET['id']);
     header("location: $LIEN");
 
?>