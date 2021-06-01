<?PHP
include "../../Model/aliment.php";
include "../../Controller/animalerieC.php";
include "../../config.php";
$AlimentC=new AlimentC();
if (isset($_POST['modifier'])){

    $aliment=new aliment($_POST['id'],$_POST['nom'],$_POST['type'],$_POST['prix'],$_POST['image'],$_POST['vendeur'],$_POST['qte']);
    $AlimentC->modifierAliment($aliment,$_POST['id_ini']);
    echo $_POST['id_ini'];
    header('Location: afficher.php');
}else{
    echo "vérifier les champs";
}