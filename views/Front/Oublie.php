<?php

include ("../../Controller/User_WishlistC/UserController.php");

         $code = rand(1000,5999);
         $email ;

function send($code,$email) {

    
$userC = new UtilisateurC();

        

        $userC->EnvoyerMail($_POST['Email'],$code);
}


if(isset($_POST['Send'])){
       session_start();
           /* session is started if you don't write this line can't use $_Session  global variable*/
      $_SESSION["user"]=$_POST['Email'];
    send($code,$_SESSION["user"]); 
}

	function update(){				
		$userC = new UtilisateurC();

    if (isset($_POST["Password"]) ) {
    // collect value of input field
        $newpassword = $_POST['Password'];
	}
    else
        $error = "Missing information";

               session_start();

         
     $userC->ModiferrUtilisateur($_SESSION['user'],$newpassword);

	}

	if(isset($_POST['submit']))
{
   update();


 header('Location: ../../views/Front/Accueil.php');
   

} 
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	      <link rel="stylesheet" href="./css/UserCss/Oublie.css">


        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>

    <style>
  
    </style>
</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="../index.php"> &#171; Home</a>

        </div>
    </nav>

	<div class="Oublie" class="form-box" >
            <form method="post" action="" id="Oublieform" class="form-group" onSubmit="SubmitEmail()"   >
		        <h3>S'il vous plait Saisir addresse mail valide</h3>

                <input class="form-control" type="email" id="Deleteoldpass" class="input-field" placeholder="Email" name="Email"  required >
            <br>
            <a href=""><button style="margin-top : 30px ;" type="submit" class="btn btn-primary"   name="Send">send</button></a>
            </form>

    
	</div>

 	<div class="codeVerif form-group">
        		  <h3>S'il vous plait Saisir Le code </h3>

                <input style="margin-bottom : 0px;" class="form-control"  type="text" id="Code" class="input-field" placeholder="Code"  onchange="EmailSent(<?=$code?>)"   required >
            <br>
                <button style="margin-top : 60px ;" onclick="Confirm()" class="btn btn-primary"  id="codebtn" >Verifier</button>
                <i id="ERR"></i>
    	</div>


<!-- Update password interface -->
  <div class="LoginForm">
        <div class="form-box">
            <form method="post" action="" id="login" class="input-group"  >
              <div style="display: flex;">
				<input type="password" id="Newpass" class="input-field" placeholder="Nouveau mot de passe"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                 <i style="margin-top:10px;color:red;font-size:17px;font-weight:800;cursor:pointer;" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Must contain  at least one  number <br>  one uppercase and lowercase letter  at least 8 or more characters">&#63</i>
               
              </div >
                     <i id="NpassERR"></i>
				<input type="password" id="Conpass"  class="input-field" placeholder="Confirmer mot de passe" name="Password" required onchange ="formValid()">
               		 <i id="ConpassERR"></i>
                <button id="subbtn" type="submit" class="submit-btn" name="submit"><a href="http://localhost/Projet/views/Front/Accueil.php"></a>Save</button>
            </form>
        </div>
	</div>	


    <script src="./js/UserJS/Oublie.js"></script>

</body>
</html>