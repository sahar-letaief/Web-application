

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include("HeaderClient.php");
    ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/Botanique.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2" style="color:black"><a href="Accueil.php" >Home</a></span> <span>Boutique</span></p>
            <h1 class="mb-0 bread" style="color:black">Gestion botanique</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="AfficherArticlesJardinageClient.php">Articles jardinage</a></li>
    					<li><a href="AfficherCategoriesClient.php" class="active">Categories Articles</a></li>
    				</ul>
    			</div>
    		</div>
        <div class="row">
            <?php
            include_once "../../Model/categorie.php";
            include_once "../../Controller/categorieC.php";
            include_once "../../config1.php";
            $cat=new categorieC();
                        $listecat=$cat->afficherCategories();
                        foreach ($listecat as $aux) {
            ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    	 					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $aux["NomCategorie"]; ?></a></h3>
    						<div class="d-flex">
                  <div class="idd">
		    						<p class="idd"><span><?php echo 'Description: '. $aux["Description"]; ?></span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						
    						</div>
    					</div>
    				</div>
            </div>
            <?php
                        }
            ?>
           </div> 
           </div> 
    		
    	</div>
    </section>

		<?php
    include ("footer.php");
    ?>
  </body>
</html>