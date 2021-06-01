<?php
    require_once "../../config1.php";
 $Login = 0 ;
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

                 if(empty($_SESSION["user"])){
                     $Login=0 ;
                 }
                    else{
                     $Login=1 ;

                 }
                
if ( !isset($_SESSION['panierjar']) && !isset($_SESSION['panieraccess']) && !isset($_SESSION['panieraliment'])){
    $tot = 0;
    $indic = 0;
}
else{
    $indic=1;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NATURIMAL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
        integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">


    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+ 216 94 212 389</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">naturimal.contact@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">Votre univers vert</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <img src="../Back/img/logo.png" style="height: 50px " alt="...">
        <a class="navbar-brand" href="Accueil.php">NATURIMAL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="Accueil.php" class="nav-link">Accueil</a></li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Boutique</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="afficherAccessCL.php">Animalerie</a>
                        <a class="dropdown-item" href="AfficherArticlesJardinageClient.php">Botanique</a>
                        <a class="dropdown-item" href="wishlist.php">wishlist</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="Hebergements.php">Hebergement</a>
                        <a class="dropdown-item" href="AdopterAnimal.php">Adoption</a>
                        <a class="dropdown-item" href="AfficherVeterinaire.php">Assistance médicale</a>
                        <a class="dropdown-item" href="AfficheAnimal.php">Mes Animeaux</a>
                    </div>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Commandes</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="purchases.php">Mes Achats</a>
                        <a class="dropdown-item" href="complaint.php">Mes Reclamation</a>
                    </div>
                </li>
                <li class="nav-item"><a href="aproposPage.php" class="nav-link">A propos</a></li>
                <li class="nav-item" id="Login"><a href="LoginVue.php" class="nav-link">Se connecter</a></li>
                <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php if ($indic ==0){echo 0;}else {echo array_sum($_SESSION['panierjar']+$_SESSION['panieraccess']+$_SESSION['panieraliment']);}?>]</a></li>

                <li class="nav-item dropdown" id="Userdropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i style="font-size: 17px ; padding-top:1px;" class="far fa-user" ></i></a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                	<a class="dropdown-item" href="Profil.php">Profil</a>
                	<a class="dropdown-item" href="../../Controller/User_WishlistC/Deconnexion.php">Decnnecter</a>

                  </div>
                </li>


            </ul>
        </div>
    </div>
</nav>


</head>

  <script src="js/UserJS/index.js"></script>
<script>
  LoginTest(<?=$Login?>)

</script>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</html>