<!DOCTYPE html>
<html lang="en">
<?php
include_once "header_animalerie_admin.php";
include "../../config.php";
?>
<main class="main-content mt-1 border-radius-lg">
    <div class="panel panel-danger table-edit">
        <div class="panel-heading">
            <h3 class="panel-title">
                                    <span>
                                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="white"></i>
                                    Ajout d'un type</span>
            </h3>
        </div>
        <div class="panel-body">
            <div id="sample_editable_1_wrapper" class="">

                <form action="ajouterType.php" method="GET" novalidate="novalidate" name="form">
                    <div class="form-group">
                        <label   >ID </label>
                        <input type="number" class="form-control"  name="id_type" id="id_type">
                    </div>

                    <div class="form-group">
                        <label   >Type </label>
                        <input type="text" class="form-control" name="type" id="type">
                        <div id="type_1" style="color : red; font-size : 12px;"></div>
                    <div>
                        <a href="afficher.php"><input type="submit" name="ajouter" value="ajouter" onclick="return verif1()"  class="btn btn-lg btn-info btn-block" ></a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="saisie.js"></script>
</html>