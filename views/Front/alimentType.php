<?php
include '../../Controller/animalerieC.php';
include "../../config.php";
$typeC= new typeC();
$types= $typeC->afficherType();
if(isset($_POST['type']) && isset($_POST['filtrer'])){
    $list = $typeC->filtreAliment($_POST['type']);
}
include_once 'HeaderClient.php';
?>
<!DOCTYPE html>
<html lang="en">
<div class="hero-wrap hero-bread" style="background-image: url('images/backG.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil</a></span> <span>Boutique</span></p>
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
                    <li><a class="active" href="afficherAlimentCL.php">Aliments </a></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category"
                <li><a href="afficherAlimentCL.php">les plus recents</a></li>
                <li><a href="moinsCherAliment.php">les moins chers</a></li>
                <li><a class="active">Filtre</a></li>
                </ul>
            </div>

        </div>

        <div class="form-container">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label> Choissir le type  </label>
                    </div>
                    <div class="col-75">
                        <select name="type" id="type">
                            <?php
                            foreach ($types as $type){
                                ?>
                                <option
                                    value="<?=$type['id_type'] ?>"
                                    <?php
                                    if (isset($_POST['search']) && ($type['id_type'] ==$_POST['type'])){
                                        ?>
                                        selected
                                    <?php } ?>
                                >
                                    <?= $type['type'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <input type="submit" value="filtrer" name="filtrer">
                    </div>
                </div>
            </form>
        </div>
        <?php if(isset($_POST['filtrer'])){ ?>
            <div class="row">

                <?php
                foreach ($list as $item ){ ?>

                    <div class="col-md-6 col-lg-3 ftco-animate" style="display: inline;">
                        <div class="product">
                            <a href="#" class="img-prod"><img class="img-fluid" style="width: 250px;height: 350px;" src="images/<?php echo $item['image']?>" alt="Colorlib Template">
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#"><?php echo $item['nom']?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span><?php echo $item['prix'].'DT'?></span></p>
                                        </div>
                                        <div class="iddd">
                                            <p class="idd"><span> pour <?php echo $item['type']?></span></p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">
                                            <a href="onealiment.php?id=<?PHP echo $item['id']; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                            <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                                <span><i class="ion-ios-heart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<?php
include_once 'footer.php'
?>
</body>
</html>