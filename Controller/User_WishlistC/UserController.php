<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
                require '../../config1.php' ;

class UtilisateurC 
{


      public function AjouterUtilisateur($user)
        {
                $pdo = getConnexion();


            try {
                $query = $pdo->prepare(
                    'INSERT INTO utilisateur (FirstName , LastName , Email , Password , Role)
                                 VALUES(:FirstName , :LastName , :Email , :Password , :Role ) '
                 );
                    $query->bindValue(':FirstName',$user->getFirstName());
                    $query->bindValue(':LastName' ,$user->getLastName());
                    $query->bindValue(':Email',$user->getEmail());
                    $query->bindValue(':Password',$user->getPassword());
                    $query->bindValue(':Role',2);
                    $query->execute();

                    session_start();
                    /*session is started if you don't write this line can't use $_Session  global variable*/
                    $_SESSION["user"]=$user->getEmail();
                    /*session created*/
                   // echo $_SESSION["newsession"];
                    /*session was getting*/

                    

                }
            catch (PDOExeption $e){ 
                $e->getMessage();
                unset($_SESSION["user"]);
            }

        }

        public function AfficherUtilisateur()
        {
                $pdo = getConnexion();

             try{
                 $query = $pdo->prepare('SELECT * FROM utilisateur');
                 $query->execute();

                 $result = $query->fetchALL();
             }
             catch(PDOException $e) {
                 $e->getMessage();
             }
            return $result ;
        }
        
      
        public function ModiferrUtilisateur($email , $mtp)
        {           
                //require '../../config1.php' ;
                $pdo = getConnexion();

            try{
                $query = $pdo->prepare('UPDATE utilisateur SET Password = :Password WHERE Email = :Email');
                $query->bindValue(':Password',$mtp);
                $query->bindValue(':Email',$email);
                
                $query->execute();
                
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }
            
        }
        public function DeleteUtilisateur($email)
        {              
                  $pdo = getConnexion();

            echo $email;
            try{
                $query = $pdo->prepare('DELETE FROM utilisateur WHERE Email = :Email');
                $query->bindValue(':Email',$email);
                
                $query->execute();

                session_start();
                    unset($_SESSION["user"]);

                 //header('Location: http://localhost/Projet2/');
                
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }
        }
        
        
        public function ChercherUtilisateur($user)
        {
               // require '../../config1.php' ;
                                $pdo = getConnexion();

            try{

                $query = $pdo->prepare(
                    'SELECT Email FROM utilisateur WHERE ( (Email = :Email) AND (Password = :Password) )' );
                    $query->bindValue(':Email',$user->getEmail());
                    $query->bindValue(':Password',$user->getPassword());
                    
                    $query->execute();
                    $result = $query->fetchAll();
                }
                catch (PDOExeption $e){ 
                $e->getMessage();
                
                  }
                
               /* if( isset($pass) ){
                    
                    foreach ($pass as $row) {
                        echo $row['Email']."<br />\n";   
                        session_start();
                        $_SESSION["newsession"]=$user->getEmail();
                        echo $_SESSION["newsession"];
                       // header('Location: http://firstpage/Projet/');
                    }
                }
                if ( $pass == null ){
                    session_start();
                    echo $_SESSION["newsession"];
                    
                    unset($_SESSION["newsession"]);
                    
                    
                   // header('Location: http://firstpage/Projet/');
                     }*/
                     return $result ;
                        
        }
        public function UserSignUpRecherche($user)
        {
                $pdo = getConnexion();

        try{
                $query = $pdo->prepare('SELECT Email FROM utilisateur WHERE Email = :Email');
                $query->bindValue(':Email',$user->getEmail());
                
                $query->execute(); 
                 $result = $query->fetchALL();
               
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }

            return $result ;
        
                        
                        
        }
        
          public function EnvoyerMail($email,$code)
        {
    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'apikey';// 'semah.bader@esprit.tn';                     //SMTP username
    $mail->Password   = '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';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


    //Recipients
    $mail->setFrom('semah.bader@esprit.tn', 'Naturima');
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo($email, 'Information');
    //$mail->addCC('fdfdf@gmail.com');
    //$mail->addBCC('bcfdfc@gmail.com');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '[ Mot de passe oublie ]';
    $mail->Body    = "
                 <h3>Your Code :: <h2>{$code}</h2></h3>
            Click Button Below To Set New Password		<br />		<br />
            <button class='btn btn-primary'>
             
                </button>		<br />		<br />";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients' ;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


        }




 public function DeleteUtilisateurAdmin($email)
        {              

                require '../../config1.php' ;
                $pdo = getConnexion();

            try{
                $query = $pdo->prepare('DELETE FROM utilisateur WHERE Email = :Email');
                $query->bindValue(':Email',$email);
                
                $query->execute();
                
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }
        }

        
        public function RechercheAdmin($email)
        {
                require '../../config1.php' ;
                $pdo = getConnexion();

        try{
                $query = $pdo->prepare('SELECT * FROM utilisateur WHERE Email LIKE "%:Email%" ');
                $query->bindValue(':Email',$email);
                
                $query->execute(); 
                 $result = $query->fetchALL();
               
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }

            return $result ;
        
                        
                        
        }

        
}

?>