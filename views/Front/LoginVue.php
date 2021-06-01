<?php

//index.php

//Include Configuration File
include ('../../Controller/User_WishlistC/config_google_api.php');
include ("../../Model/UserModel.php");
include ("../../Controller/User_WishlistC/UserController.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="./css/UserCss/StyleLogin.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Login</title>



    <style>
    .f-80 {
    font-size: 80px
}

.form-group {
    margin-bottom: 1.25em
}

.form-material .form-control {
    display: inline-block;
    height: 43px;
    width: 100%;
    border: none;
    border-radius: 0;
    font-size: 16px;
    font-weight: 400;
    padding: 9px;
    background-color: transparent;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 1px solid #ccc
}

.btn-md {
    padding: 10px 16px;
    font-size: 15px;
    line-height: 23px
}

.btn-primary {
    background-color: #4099ff;
    border-color: #4099ff;
    color: #fff;
    cursor: pointer;
    -webkit-transition: all ease-in .3s;
    transition: all ease-in .3s
}

.btn {
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 15px;
    padding: 10px 19px;
    cursor: pointer
}

.m-b-20 {
    margin-bottom: 20px
}

.btn-md {
    padding: 10px 16px;
    font-size: 15px;
    line-height: 23px
}

.heading {
    font-size: 21px
}

#infoMessage p {
    color: red !important
}

    .btn-google {
    color: #545454;
    background-color: #ffffff;
    box-shadow: 0 1px 2px 1px #ddd
}

.or-container {
    align-items: center;
    color: #ccc;
    display: flex;
    margin: 25px 0
}

.line-separator {
    background-color: #ccc;
    flex-grow: 5;
    height: 1px
}

.or-label {
    flex-grow: 1;
    margin: 0 15px;
    text-align: center
}
    </style>
</head>
<body>
    <!--Login window

    <div class="Loginwindow">
        <button onclick=" login() ; OpenLoginForm() ">Connexion</button>
        <h4>Vous etes nouveaux ?
            <a>
                <i onclick="register() ; OpenLoginForm() ; " style="cursor: pointer;">Inscrivez-vous ici</i>
            </a>
        </h4>
    </div>

-->



    <!--Login Form-->
    <div class="LoginForm" >
        <div class="form-box" style="height:500px">
            <a href="Accueil.php" class="Loginclosebtn" style="cursor: pointer;text-decoration:none;">
                <i>&times;</i>
            </a>

            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>

            <form method="post" action="../../Controller/User_WishlistC/Login.php" id="login" class="input-group" style="top:100px;"  >
                <input type="email" class="input-field" placeholder="Your Email" name="Email" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="Password" required>
                <input type="checkbox" class="check-box" placeholder="Enter Password" required><span>Remember
                    Pass</span>
                <button style="margin-bottom:20px;" type="submit" class="submit-btn" onSubmit="LoginTest(true) ; CloseLoginForm() ;">Login</button>

                <div class="or-container">
                                <div class="line-separator"></div>
                                <div class="or-label">or</div>
                                <div class="line-separator"></div>
                </div>
                 <div class="row" style="margin-left:25px;width: 500px;">
                    <div class="col-md-12" style=""> <a style="border-radius: 30px;border:none;" href="<?=$google_client->createAuthUrl()?>" class="btn btn-lg btn-google btn-block text-uppercase btn-outline"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Se conencter avec Google</a> </div>
                </div> <br>
                
                <a href="Oublie.php" style="margin-top:60px;color:red; font-size: 15px; text-decoration:none;" >Mot depasse Oublie ? </a>
            </form>

            <form method="post" action="../../Controller/User_WishlistC/Signup.php" id="register" class="input-group" style="top:100px;"  >
                <input type="text" class="input-field" placeholder="Nom" name="Nom" required>
                <input type="text" class="input-field" placeholder="Prenom" name="Prenom" required>
                <div style="display: flex;">
                    <input type="email" class="input-field" placeholder="Email" name="Email" pattern=".+@gmail.com|.+@esprit.tn" required>
                 <i style="margin-top:10px;color:red;font-size:17px;font-weight:800;cursor:pointer;" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Exemple@gmail.com / Exemple@esprit.tn">&#63</i>

                </div>
                <div style="display: flex;">
                 <input type="password" class="input-field" placeholder="Enter Password" name="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                 <i style="margin-top:10px;color:red;font-size:17px;font-weight:800;cursor:pointer;" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Must contain  at least one  number <br>  one uppercase and lowercase letter  at least 8 or more characters">&#63</i>
               
                </div >

                <input type="checkbox" class="check-box" placeholder="Enter Password" required><span
                    style="top: 217px;">I agree to the
                    terms & conditions</span>
                    <div class="g-recaptcha" data-sitekey="6Le6eboaAAAAAHgYnCDd9qjLk6V8Ge1y2Gsxn5Fw" data-callback="onloadCallback"></div>
                <button id="subbtn"  type="submit" class="submit-btn" onSubmit="LoginTest(true);CloseLoginForm() ;" style="margin-top:10px;">Register</button>
            </form>
        </div>

    </div>
<script type="text/javascript">
document.getElementById("subbtn").disabled = true;

  var onloadCallback = function() {
    //alert("grecaptcha is ready!");
    document.getElementById("subbtn").disabled = false;

  };
</script>

  <script src="./js/UserJS/Login.js"></script>
   <script src="https://www.google.com/recaptcha/api.js"></script>

</body>
</html>
    