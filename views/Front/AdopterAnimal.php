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

    <title>Mes Animeau</title>
</head>
<body>
<?php
require_once 'HeaderClient.php';
require_once 'welcome.php';
welcome("Adoptez un nouvel ami ", "images/adopter.jpg");
?>
<br>
<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">
						<div class="row">
<?php
  include_once '../../Model/animal.php';

  if (isset($_POST['search']) && $_POST['search'] != "") {
    Animal::Search($pdo, $_POST['search'],2 , 1);
  }
  else
  {
    Animal::ReadAllForAdoption($pdo);
  }
  

?>
        </div>
      </div>
      <div class="col-lg-4 sidebar ftco-animate fadeInUp ftco-animated">
            <div class="sidebar-box">
              <form action="#" method="POST"  class="search-form">
                <div class="form-group">
                  <input type="submit" class="icon ion-ios-search" value="search">
                  <input type="text" name="search" class="form-control" placeholder="Search..." value="<?php   if (isset($_POST['search'])) {echo $_POST['search'];} ?>">
                </div>
              </form>
            </div>
          </div>
    </div>
  </div>
</section>
<?php require_once 'footer.php';?>
</body>
</html>