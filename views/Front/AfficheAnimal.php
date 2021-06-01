<?php
//CONNECT TO DATABASE
require_once '../../config1.php';
$pdo=getConnexion ();

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


if(!empty($_SESSION['user']))
{
    $ConnectingMail = $_SESSION['user'];
}
elseif (isset($_GET['user'])) {
    $ConnectingMail = $_GET['user'];
}
else
{
  echo "mn affiche ".$_SESSION['user'];
    header('Location: LoginVue.php');
    echo "maandekch l7a9 tkoun hne 5ater mch mkonnectyy";
    $ConnectingMail = "bahadingsib@gmail.com";
}
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
welcome("vos animeaux", "images/681643.jpg");
?>
<br>
<?php
include_once '../../Model/animal.php';
  $ANIMAL = new Animal($pdo, 0, 0, "", 0, "", "", "", "", "", "");
  $ANIMAL->ReadAll($pdo, 1);
  echo '<a href="AjoutAnimal.php" class="btn btn-lg btn-info btn-block">Ajouter Un Animal</a>';
  require_once 'footer.php';
?>

</body>
</html>