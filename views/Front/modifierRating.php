<?php
session_start();
include_once "../../Model/Hebergements.php";
include_once "../../Controller/HebergClient/HebergC.php";
include_once "../../Model/Rating.php";
include_once "../../Controller/RatingClient/RatingC.php";
require_once '../../config.php';
$var = $_GET['var'];
$Heberg = new Hebergements();
$list_hebergs = $Heberg->getHebergById($var);
$Ratings = new Hebergements();
$list_ratings = $Ratings->getHebergByIdRATING($var);
$ratingc = new Ratingc();
$IdRating = $_GET['id'];
if (

    isset($_POST["Stars"]) &&
    isset($_POST["comment"])
) {
    if (
        !empty($_POST["Stars"]) &&
        !empty($_POST["comment"])
    ) {
        $ratings = new Ratings(

            $_POST["Stars"],
            $_POST['comment'],
            $_SESSION["user"],
            $var
        );
        $ratingc->ModifyRating($ratings,$IdRating);
        $LIEN = "Heberg.php?var=$var";
        header("refresh:1;url=$LIEN");
    }
}

?>
<!DOCTYPE html>

<style>
    @font-face {
        font-family: 'Roboto Light';
        src: url(fonts/Roboto-Light.ttf) format('truetype');
    }

    img {

        border-radius: 10px 10px 10px 10px;

    }

    h1 {
        text-align: left;

    }

    h2 {
        font-family: 'Roboto Light';
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3);
        transition: 0.2s;
        width: 60%;
        border-radius: 30px;

    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 120, 215, 0.6);
    }

    .container {
        padding: 2px 16px;
    }
</style>
<?php
require_once 'HeaderClient.php';
require_once 'welcome.php';
welcome("Des hebergements pour votre meilleur ami", "images/adopter.jpg");
?>

<body>
    <?php
    $i = 0;
    foreach ($list_hebergs as $hebergement) :
        if ($i != 0)
            break;
        $i++; ?>
        <img src="images/<?php echo $hebergement['Image']?>" style="width:50%;">
        <?php include('phpqrcode/qrlib.php');
        $folder = "images/";
        $file_name = "qr.png";
        $file_name = $folder . $file_name;
        QRcode::png($hebergement['Email'], $file_name); ?>
        <img src="images/qr.png" width="128" height="128"></h2>
        <h1 style="color:lightseagreen;"><?php echo $hebergement['Nom'] ?></h1>
        <h4 style="text-align: left; display:flex; flex-direction: column; align-items: center"><?php echo $hebergement['Description']; ?></h4>
        <h3 style="color:Gray"><?php echo $hebergement['Adresse'] ?></h3>
        <h3 style="color:mediumseagreen"><?php echo $hebergement['Prix'];
                                            echo "DT"; ?></h3>

    <?php endforeach; ?>
    <br>
    <?php foreach ($list_ratings as $ratings) : ?>
        <?php if ($IdRating != $ratings['Id']) {
        ?>
            <div class="card" style="width:400px;">
                <div class="container">
                    <font color=#393e46>
                        <h2><?php echo $ratings['Stars'];
                            echo ' ' ?><img src="images/star.png" width="20" height="20"></h2>
                    </font>
                    <?php $RatingUsr = new Ratingc();
                    $usrrate = $RatingUsr->getUSr($ratings['User']);
                    foreach ($usrrate as $usrrt) :

                    ?>
                        <font color="Gray">
                            <h6><?php echo $usrrt['Email']; ?></h6>
                        </font>
                        <?php if ($usrrt['Email'] == $_SESSION["user"]) {
                            $IdRating = $ratings['Id'];
                            echo "<a  class='btn btn-primary' href='modifierRating.php?id=$IdRating'> Modifier </a>";
                        } ?>
                    <?php endforeach; ?>
                    <font color="Gray">
                        <h4><?php echo $ratings['Comment']; ?></h4>
                    </font>
                </div>
                <br>
            </div>
            <br>
        <?php } else { ?>

            <form method="post">
                <input type="number" id="Stars" name="Stars" min="1" max="5" value="<?php echo $ratings['Stars'] ?>">
                <div>
                    <br>
                    <textarea name="comment" id="comment" >
                    <?php echo $ratings['Comment'] ?></textarea>
                </div>
                <input type="submit" value="Submit">
            </form>
        <?php } ?>
    <?php endforeach; ?>
    <br>
    <?php require_once 'footer.php'; ?>
</body>

</html>