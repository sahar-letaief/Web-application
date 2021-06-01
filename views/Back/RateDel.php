<?php
              require_once '../../config1.php';
              $pdo=getConnexion ();
              include_once '../../Model/Rating.php';
              include_once '../../Controller/RatingClient/RatingC.php';
    $id=$_POST["id"];
    $Rats = new Ratingc();
    $liste=$Rats->Delrat($id);
    header("Location: AfficherRating.php");
?>