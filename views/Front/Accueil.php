<?php
include_once 'HeaderClient.php';
    require_once "../../config.php";
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR  . 'back' . DIRECTORY_SEPARATOR . 'compteur.php' ;
	ajouter_vue();




?>
<!DOCTYPE html>
<html>
<body>
<a class="img-prod"><img class="img-fluid" style="width: 100%;height: 100%;" src="../Back/img/logoName.png" alt="Colorlib Template"></a>
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Votre univers vert</h1>
            <p class="breadcrumbs"> <span>Boutique en ligne : animalerie & botanique</span></p>
            <p class="breadcrumbs"> <span>Service d'adoption & d'hebergement</span></p>
            <p class="breadcrumbs"> <span>Assistance médicale et rendez-vous</span></p>
        </div>
    </div>
</body>

</html>






<?php
include_once 'footer.php';
?>
