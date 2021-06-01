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
                                    Modification d'un aliment</span>
            </h3>
        </div>
        <div class="panel-body">
            <div id="sample_editable_1_wrapper" class="">

<?PHP
include "../../Model/aliment.php";
include "../../Controller/animalerieC.php";
include "../../config.php";
if (isset($_GET['id'])){
    $alimenth=new AlimentC();
    $result=$alimenth->recupererAliment($_GET['id']);
    foreach($result as $row){
        $id=$row['id'];
        $nom=$row['nom'];
        $type=$row['type'];
        $prix=$row['prix'];
        $image=$row['image'];
        $vendeur=$row['vendeur'];
        $qte=$row['qte'];
        ?>
        <form method="POST" action="modifierAliment.php" novalidate="novalidate">
            <table>
                <tr class="form-group">
                    <td>Id </td>
                    <td><input class="form-control" type="number" name="id" value="<?PHP echo $id ?>"></td>
                </tr>
                <tr class="form-group">
                    <td>Nom</td>
                    <td><input class="form-control" type="text" name="nom" value="<?PHP echo $nom ?>"></td>
                </tr>
                <tr class="form-group">
                    <td>type</td>
                    <td><input class="form-control" type="number" name="type" value="<?PHP echo $type ?>"></td>
                </tr>
                <tr class="form-group">
                    <td>prix</td>
                    <td><input class="form-control" type="number" name="prix" value="<?PHP echo $prix ?>"></td>
                </tr>
                <tr class="form-group">
                    <td>image </td>
                    <td><input class="form-control" type="text" name="image" value="<?PHP echo $image ?>"></td>
                </tr>
                <tr class="form-group">
                    <td>vendeur </td>
                    <td><input class="form-control" type="text" name="vendeur" value="<?PHP echo $vendeur ?>"></td>
                </tr>
                <tr class="form-group">
                    <td>Qte </td>
                    <td><input class="form-control" type="number" name="qte" value="<?PHP echo $qte ?>"></td>
                </tr>



            </table>
            <input type="submit" name="modifier" value="modifier" class="btn btn-lg btn-info btn-block">

            <tr>

                <td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
            </tr>
        </form>
        <?php
    }
}
?>
            </div>
        </div>
    </div>
</main>
</html>