<?php
//CONNECT TO DATABASE
require_once '../../config1.php';
$pdo=getConnexion ();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mes Animeau</title>
</head>
<body>
<?php
require_once 'HeaderClient.php';
require_once 'welcome.php';
welcome("SUPPRIMER", "images/681643.jpg");

include_once '../../Model/animal.php';
$ANIMAL = new Animal($pdo, 0, 0, "", 0, "", "", "", "", "", "");
$ANIMAL = $ANIMAL->getAnimalById($pdo, $_GET['id_animal']);
?>
    <form action="../../Controller/animal_client/CRUDanimal.php" method="POST" enctype="multipart/form-data">
        <input type="hidden"  name="location" value="SupprimerAnimal">
        <input type="hidden"  name="id_animal" value="<?php echo $ANIMAL->getId(); ?>">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                
                            <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Supprimer <?php echo $ANIMAL->getName(); ?></h3>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="radio">
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                    <label> voulez-vous vraiment le supprimer? </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <p><input type="submit" class="btn btn-primary py-3 px-4" value="Supprimer"></p>
                                        </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
                </div>
            </div>
        </section>
</form>
<?php include("footer.php");?>
</body>
</html>