
<?php

include ("../../Model/UserModel.php");
include ("../../Controller/User_WishlistC/UserController.php");

require_once "../../config1.php";

     session_start();
     $pdo = getConnexion();

        
                            $query = $pdo->prepare(
                                'SELECT * FROM utilisateur WHERE ( Email = :Email )' , array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
                                $query->bindValue(':Email',$_SESSION["user"]);
                                
                    $query->execute();
                  //  $pass = $query->fetchAll();
					$row = $query->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
                          




?>
<?php
	function update(){				
		$userC = new UtilisateurC();

    if (isset($_POST["Password"]) ) {
    // collect value of input field
        $newpassword = $_POST['Password'];
	}
    else
        $error = "Missing information";

     $userC->ModiferrUtilisateur($_SESSION["user"],$newpassword);

	}
	function Delete(){
		
	 $userC = new UtilisateurC();
     $userC->DeleteUtilisateur($_SESSION["user"]);
     echo "<script>
     alert('Votre compte a ete supprimee');
     window.location.href='../../views/Front/Accueil.php'
     </script>";

	}

	if(isset($_POST['Delete']))
{
   Delete();
    
    //header('Location: http://localhost/Projet2/');

} 
	if(isset($_POST['submit']))
{
   update();
} 
 

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	      <link rel="stylesheet" href="./css/UserCss/profil.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
        integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">

</head>
<body>





    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="Accueil.php"> &#171; Home</a>

        </div>
    </nav>

<div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario"> 
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <strong>Information</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user "></span>    
                                FirstName                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?=$row[1] ?>     
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud"></span>  
                                Lastname                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?=$row[2] ?>  
                        </td>
                    </tr>
					<tr>        
						<td>
							<strong>
								<span class="glyphicon glyphicon-envelope"></span> 
								Email                                                
							</strong>
						</td>
						<td  class="text-primary">
							<?=$row[3] ?> 
						</td>
					</tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open"></span> 
                                Password                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            ..............         
							<a ><i class="fas fa-edit" style="cursor:pointer ;" onclick="OpenUpdateWidow()"></i></a>
                        </td>
                    </tr>                      
                </tbody>
            </table>
				<button name="Delete" class="btn btn-primary" onclick="OpenDeleteWidow()">Delete Account</button>	
            </div>
        </div>
    </div>
</div>

</div>   


<!-- Update password interface -->
  <div class="LoginForm">
        <div class="form-box">
            <a class="Loginclosebtn" style="cursor: pointer;">
                <i onclick="CloseUpdateWidow()">&times;</i>
            </a>

            <form method="post" action="" id="login" class="input-group"  >
                <input type="password" id="oldpass" class="input-field" placeholder="Mot de passe ancienne"  required onchange ="OldpassTest(x)">
               		 <i id="oldpassERR"></i>

                 <div style="display: flex;">
				         <input type="password" id="Newpass" class="input-field" placeholder="Nouveau mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required>
                         <i style="margin-top:10px;color:red;font-size:17px;font-weight:800;cursor:pointer;" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Must contain  at least one  number <br>  one uppercase and lowercase letter  at least 8 or more characters">&#63</i>

                </div>
                        <i id="NpassERR"></i>

				<input type="password" id="Conpass"  class="input-field" placeholder="Confirmer mot de passe" name="Password" required onchange ="ConfpassTest()">
               		 <i id="ConpassERR"></i>
                        

                <button id="subbtn" type="submit" class="submit-btn" onSubmit=" FormValidTest() ; CloseUpdateWidow() ;" name="submit">Save</button>
            </form>
        </div>
	</div>	

	
	

	

	
<!---------------------------------------------------------------------------------->
<!--Delete Account -->
	<div class="Delete">
		
            <a class="Loginclosebtn" style="cursor: pointer;">
                <i onclick="CloseDelteWidow()">&times;</i>
            </a>

            <form method="post" action="" id="login" class="input-group"  >
                <input type="password" id="Deleteoldpass" class="input-field" placeholder="mot de passe"  required onchange ="DeleteOldpassTest(x)">
               		 <i  id="DelteoldpassERR"></i>

                <button style="margin-top : 30px ;" id="DeleteForm" type="submit" class="btn btn-primary" onSubmit=" " name="Delete">Delete</button>
            </form>
       
	</div>





<script type="text/javascript">
		var x= <?= json_encode($row[4]) ?> ;
		console.log(x);

    </script>


</body>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="./js/UserJS/profil.js"></script>
</html>