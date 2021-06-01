<?php
include_once "../../Model/Hebergements.php";
include_once "../../Controller/HebergClient/HebergC.php";
require_once '../../config.php';
?>
<!DOCTYPE html>
<?php
require_once 'HeaderClient.php';
require_once 'welcome.php';
welcome("Des hebergements pour votre meilleur ami", "images/adopter.jpg");
?>
<style>
.button {
    display: block;
    width: 115px;
    height: 35px;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 10px;
    color: white;
    font-weight: bold;
    line-height: 25px;
}
</style>
<section class="ftco-section">
	<div class="container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10 mb-5 text-center">
				<a class="button" href="HebergAsc.php">Moins Chers</a>
				<br>
				<a class="button" href="HebergDesc.php">Plus Chers</a>
			</div>
		</div>
		<div class="topnav">
			<div class="search-container">
				<form action="RechercheHeb.php" method="POST">
					<input type="text" placeholder="Chercher.." name="search">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
		<div class="row">
			<?php
			$Heberg = new Hebergements();
			$list_hebergs = $Heberg->TrierAsc();
			foreach ($list_hebergs as $hebergement) : ?>

				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="images/<?php echo $hebergement['Image']?>" alt="Colorlib Template">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h2><a href="Heberg.php?var=<?php echo $hebergement['Id'] ?>"><?php echo $hebergement['Nom'] ?></a></h2>
							<h3><?php echo substr($hebergement['Description'], 0, 70);
								echo "..."; ?></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price"><span class="price-sale"><?php echo $hebergement['Prix'];
																				echo "DT" ?></span></p>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
										<a href="#" class="heart d-flex justify-content-center align-items-center ">
											<span><i class="ion-ios-heart"></i></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php endforeach; ?>
		</div>
</section>
<?php require_once 'footer.php'; ?>
</body>

</html>