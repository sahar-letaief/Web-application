<?php
              require_once '../../config1.php';
              $pdo=getConnexion ();
              include_once '../../Model/Hebergements.php';
              include_once '../../Controller/HebergClient/HebergC.php';
              include_once '../../Controller/RatingClient/RatingC.php';
    $id=$_POST["id"];
    $Hebs = new Hebergements();
    $liste=$Hebs->DelHeberg($id);
    $Rats = new Ratingc();
    $liste=$Rats->Delrat($id);
    header("Location: AfficherHeb.php");
?>