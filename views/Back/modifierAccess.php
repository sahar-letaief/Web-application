<?PHP
include "../../Model/access.php";
include "../../Controller/animalerieC.php";
include "../../config.php";
$AccessC=new AccessC();
if (isset($_POST['modifier'])){

    $accessoire=new accessoire($_POST['id'],$_POST['nom'],$_POST['type'],$_POST['prix'],$_POST['image'],$_POST['vendeur'],$_POST['qte']);
    $AccessC->modifierAccess($accessoire,$_POST['id_ini']);
    echo $_POST['id_ini'];
    header('Location: afficher.php');
}else{
    echo "vérifier les champs";
}