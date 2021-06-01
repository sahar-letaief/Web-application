<?php
//CONNECT TO DATABASE
require_once '../../config1.php';
$pdo=getConnexion ();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Animal</title>
    <link rel="stylesheet" href="Style/ModifierAnimalStyle.css">
</head>
<body>
<?php
require_once 'HeaderClient.php';
require_once 'welcome.php';
welcome("MODIFIER VOTRE ANIMAL DE COMPAGNIE", "images/modifierimage.jpg");
/*echo $_GET['id_animal'];
*/
include_once '../../Model/animal.php';
$ANIMAL = new Animal($pdo, 0, 0, "", 0, "", "", "", "", "", "");
$ANIMAL = $ANIMAL->getAnimalById($pdo, $_GET['id_animal']);
?>
    <form action="../../Controller/animal_client/CRUDanimal.php" method="POST" enctype="multipart/form-data">
        <input type="hidden"  name="location" value="ModifierAnimal">
        <input type="hidden"  name="id_animal" value="<?php echo $ANIMAL->getId(); ?>">
        <input type="hidden"  name="old_image" value="<?php echo $ANIMAL->getImage_link(); ?>">
        <table border=0 >
            <tr>
                <td colspan="2">
                    <br>
                    <select name="type" id="type-select">
                        <option value="<?php echo $ANIMAL->getType(); ?>"><?php echo $ANIMAL->getType(); ?></option>
                        <option value="chien">Chien</option>
                        <option value="chat">Chat</option>
                        <option value="hamster">Hamster</option>
                        <option value="oiseau ">Oiseau</option>
                        <option value="spider">Spider</option>
                        <option value="poisson">Poisson </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input placeholder="Nom" type="text" name="name" id="" value="<?php echo $ANIMAL->getName(); ?>" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input placeholder="Race (exemple: pitbull)" type="text" name="race" id="" value="<?php echo $ANIMAL->getRace(); ?>"  required>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input  type="date" name="birthday" id="" value="<?php echo $ANIMAL->getBirthday(); ?>" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input  type="file"  name="image_link" id="image_link" accept="image/*" />
                </td>
            </tr>

            <tr>
                <td>
                <select name="gender" id="type-select">
                        <option value="<?php echo $ANIMAL->getGender(); ?>"><?php echo $ANIMAL->getGender(); ?></option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Abandonner</span>
                    <input type="checkbox" name="for_adoption" id="ABANDONNER" value="<?php echo $ANIMAL->getFor_adoption(); ?>" <?php echo $ANIMAL->getFor_adoption(); ?>>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <textarea style="resize:none" placeholder="Details" id="" name="details" rows="4" cols="50" fixed><?php echo $ANIMAL->getDetails(); ?></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input type="submit" value="MODIFIER">
                </td>
            </tr>
        
        </table>
    </form>
    <?php include("footer.php");?>
</body>
</html>