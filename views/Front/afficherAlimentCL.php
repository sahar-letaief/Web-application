<?php
            include "../../Controller/animalerieC.php";
            require "../../Model/aliment.php";
include "../../config.php";
include_once 'HeaderClient.php';
?>
<!DOCTYPE html>
<html lang="en">
<div class="hero-wrap hero-bread" style="background-image: url('images/backG.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="Accueil.php">Accueil</a></span> <span>Boutique</span></p>
                <h1 class="mb-0 bread">Aliments</h1>
            </div>
        </div>
    </div>
</div>

<body>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="afficherAccessCL.php">Accessoires</a></li>
                    <li><a class="active">Aliments</a></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category"
                <li><a class="active">les plus recents</a></li>
                <li><a href="moinsCherAliment.php">les moins chers</a></li>
                <li><a href="alimentType.php">Filtre</a></li>
                </ul>
            </div>
        </div>
        <div class="row">

            <?php
            $aliment=new AlimentC();
            $liste=$aliment->afficherAliment();
            if(is_array($liste)|| is_object($liste))
            {
                foreach ($liste as $aliment) :


                    ?>

                        <div class="col-md-6 col-lg-3 ftco-animate" style="display: inline;">
                            <div class="product">
                                <a href="#" class="img-prod"><img class="img-fluid" style="width: 250px;height: 350px;" src="images/<?php echo $aliment['image']?>" alt="Colorlib Template">
                                    <div class="text py-3 pb-4 px-3 text-center">
                                        <h3><a href="#"><?php echo $aliment['nom']?></a></h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                <p class="price"><span><?php echo $aliment['prix'].'DT'?></span></p>
                                            </div>
                                            <div class="iddd">
                                                <p class="idd"><span> pour <?php echo $aliment['type']?></span></p>
                                            </div>
                                        </div>
                                        <div class="bottom-area d-flex px-3">
                                            <div class="m-auto d-flex">
                                                <a href="onealiment.php?id=<?PHP echo $aliment['id']; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                    <span><i class="ion-ios-menu"></i></span>
                                                </a>
                                                <a href="cart.php?id=<?= $aliment['id']." "."aliment"; ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                    <span><i class="ion-ios-cart"></i></span>
                                                </a>
                                                <a href="../../Controller/User_WishlistC/AjouterProduitWish.php?Email=<?=$_SESSION["user"]?>&ID=<?=$aliment["id"] ?>" class="heart d-flex justify-content-center align-items-center ">
                                                    <span><i class="ion-ios-heart"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                <?php
                endforeach ;
            }
            else echo "ERREUR";?>
        </div>
    </div>
</section>
<?php
include_once 'footer.php'
?>

</body>
</html>