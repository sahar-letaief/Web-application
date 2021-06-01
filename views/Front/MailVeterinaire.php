<?php
      include_once '../../Model/veterinaire.php';
      include_once '../../Model/animal.php';
//CONNECT TO DATABASE
require_once '../../config1.php';
$pdo=getConnexion ();
?>
<?php



if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

if(isset($_SESSION['user']) /*&& !empty($_SESSION['user'])*/)
{
    $ConnectingMail = $_SESSION['user'];
}
elseif (isset($_GET['user'])) {
    $ConnectingMail = $_GET['user'];
}
else
{
    header('Location: LoginVue.php');
    //echo "maandekch l7a9 tkoun hne 5ater mch mkonnectyy";
    //$ConnectingMail = "bahadingsib@gmail.com";
}


if(isset($_POST['Envoyer']))
{

    $VET =    Veterinary::getVeterinaryById($pdo, $_GET['id_veterinary']);
    $ANIMAL = Animal::getAnimalById($pdo, $_POST['id_animal']);
if(mail($VET->getEmail(),'Demande de rendez-vous','un message de http://localhost/naturimal_2A3 pour vous informer que '.$ConnectingMail.' a envoyé une demande de rendez-vous pour leur animal 
    NOM:               '.$ANIMAL->getName().'
    RACE:              '.$ANIMAL->getRace().'
    sexe:              '.$ANIMAL->getGender().'
    type:              '.$ANIMAL->getType().'
    date de naissance: '.$ANIMAL->getBirthday().'
    details:           
    '.$ANIMAL->getDetails().'
    
    
    ce message est écrit de '.$ConnectingMail.': 
     '.$_POST['details'].
     'date de Rendez-Vous : '.$_POST['MeetingDate'],'From: bahadingsib@gmail.com'))
{
    header('Location: AfficherVeterinaire.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>adopter animal</title>
    <link rel="stylesheet" href="Style/AjoutAnimalStyle.css">
</head>
<body>
<?php
require_once 'HeaderClient.php';
require_once 'welcome.php';
welcome("Adoptez un nouvel ami ", "images/adopter.jpg");
?>
<br>
<form action="#" method="POST">
        <table border=0 >
        <tr>
                <td colspan="2">
                    <input  type="date" name="MeetingDate" id="" required>
                </td>
            </tr>
        <tr>
                <td colspan="2">
                    <select name="id_animal" id="type-select">
                    <?php Animal::ReadAll($pdo,4)  ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea style="resize:none" placeholder="Details" id="" name="details" rows="4" cols="50" fixed></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input type="submit" name="Envoyer" value="Envoyer">
                </td>
            </tr>
        
        </table>
    </form>


    <?php include("footer.php");?>
</body>
</html>