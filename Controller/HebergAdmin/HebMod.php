<?php

require_once '../../config1.php';
require_once '../../Model/Hebergements.php';
require_once '../HebergClient/HebergC.php';
$id= $_POST['Modifier'];
$hebergC = new Hebergements();

        $Heberg = new Hebergs(

            $_POST["name"],
            $_POST["email"],
            $_POST["prix"],
            $_POST["address"],
            $_POST["description"],
            $_FILES['image']['name']
        );
        $hebergC->ModifyHeb($Heberg,$id);
        header("Location: ../../views/Back/AfficherHeb.php");


?>