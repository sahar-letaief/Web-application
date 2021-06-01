<?php

include ("../../Controller/User_WishlistC/WishlistC.php");
require_once '../../config1.php' ;


                //session_start();
			//	$pdo = getConnexion();

                // echo $_SESSION["newsession"];

				$wish = new WishlistC();

//$wishlist=null;
include_once 'HeaderClient.php';
if(!empty($_SESSION["user"])){

	$wishlist = $wish->AfficherProduitWishJar($_SESSION["user"]);
	$wishlist1 = $wish->AfficherProduitWishAcc($_SESSION["user"]);
	$wishlist3 = $wish->AfficherProduitWishAlim($_SESSION["user"]);

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
        integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">

  </head>


<body>

    <div class="hero-wrap hero-bread" style="background-image: url('../assets/img/2.png');background-size: contain;">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center" style="color:black">
          	<p style="color:black" class="breadcrumbs"><span class="mr-2"><a style="color:black" href="./index.php">Home</a></span> <span style="color:black" >Wishlist</span></p>
            <h1 style="color:black" class="mb-0 bread">My Wishlist</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table" id="myTable">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Product List</th>
						        <th>&nbsp;</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th> </th>
						      </tr>
						    </thead>
						    <tbody>
							<?php  
							 if(empty($_SESSION["user"])){
                    	         echo "<tr class='text-center'>" .
                                  "<td >" . "<a >" . "Connect SVP" . "</a>" . "</td>" .
                                  "</tr>";

                            }
                 
                  			  else{
									if($wishlist != null){
										foreach($wishlist as $row) {
											echo "<tr class='text-center'>" .
											"<td class='product-remove'>" . "<a href='../../Controller/User_WishlistC/DeleteProductWish.php/?Email=$_SESSION[user]&ID=$row[IdArticle]&BUY=false'><span class='ion-ios-close'></span></a>" . "</td>" .
											"<td class='image-prod'>" . "<div class='img' style='background-image:url(images/$row[ImageArticle]);'>" . "</div>" . "</td>" .
											"<td class='product-name'>" . "<h3>" . $row["NomArticle"] . "</h3>" . "<p>" . $row["DescriptionArticle"] . "</p>" . "</td>" .
											"<td class='price'>$" . $row["PrixArticle"] . "</td>" .
											"<td class='quantity'>" . "<div class='input-group mb-3'>" . "<input type='number' name='quantity' class='quantity form-control input-number' value='1' min='1' max='100' readonly>" . "</td>" .
											"</tr>";
										}
									}
									if($wishlist1 != null){
										foreach($wishlist1 as $row) {
											echo "<tr class='text-center'>" .
											"<td class='product-remove'>" . "<a href='../../Controller/User_WishlistC/DeleteProductWish.php/?Email=$_SESSION[user]&ID=$row[id]&BUY=false'><span class='ion-ios-close'></span></a>" . "</td>" .
											"<td class='image-prod'>" . "<div class='img' style='background-image:url(images/$row[image]);'>" . "</div>" . "</td>" .
											"<td class='product-name'>" . "<h3>" . $row["nom"] . "</h3>" . "<p>" . "fdfd" . "</p>"  . "</td>" .
											"<td class='price'>$" . $row["prix"] . "</td>" .
											"<td class='quantity'>" . "<div class='input-group mb-3'>" . "<input type='number' name='quantity' class='quantity form-control input-number' value='1' min='1' max='100' readonly>" . "</td>" .
											"</tr>";
										}
									}
									if($wishlist3 != null){
										foreach($wishlist3 as $row) {
											echo "<tr class='text-center'>" .
											"<td class='product-remove'>" . "<a href='../../Controller/User_WishlistC/DeleteProductWish.php/?Email=$_SESSION[user]&ID=$row[id]&BUY=false'><span class='ion-ios-close'></span></a>" . "</td>" .
											"<td class='image-prod'>" . "<div class='img' style='background-image:url(images/$row[image]);'>" . "</div>" . "</td>" .
											"<td class='product-name'>" . "<h3>" . $row["nom"] . "</h3>" . "<p>" . "fdfd" . "</p>"  . "</td>" .
											"<td class='price'>$" . $row["prix"] . "</td>" .
											"<td class='quantity'>" . "<div class='input-group mb-3'>" . "<input type='number' name='quantity' class='quantity form-control input-number' value='1' min='1' max='100' readonly>" . "</td>" .
											"</tr>";
										}
									}
									elseif($wishlist == null && $wishlist1 == null){
											echo "<tr class='text-center'>" .
                               			   "<td >" . "Wishlist est vide" . "</td>" .
                               			   "</tr>";
										}
										
									}
									echo("</tr></table>");
                				 
                 
                   ?>
						
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>

    

  <script src="./js/UserJS/Wishlist.js"></script>
  
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>

    
  </body>
  <?php
include_once 'footer.php';
?>
</html>