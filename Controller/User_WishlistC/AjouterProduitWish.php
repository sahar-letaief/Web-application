<?php


include ("WishlistC.php");

$email=$_GET["Email"];
$ID=$_GET["ID"];

$wishlist = new WishlistC();
$result=$wishlist->ChercherProduitWish($email,$ID);	
 //foreach($result as $row){echo $row["Email"];};


	if( $result == null)
	{
		$wishlist->AjouterProduitWish($email,$ID);
		echo "<script> 
		window.location.href='../../views/Front/wishlist.php';
		alert('Produit ajouter a votre wishlist');
		 </script>";

	}
	else{
			$wishlist->SupprimerProduitWish($email,$ID);
			echo "<script>
		 window.location.href='../../views/Front/Wishlist.php'
		 alert('Produit ete supprimer de votre wishlist');
		 </script>";
	}


  //  header('Location: http://firstpage/Projet2/shop.php');


?>