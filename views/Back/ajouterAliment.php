<?PHP
include "../../Model/aliment.php";
include "../../Controller/animalerieC.php";
include "../../config.php";

$aliment1=new aliment($_GET['id'],$_GET['nom'],$_GET['type'],$_GET['prix'],$_GET['image'],$_GET['vendeur'],$_GET['qte']);
$aliment1C=new AlimentC();
$aliment1C->ajouterAliment($aliment1);
$email='NATURIMA votre univers vert';
$nom=$_GET['nom'];
$prix=$_GET['prix'];
mail('yassine.bensalha@esprit.tn','NATURIMA: nouveau article pour vous', " On vient de publier notre nouveau article : $nom seulement à $prix DT.  Consultez le site Naturima.com pour plus de détails ! $email ! ",'From: naturima.contact@gmail.com' );
header('Location: afficher.php');