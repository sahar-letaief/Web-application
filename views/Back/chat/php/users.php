<?php
  require "../../../Front/panier.class.php";
  require "../../../../config1.php";
    $panier = new panier();
    $db = getConnexion();
    
    $email = $_SESSION['user'];

    try{
        $req = $db->prepare('SELECT * FROM users WHERE email =:em');
        $req->bindValue(':em', $email );
        $req->execute();
        $user = $req->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        $e->getMessage();
    }

    foreach($user as $u){
        $outgoing_id = $u->unique_id;

    }

    include_once "config.php";
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND NOT job = '2' ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>