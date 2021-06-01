<?php 
require "php/config.php";
  require "../../Front/panier.class.php";
    require "../../../config1.php";
    $panier = new panier();
    $db = getConnexion();
    
    $email =  $_SESSION['user'];
    echo $_SESSION['user'];
    echo " yassine";
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
    $_SESSION['unique_id'] = $outgoing_id;
    try{
      $req = $db->prepare('UPDATE users SET status =:stats WHERE unique_id =:id');
      $req->bindValue(':stats', "Active now" );
      $req->bindValue(':id', $outgoing_id );
      $req->execute();
      $user = $req->fetchAll(PDO::FETCH_OBJ);
  }catch(PDOException $e){
      $e->getMessage();
  }
  // echo $_SESSION['incoming_id'] ;
  // echo $_SESSION['outgoing_id'];
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$outgoing_id}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <!-- <img src="php/images/<?php //echo $row['img']; ?>" alt=""> -->
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
         <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">terminate chat session</a> 
      </header>
      <div class="search">
        <span class="text">Select a user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
