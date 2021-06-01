<?php

include ("../../Model/UserModel.php");
include ("UserController.php");

$error = "";
// create user
$user = new Utilisateur();
// create an instance of the controller

$userC = new UtilisateurC();
    if (isset($_POST["Email"]) && isset($_POST["Password"]) ) {
    // collect value of input field
        $user->setEmail($_POST['Email']);
        $user->setPassword($_POST['Password']);
        //$user->FirstName=$_POST['Nom'];

        
    }
    else
        $error = "Missing information";

        $emailtest = $userC->UserSignUpRecherche($user);
        $passwordtest =$userC->ChercherUtilisateur($user);
        
        if($emailtest == null ){          
          echo "<script>alert('Email invalide');
          window.location.href='../../views/Front/LoginVue.php'
          </script>";
          }
          else{
               if($passwordtest == null ){          
                echo "<script>alert('Mot de passe incorrect');
                 window.location.href='../../views/Front/LoginVue.php'
                 </script>";
                }
                else{
                                    session_start();
                                    $_SESSION["user"]=$user->getEmail();

      
                          if($_SESSION["user"] == "Admin@Admin.com")
                          {
                                      header('Location: ../../views/Back/users.php');
      
                          }
                          else{
                           header('Location: ../../views/Front/Accueil.php');
      
                          }
                              echo $_SESSION["user"];
                    } 
            }




?>