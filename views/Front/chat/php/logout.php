<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        include_once "C:/xampp/htdocs/panier/connection.php";
        $db = conn();
        $admin = $_SESSION['incoming_id'];
        $client =  $_SESSION['outgoing_id'];

        try{
            $req = $db->prepare('SELECT * FROM users WHERE unique_id = :id OR unique_id =:idd ');
            $req->bindValue(':id', $admin );
            $req->bindValue(':idd', $client );
            $req->execute();
            $names = $req->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            $e->getMessage();
        }

        foreach($names as $name){
            if ( $name->unique_id == $client){
                $client_name = $name->fname . " " . $name->lname;
                $email = $name->email;
            }
            if ( $name->unique_id == $admin){
                $admin_name = $name->fname . " " . $name->lname;
            }

        }

        try{
            $req = $db->prepare('SELECT * FROM messages WHERE incoming_msg_id =:imi AND outgoing_msg_id =:omi OR incoming_msg_id =:imii AND outgoing_msg_id =:omii ');
            $req->bindValue(':imi', $admin );
            $req->bindValue(':omi', $client );
            $req->bindValue(':imii', $client );
            $req->bindValue(':omii', $admin );
            $req->execute();
            $messages = $req->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            $e->getMessage();
        }


        $data = '';
        $data .= "<h1> ADMIN INFO </h1>";
        $data .= '<strong> Full Name : </Strong> ' . $admin_name . '<br />';
        $data .= '<h3> CLIENT INFO </h3>';
        $data .= '<strong> Full Name : </Strong> ' . $client_name . '<br />';
        $data .= '<h2> Chat History </h2>';


        $text_final = "<html><body>";
        foreach ($messages as $message){
            if ( $message->outgoing_msg_id == $client ){
                $text_final .=  $client_name . " : " . $message->msg . " \n" .  "<br />";
                $data .=  $client_name . " : " . $message->msg . " \n" .  "<br />";
            }
            if ( $message->outgoing_msg_id == $admin ){
                $text_final .= $admin_name . " : " . $message->msg . " \n" .  "<br />";
                $data .= $admin_name . " : " . $message->msg . " \n" .  "<br />";
            }
        }
        

        unset($_SESSION['pdf']);
        $_SESSION['pdf'] .= $data;

        //echo $_SESSION['pdf'];
   


        $text_final .= "</body></html>";

        require_once('../../mailer/PHPMailerAutoLoad.php');

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true ;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'yassine.bs125@gmail.com';
        $mail->Password = 'Salwaghozzi10';
        $mail->SetFrom('no-reply@yassbass.org');
        $mail->Subject = "Your Chat history with our Website ";
        $mail->Body = $text_final;
        $mail->addAddress('yassine.bensalha@esprit.tn');
    
        $mail->send();



        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                header("location: ../../complaint.php");
            }
        }else{
            header("location: ../users.php");
        }
        header("location: ../../complaint.php");
    }else{  
        header("location: ../login.php");
    }
?>