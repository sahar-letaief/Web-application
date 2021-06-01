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
                                    Modification d'un type</span>
            </h3>
        </div>


        <?PHP
        include "../../Model/type.php";
        include "../../Controller/animalerieC.php";
        include "../../config.php";
        //if (isset($_GET['id_type'])){
        $typeh=new TypeC();
        $result=$typeh->recupererType($_GET['id']);
        foreach($result as $row){
        $id_type=$row['id_type'];
        $type=$row['type'];
        ?>

        <div class="panel-body">
            <div id="sample_editable_1_wrapper" class="">

                <form method="POST" action="modifierType.php" novalidate="novalidate">
                    <table>
                        <tr class="form-group">
                            <td>Id </td>
                            <td><input class="form-control" type="number" name="id_type" value="<?PHP echo $id_type ?>"></td>
                        </tr>
                        <tr class="form-group">
                            <td>Nom</td>
                            <td><input class="form-control" type="text" name="type" value="<?PHP echo $type ?>"></td>
                        </tr>
                    </table>
                    <input type="submit" name="modifier" value="modifier" class="btn btn-lg btn-info btn-block">

                    <tr>

                        <td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id_type'];?>" ></td>
                    </tr>
                </form>
                <?php
                //}
                }
                ?>
            </div>
        </div>
    </div>
</main>
</html>