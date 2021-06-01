<?php
//CREATE CLASS ANIMAL
$DeclareClassVeterinary  = 0;
if($DeclareClassVeterinary == 0)
{
class Veterinary
{
    private $id         ;
    private $image_link ;
    private $name       ;
    private $email      ;
    private $address    ;
    private $details    ;

    public  function getId()         {return $this->id         ;}
    public  function getImage_link() {return $this->image_link ;}
    public  function getName()       {return $this->name       ;}
    public  function getEmail()      {return $this->email      ;}
    public  function getAddress()    {return $this->address    ;}
    public  function getDetails()    {return $this->details    ;}

    public static function getVeterinaryById($pdo, $id){
        try{
            $query =$pdo->prepare("SELECT * FROM `veterinary` WHERE `id_veterinary` = :id_veterinary");
            $query->bindValue(':id_veterinary',     $id);
            $query->execute();
            $list = $query->fetchAll();
        }catch(PDOException $error){$error->getMessage();}

        foreach ($list as $vet) {
            $VETERINARY = new Veterinary($pdo, $vet['id_veterinary'], $vet['image_link'], $vet['name'], $vet['email'], $vet['address'], $vet['details']);
            return $VETERINARY;
       }
    }
    public  function setId($pdo, $id){
        if($id == 0)
        {
            try
            {
                $query =$pdo->prepare("SELECT `id_veterinary` FROM `veterinary`");
                $query->execute();
                $list = $query->fetchAll();
                

            }catch(PDOException $error){$error->getMessage();}

            foreach ($list as $veterinary) {
                $this->id = $veterinary['id_veterinary'];
            }
            $this->id++;
            //echo " id= ".$this->id;
        }
        else
        {
            $this->id=$id;
        }
    }
    public  function setImage_link($image_link) {$this->image_link = $image_link ;}
    public  function setName($name)             {$this->name       = $name       ;}
    public  function setEmail($email)           {$this->email      = $email      ;}
    public  function setAddress($address)       {$this->address    = $address    ;}
    public  function setDetails($details)       {$this->details    = $details    ;}

    function __construct($pdo, $id, $image_link, $name, $email, $address, $details){

        $this->setId($pdo,$id)            ;
        $this->setImage_link($image_link) ;
        $this->setName($name)             ;
        $this->setEmail($email)           ;
        $this->setAddress($address)       ;
        $this->setDetails($details)       ;
    }

    public function upload_image(){
        if(isset($_FILES['image_link']['name']) && $_FILES['image_link']['name'] != "")
        {

            //echo "*d5al*";
            $link = "../../views/uploads/veterinaire/" ;
            $link = $link . $this->id . "." ;
            $FileExt = explode('.',$_FILES['image_link']['name']);
            $link = $link . end($FileExt);
            $link = strtolower($link);
           /* echo $link;*/
            $this->image_link = $link;
            //echo "///radineeh ".$this->image_link;
            
            //unlink($this->image_link);
            $TMPfile= $_FILES['image_link']['tmp_name'];
            move_uploaded_file($TMPfile, $this->image_link);
        }
    }

    public function Create($pdo){
        /*echo "create";*/
        $this->upload_image();
        try
        {
            $query =$pdo->prepare("INSERT INTO `veterinary` (`id_veterinary`, `image_link`, `name`, `email`, `address`, `details`) VALUES (:id_veterinary, :image_link, :name, :email, :address, :details)");
            
            $query->bindValue(':id_veterinary',  NULL);
            $query->bindValue(':image_link', $this->getImage_link());
            $query->bindValue(':name',       $this->getName());
            $query->bindValue(':email',      $this->getEmail());
            $query->bindValue(':address',    $this->getAddress());
            $query->bindValue(':details',    $this->getDetails());
            $query->execute();

        }catch(PDOException $error){$error->getMessage();}
    }

    public function ReadOne($Design){
        if ($Design == 1)
        {
            echo '<div class="col-md-12 d-flex ftco-animate fadeInUp ftco-animated">
            <div class="blog-entry align-self-stretch d-md-flex">

              <div class="text d-block pl-md-4">
                  <div class="meta mb-3">
                  <div><a href="#" class="meta-chat">'. $this->address .'</a></div>
                </div>
                <h3 class="heading"><a href="#"></a>'. $this->getName() .'</h3>
                <p>'. $this->getDetails() .'</p>
                <p><a href="MailVeterinaire.php?id_veterinary='. $this->getId() .'" class="btn btn-primary py-2 px-3">RENDEZ-VOUS</a></p>
              </div>
              <a href="blog-single.html" class="block-20" style="background-image: url(\'../../dashboard/veterinaire/'. $this->getImage_link() .'\');">
              </a>
            </div>
          </div>';
        }
        elseif ($Design == 2) {
            echo '<tr>
            <td class="align-middle">
            <a href="ModifierVeterinaire.php?id_veterinary='.$this->id.'" class="badge badge-sm bg-gradient-success" data-toggle="tooltip" data-original-title="Edit user">
            Modifier
          </a>
          </td>
            <td class="align-middle">
            <a href="SupprimerVeterinaire.php?id_veterinary='.$this->id.'" class="badge badge-sm bg-gradient-danger" data-toggle="tooltip" data-original-title="Edit user">
            Supprimer
          </a>
          </td>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="'.$this->getImage_link().'" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">'. $this->name.'</h6>
                  <p class="text-xs text-secondary mb-0">'. $this->email.'</p>
                </div>
              </div>
            </td>
            <td>
              
              <p class="text-xs text-secondary mb-0">'. $this->address .'</p>
            </td>
            
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">'. $this->details .'</span>
            </td>
  
          </tr>';
        }

    }
 
    public static function ReadAll($pdo, $Design){
        try{
            $query =$pdo->prepare("SELECT * FROM `veterinary`");
            $query->execute();
            $list = $query->fetchAll();
        }catch(PDOException $error){$error->getMessage();}

        foreach ($list as $vet)
        {
            $VETERINARY = new Veterinary($pdo, $vet['id_veterinary'], $vet['image_link'], $vet['name'], $vet['email'], $vet['address'], $vet['details']);
            $VETERINARY->ReadOne($Design);
        }
    }

    public  function Update($pdo){
        $this->upload_image();
        try
        {
            $query =$pdo->prepare("UPDATE `veterinary` SET `image_link` = :image_link, `name` = :name, `email` = :email, `address` = :address, `details` = :details WHERE `veterinary`.`id_veterinary` = :id_veterinary");
            #$query =$pdo->prepare("UPDATE `animals` SET `name` = :name");

            $query->bindValue(':id_veterinary', $this->id);
            $query->bindValue(':image_link',    $this->getImage_link());
            $query->bindValue(':name',          $this->getName());
            $query->bindValue(':email',         $this->getEmail());
            $query->bindValue(':address',       $this->getAddress());
            $query->bindValue(':details',       $this->getDetails());
            $query->execute();
            
            
        }catch(PDOException $error){$error->getMessage();}
    }

    public  function Delete($pdo){
        try
        {
            $query =$pdo->prepare("DELETE FROM `veterinary` WHERE `veterinary`.`id_veterinary` = :id_veterinary");
            $query->bindValue(':id_veterinary', $this->getId());
            $query->execute();
            unlink($this->image_link);
            
        }catch(PDOException $error){$error->getMessage();}
    }

    public static function Search($pdo, $KeyWord){
      try
      {
         $query =$pdo->prepare("SELECT * FROM `veterinary` WHERE `name` LIKE :KeyWord OR `email` LIKE :KeyWord OR `address` LIKE :KeyWord OR `details` LIKE :KeyWord ORDER BY `id_veterinary` ASC ");  
   
         $query->bindValue(':KeyWord', '%'.$KeyWord.'%');
         $query->execute();
         $list = $query->fetchAll();
          
          
         foreach ($list as $vet)
         {
             $VETERINARY = new Veterinary($pdo, $vet['id_veterinary'], $vet['image_link'], $vet['name'], $vet['email'], $vet['address'], $vet['details']);
             $VETERINARY->ReadOne(2);
         }
          
      }catch(PDOException $error){$error->getMessage();}
  }
}
$DeclareClassVeterinary = 1 ;
}