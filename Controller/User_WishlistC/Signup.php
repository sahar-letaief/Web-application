<?php

include ("../../Model/UserModel.php");
include ("UserController.php");

$error = "";
// create user
$user = new Utilisateur();
// create an instance of the controller

$userC = new UtilisateurC();
    if (isset($_POST["Nom"])&& isset($_POST["Prenom"]) && isset($_POST["Email"]) && isset($_POST["Password"]) ) {
        $n=$_POST["Nom"];
    
    // collect value of input field
        $user->setFirstName($_POST['Nom']);
        $user->setLastName($_POST['Prenom']);
        $user->setEmail($_POST['Email']);
        $user->setPassword($_POST['Password']);
        //$user->FirstName=$_POST['Nom'];

        $secretKey="6Le6eboaAAAAAJk7d04CjHPhHCrPOg8l7YaVfvpQ";
        $responseKey=$_POST['g-recaptcha-response'];
        $userIP=$_SERVER['REMOTE_ADDR'];

        // $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        // $response=file_get_contents($url);
        // echo $response;

  
    }
    else
        $error = "Missing information";

        $REcaptchresult = json_decode($response);
        $REcaptchresult->success = true ;
        $result = $userC->UserSignUpRecherche($user);
        if($result != null ){          
          echo "<script>alert('Email deja utilisee');
          window.location.href='../../views/Front/LoginVue.php'
          </script>";
          }
        
        if( ($result == null)&&($REcaptchresult->success === true ) ){
          $userC->AjouterUtilisateur($user);
          header('Location: ../../views/Front/Accueil.php');

        }


?>

