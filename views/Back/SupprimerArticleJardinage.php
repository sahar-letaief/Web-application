<?php
include "../../Model/articles jardinage.php";

  include_once "../../config.php";
  include_once "../../Controller/articles jardinageC.php";
  
  $Art=new articles_jardinageC();

if(isset($_GET['IdArticle']))
{
    $id=$_GET['IdArticle'];
    $Art-> DeleteArticle($id);
    echo "succeeeesssss supprimer";
   header('Location: AfficherBotaniqueAd.php');

}
header("refresh:1;url=AfficherBotaniqueAd.php");
?>