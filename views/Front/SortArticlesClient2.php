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
    					<li><a href="AfficherArticlesJardinageClient.php" class="active">Articles jardinage</a></li>
    					<li><a href="AfficherCategoriesClient.php" >Categories Articles</a></li>
    				</ul>
    			</div>
    		</div>
        <div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
          <li><a href="SortArticlesClient.php" >Moins cher</a></li>
          <li><a href="SortArticlesClient2.php"class="active" >Plus cher</a></li>
          </ul>

          </div>
          </div>
          <div class="row">

            <?php
            include_once "../../Model/articles jardinage.php";
            include_once "../../Controller/articles jardinageC.php";
            include_once "../../config.php";
            $Art=new articles_JardinageC();
                        $listecat=$Art->TriArticlesdesc();
                        foreach ($listecat as $aux) {
            ?>
    		<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
            <img class="img-fluid" style="width:300px;height:300px;" src="images/<?php echo $aux["ImageArticle"];?>" alt="non">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo "Nom article: ".$aux["NomArticle"]; ?></a></h3>
                            <div class="d-flex">
                            <div class="idd">
		    						<p class="idd"><span><?php echo 'Description: '. $aux["DescriptionArticle"]; ?></span></p>
                                    <p class="idd"><span><?php echo 'Quantité: '.$aux["QuantiteArticle"]; ?></span></p>

		    					</div>
	    					</div>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span><?php echo 'Prix: '. $aux["PrixArticle"].'DT'; ?></span></p>

		    					</div>
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

            <?php
                        }
            ?>
                			</div>
            </div>
    	
    	</div>
    </section>

	    <?php
      include("footer.php");
      ?>
  </body>
</html>