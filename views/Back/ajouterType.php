<?PHP
include "../../Model/type.php";
include "../../Controller/animalerieC.php";
include "../../config.php";


$type1=new type($_GET['id_type'],$_GET['type']);
$type1C=new TypeC();
$type1C->ajouterType($type1);
header('Location: afficher.php');
?>