<?php
/*

*/
//CREATE CLASS ANIMAL
$DeclareClassAnimal = 0;
if($DeclareClassAnimal == 0)
{
class Animal
{
    private $id           ;
    private $id_owner     ;
    private $image_link   ;
    private $for_adoption ;
    private $type         ;
    private $name         ;
    private $race         ;
    private $birthday     ;
    private $gender       ;
    private $details      ;

    public  function getId()           {return $this->id          ;}
    public  function getId_owner()     {return $this->id_owner    ;}
    public  function getImage_link()   {return $this->image_link  ;}
    public  function getFor_adoption() {return $this->for_adoption;}
    public  function getType()         {return $this->type        ;}
    public  function getName()         {return $this->name        ;}
    public  function getRace()         {return $this->race        ;}
    public  function getBirthday()     {return $this->birthday    ;}
    public  function getGender()       {return $this->gender      ;}
    public  function getDetails()      {return $this->details     ;}
    public  function getOwnerEmailByOwnerId($pdo){
        try{
            $query =$pdo->prepare("SELECT * FROM `utilisateur` WHERE `Id_utilisateur` = :Id_utilisateur");
            $query->bindValue(':Id_utilisateur',     $this->id_owner);
            $query->execute();
            $list = $query->fetchAll();
        }catch(PDOException $error){$error->getMessage();}

        foreach ($list as $utilisateur) {
            return $utilisateur['Email'];
        }
    }

    public static function getAnimalById($pdo, $id){
        try{
            $query =$pdo->prepare("SELECT * FROM `animals` WHERE `id_animal` = :id_animal");
            $query->bindValue(':id_animal',     $id);
            $query->execute();
            $list = $query->fetchAll();
        }catch(PDOException $error){$error->getMessage();}

        foreach ($list as $an) {
            $ANIMAL = new Animal($pdo, $an['id_animal'], $an['id_owner'], $an['image_link'], $an['for_adoption'], $an['type'], $an['name'], $an['race'], $an['birthday'], $an['gender'], $an['details']);
            return $ANIMAL;
       }
    }
    public  function setId($pdo, $id){
        if($id == 0)
        {
            try
            {
                $query =$pdo->prepare("SELECT `id_animal` FROM `animals`");
                $query->execute();
                $list = $query->fetchAll();
                

            }catch(PDOException $error){$error->getMessage();}

            foreach ($list as $animal) {
                $this->id = $animal['id_animal'];
            }
            $this->id++;
            //echo " id= ".$this->id;
        }
        else
        {
            $this->id=$id;
        }
    }
    public  function setImage_link($image_link){
        $this->image_link = $image_link;
    }
    public  function setId_owner($pdo,$id_owner) {
        if($id_owner == 0)
        {
            try{
               // echo "d5al d5al ";
                $query =$pdo->prepare("SELECT * FROM `utilisateur` WHERE `Email` = :Email");
                $query->bindValue(':Email',     $_SESSION['user']);
                $query->execute();
                $list = $query->fetchAll();
            }catch(PDOException $error){$error->getMessage();}
    
            foreach ($list as $utilisateur) {
                $this->id_owner = $utilisateur['Id_utilisateur'];
            }
        }
        else
        {
            $this->id_owner = $id_owner;
        }   
    }
    public  function setFor_adoption($for_adoption){$this->for_adoption = $for_adoption;}
    public  function setType($type)                {$this->type         = $type        ;}
    public  function setName($name)                {$this->name         = $name        ;}
    public  function setRace($race)                {$this->race         = $race        ;}
    public  function setBirthday($birthday)        {$this->birthday     = $birthday    ;}
    public  function setGender($gender)            {$this->gender       = $gender      ;}
    public  function setDetails($details)          {$this->details     = $details      ;}

    function __construct($pdo, $id, $id_owner, $image_link, $for_adoption, $type, $name, $race, $birthday, $gender, $details){
                
        $this->setId_owner($pdo,$id_owner)        ;
        $this->setId($pdo,$id)               ;
        $this->setImage_link($image_link)    ;
        $this->setFor_adoption($for_adoption);
        $this->setType($type)                ;
        $this->setName($name)                ;
        $this->setRace($race)                ;
        $this->setBirthday($birthday)        ;
        $this->setGender($gender)            ;
        $this->setDetails($details)          ;
    }

    public function upload_image(){
        if(isset($_FILES['image_link']['name']) && $_FILES['image_link']['name'] != "")
        {

            //echo "*d5al*";
            $link = "../../views/uploads/animal/" ;
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
            $query =$pdo->prepare("INSERT INTO `animals` (`id_animal`, `id_owner`, `image_link`, `for_adoption`, `type`, `name`, `race`, `birthday`, `gender`, `details`) VALUES (:id_animal, :id_owner, :image_link, :for_adoption, :type, :name, :race, :birthday, :gender, :details)");
            
            $query->bindValue(':id_animal',     NULL);
            $query->bindValue(':id_owner',      $this->getId_owner());
            $query->bindValue(':image_link',    $this->getImage_link());
            $query->bindValue(':for_adoption',  $this->getFor_adoption());
            $query->bindValue(':type',          $this->getType());
            $query->bindValue(':name',          $this->getName());
            $query->bindValue(':race',          $this->getRace());
            $query->bindValue(':birthday',      $this->getBirthday());
            $query->bindValue(':gender',        $this->getGender());
            $query->bindValue(':details',       $this->getDetails());
            $query->execute();

            
        }catch(PDOException $error){$error->getMessage();}
    }

    public function ReadOne($Design){
        if ($Design == 1)
        {
            echo '
            <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
            <div class="product">
            <form action="CRUDanimal" method="POST" enctype="multipart/form-data">
                <a href="#" class="img-prod"><img class="img-fluid" src="'. $this->getImage_link() .'" alt="'. $this->getImage_link() .'">
                    <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                    <h3><a href="#">'. $this->getName() .'</a></h3>
                    <div class="d-flex">
                        <div class="pricing">
                            <p class="price"><span>'. $this->getBirthday() .'</span></p>
                        </div>
                    </div>
                    
                    <div class="bottom-area d-flex px-3">
                        <div class="m-auto d-flex">
                            <a href="ModifierAnimal.php?id_animal='.$this->getId().'" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                <span><i class="ion-ios-menu"></i></span>
                            </a>
                            
                            <a href="SupprimerAnimal.php?id_animal='.$this->getId().'" class=" d-flex justify-content-center align-items-center mx-1">
                                <span><i class=""></i>x</span>
                            </a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            </div>';
        }
        elseif ($Design == 2) {
            echo '<div class="col-md-12 d-flex ftco-animate fadeInUp ftco-animated">
            <div class="blog-entry align-self-stretch d-md-flex">
              <a href="blog-single.html" class="block-20" style="background-image: url(\''. $this->getImage_link() .'\');">
              </a>
              <div class="text d-block pl-md-4">
                  <div class="meta mb-3">
                  <div><a href="#">'. $this->getBirthday() .' |</a></div>
                  <div><a href="#">'. $this->getType() .'</a></div>
                  <div><a href="#" class="meta-chat">'. $this->getRace() .' '. $this->getGender() .'</a></div>
                </div>
                <h3 class="heading"><a href="#"></a>'. $this->getName() .'</h3>
                <p>'. $this->getDetails() .'</p>
                <p><a href="MailAdoption.php?id_animal='. $this->getId() .'" class="btn btn-primary py-2 px-3">ADOPTER</a></p>
              </div>
            </div>
          </div>';
        }
        elseif ($Design == 3) {
            if($this->for_adoption == "checked")
            {
                $displayAdoption = '<span class="badge badge-sm bg-gradient-success">pour l\'adoption</span>';
            }
            else
            {
                $displayAdoption = '<span class="badge badge-sm bg-gradient-secondary">pas pour l\'adoption</span>';

            }
            echo '<tr>
            <td name="LB1" class="align-middle">
            <a href="ModifierAnimal.php?id_animal='.$this->id.'" class="badge badge-sm bg-gradient-success" data-toggle="tooltip" data-original-title="Edit user">
            Modifier
          </a>
          </td>
            <td name="LB2" class="align-middle">
            <a href="SupprimerAnimal.php?id_animal='.$this->id.'" class="badge badge-sm bg-gradient-danger" data-toggle="tooltip" data-original-title="Edit user">
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
                  <p class="text-xs text-secondary mb-0">'. $this->birthday.' | '. $this->gender.'</p>
                </div>
              </div>
            </td>
            <td>
            <p class="text-xs font-weight-bold mb-0">'. $this->type .'
            </p>
            <p class="text-xs text-secondary mb-0">'. $this->race.'</p>
          </td>
          <td class="align-middle text-center text-sm">
          '. $displayAdoption .'
        </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">'. $this->details .'</span>
            </td>
  
          </tr>';
        }
        elseif ($Design == 4) {
            echo '<option value="'.$this->id.'">'.$this->name.'</option>' ;
        }

    }
 
    public static function ReadAll($pdo, $Design){
        try{
            if($Design == 1)
            {
                $ANIMAL = new Animal($pdo, 0, 0, "", "", "", "", "", "", "", "");
                $ANIMAL->setId_owner($pdo,0);
                //echo $ANIMAL->id_owner;
                $query =$pdo->prepare("SELECT * FROM `animals` WHERE `id_owner` = :id_owner");
                $query->bindValue(':id_owner',      $ANIMAL->id_owner);
            }
            else
            {
                $query =$pdo->prepare("SELECT * FROM `animals`");
            }
            $query->execute();
            $lists = $query->fetchAll();
        }catch(PDOException $error){$error->getMessage();}

        echo '<div class="container"><div class="row">';
        foreach ($lists as $an)
        {
            $ANIMAL = new Animal($pdo, $an['id_animal'], $an['id_owner'], $an['image_link'], $an['for_adoption'], $an['type'], $an['name'], $an['race'], $an['birthday'], $an['gender'], $an['details']);
            $ANIMAL->ReadOne($Design);
        }
        echo '</div></div>';
    }

    public  function Update($pdo){
        $this->upload_image();
        try
        {
            $query =$pdo->prepare("UPDATE `animals` SET `image_link` = :image_link, `for_adoption` = :for_adoption, `type` = :type, `name` = :name, `race` = :race, `birthday` = :birthday, `gender` = :gender, `details` = :details WHERE `animals`.`id_animal` = :id_animal");
            #$query =$pdo->prepare("UPDATE `animals` SET `name` = :name");

            $query->bindValue(':id_animal',     $this->getId());
            $query->bindValue(':image_link',    $this->getImage_link());
            $query->bindValue(':for_adoption',  $this->getFor_adoption());
            $query->bindValue(':type',          $this->getType());
            $query->bindValue(':name',          $this->getName());
            $query->bindValue(':race',          $this->getRace());
            $query->bindValue(':birthday',      $this->getBirthday());
            $query->bindValue(':gender',        $this->getGender());
            $query->bindValue(':details',       $this->getDetails());
            $query->execute();
            
            
        }catch(PDOException $error){$error->getMessage();}
    }

    public  function Delete($pdo){
        try
        {
            $query =$pdo->prepare("DELETE FROM `animals` WHERE `animals`.`id_animal` = :id_animal");
            $query->bindValue(':id_animal', $this->getId());
            $query->execute();
            unlink($this->image_link);
            
        }catch(PDOException $error){$error->getMessage();}
    }

    public  function ReadAllForAdoption($pdo){
        try{
            $query =$pdo->prepare("SELECT * FROM `animals` WHERE `for_adoption` = 'checked'");
            $query->execute();
            $list = $query->fetchAll();
        }catch(PDOException $error){$error->getMessage();}

        foreach ($list as $an)
        {
            $ANIMAL = new Animal($pdo, $an['id_animal'], $an['id_owner'], $an['image_link'], $an['for_adoption'], $an['type'], $an['name'], $an['race'], $an['birthday'], $an['gender'], $an['details']);
            $ANIMAL->ReadOne(2);
        }
    }

    public static function Search($pdo, $KeyWord, $Design, $OnlyForAdoption){
        try
        {
            if($OnlyForAdoption == 1)
            {
                $query =$pdo->prepare("SELECT * FROM `animals` WHERE `type` LIKE :KeyWord OR `name` LIKE :KeyWord OR `race` LIKE :KeyWord OR `gender` LIKE :KeyWord OR `details` LIKE :KeyWord AND `for_adoption` = 'checked' ORDER BY `birthday` ASC ");
            }
            else
            {
                $query =$pdo->prepare("SELECT * FROM `animals` WHERE `type` LIKE :KeyWord OR `name` LIKE :KeyWord OR `race` LIKE :KeyWord OR `gender` LIKE :KeyWord OR `details` LIKE :KeyWord ORDER BY `birthday` ASC ");
            }
            
           $query->bindValue(':KeyWord', '%'.$KeyWord.'%');
           $query->execute();
           $list = $query->fetchAll();
            
            
            foreach ($list as $an)
            {
                $ANIMAL = new Animal($pdo, $an['id_animal'], $an['id_owner'], $an['image_link'], $an['for_adoption'], $an['type'], $an['name'], $an['race'], $an['birthday'], $an['gender'], $an['details']);
                $ANIMAL->ReadOne($Design);
            }
            
        }catch(PDOException $error){$error->getMessage();}
    }

     
    public static function Join($pdo){
        try{
            $query =$pdo->prepare("SELECT * FROM `animals` INNER JOIN `utilisateur` ON `animals`.`id_owner` = `utilisateur`.`id_utilisateur` ");
            //$query =$pdo->prepare("SELECT * FROM `animals`");
            $query->execute();
            $list = $query->fetchAll();
        }catch(PDOException $error){$error->getMessage();}

        echo '<div class="container"><div class="row">';
        foreach ($list as $an)
        {
            if($an['for_adoption'] == "checked")
            {
                $displayAdoption = '<span class="badge badge-sm bg-gradient-success">pour l\'adoption</span>';
            }
            else
            {
                $displayAdoption = '<span class="badge badge-sm bg-gradient-secondary">pas pour l\'adoption</span>';

            }
            echo '<tr>
            <td class="align-middle">
            <div class="d-flex flex-column justify-content-center">
              <h6 class="mb-0 text-sm">'. $an['Email'].'</h6>
              <p class="text-xs text-secondary mb-0">'. $an['FirstName'].' '. $an['LastName'].'</p>
            </div>
            </td>
            <td class="align-middle">
            <a href="ModifierAnimal.php?id_animal='.$an['id_animal'].'" class="badge badge-sm bg-gradient-success" data-toggle="tooltip" data-original-title="Edit user">
            Modifier
          </a>
          </td>
            <td class="align-middle">
            <a href="SupprimerAnimal.php?id_animal='.$an['id_animal'].'" class="badge badge-sm bg-gradient-danger" data-toggle="tooltip" data-original-title="Edit user">
            Supprimer
          </a>
          </td>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="'.$an['image_link'].'" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">'. $an['name'].'</h6>
                  <p class="text-xs text-secondary mb-0">'. $an['birthday'].' | '. $an['gender'].'</p>
                </div>
              </div>
            </td>
            <td>
            <p class="text-xs font-weight-bold mb-0">'. $an['type'] .'
            </p>
            <p class="text-xs text-secondary mb-0">'. $an['race'].'</p>
          </td>
          <td class="align-middle text-center text-sm">
          '. $displayAdoption .'
        </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">'. $an['details'] .'</span>
            </td>
  
          </tr>';
        }
        echo '</div></div>';
    }
}
$DeclareClassAnimal = 1 ;
}