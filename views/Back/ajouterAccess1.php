<!DOCTYPE html>
<html lang="en">
<?php
include_once "header_animalerie_admin.php";
?>
<main class="main-content mt-1 border-radius-lg">
    <div class="panel panel-danger table-edit">
        <div class="panel-heading">
            <h3 class="panel-title">
                                    <span>
                                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="white"></i>
                                    Ajout d'un accessoire</span>
            </h3>
        </div>
        <div class="panel-body">
            <div id="sample_editable_1_wrapper" class="">

<form action="ajouterAccess.php" method="GET" novalidate="novalidate" name="form">
    <div class="form-group">
        <label   >ID </label>
        <input type="number" class="form-control"  name="id" id="id">
    </div>

    <div class="form-group">
        <label   >Nom </label>
        <input type="text" class="form-control" name="nom" id="nom">
        <div id="nom_1" style="color : red; font-size : 12px;"></div>
    </div>
    <div class="form-group">
        <label   >Type </label>
        <input type="number" class="form-control" name="type" id="type">
        <div id="type_1" style="color : red; font-size : 12px;"></div>
    </div>
    <div class="form-group">
        <label   >Prix </label>
        <input type="number" class="form-control" name="prix" id="prix" >
        <div id="prix_1" style="color : red; font-size : 12px;"></div>
    </div>
    <div class="form-group">
        <label   >Image </label>
        <input type="text" class="form-control" name="image" id="image">
        <div id="image_1" style="color : red; font-size : 12px;"></div>
    </div>
    <div class="form-group">
        <label   >Vendeur </label>
        <input type="text" class="form-control" name="vendeur" id="vendeur">
    </div>
    <div class="form-group">
        <label   >Qte</label>
        <input type="number" class="form-control" name="qte" id="qte">
        <div id="qte_1" style="color : red; font-size : 12px;"></div>
    </div>







    <div>
        <a href="afficher.php"><input type="submit" name="ajouter" value="ajouter" onclick="return verif()" class="btn btn-lg btn-info btn-block" ></a>

    </div>
</form>
                <script src="saisie.js"></script>
            </div>
        </div>
    </div>
</main>
</html>