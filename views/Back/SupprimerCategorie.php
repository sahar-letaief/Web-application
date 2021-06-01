<?php
include "../../Model/categorie.php";

  include_once "../../config.php";
  include_once "../../Controller/categorieC.php";
  
  $cat=new categorieC();

if(isset($_GET['IdCategorie']))
{
    $id=$_GET['IdCategorie'];
    $cat-> DeleteCategorie($id);
    echo "succeeeesssss supprimer";
   header('Location: AfficherBotaniqueAd.php');

}
header("refresh:1;url=AfficherBotaniqueAd.php");
?>