<?php

include ('../../Controller/User_WishlistC/config_google_api.php');
include ("../../Model/UserModel.php");
include ("../../Controller/User_WishlistC/UserController.php");

$password= rand(1000,5999);




if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();



//echo "password is $password"  ;
//var_dump($data);

  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
  
  $user = new Utilisateur();
  // create an instance of the controller
  
  $userC = new UtilisateurC();
  // collect value of input field
  $user->setFirstName($_SESSION['user_first_name']);
  $user->setLastName($_SESSION['user_last_name']);
  $user->setEmail($_SESSION['user_email_address']);
  $user->setPassword($password);

  $emailtest = $userC->UserSignUpRecherche($user);
  if($emailtest == null){
      $userC->AjouterUtilisateur($user);
      $userC->EnvoyerMail($_SESSION['user_email_address'],$password);
   echo "<script>
       alert('verifier votre boite mail et changer votre mtp svp ');
		 window.location.href='../../views/Front/Profil.php'
		 </script>";
  }
  else{
        echo "<script>
       alert('email deja utilise ');
		 window.location.href='../../views/Front/LoginVue.php'
		 </script>";
  }




 }
}

?>

