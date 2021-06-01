<?php


include ("WishlistC.php");

$email=$_GET["Email"];
$ID=$_GET["ID"];
$BUY=$_GET["BUY"];

            echo $email;
            echo $ID;
			////echo $BUY;
	$wishlist = new WishlistC();

	$wishlist->SupprimerProduitWish($email,$ID);
	if($BUY === "true"){
		echo "<script>
		 window.location.href='../../../views/Front/Accueil.php'
		 alert('Produit a ete ajouter au panier');
		 </script>";
	}
	else{
		echo "<script>
		 window.location.href='../../../views/Front/Wishlist.php'
		 alert('Produit ete supprimer de votre wishlist');
		 </script>";
	}

           


?>