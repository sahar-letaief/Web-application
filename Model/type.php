<?php
class type {
    private $id_type;
    private  $type;

    public function __construct($id, $type){
        $this->id_type = $id;
        $this->type = $type;
    }


    public function getId()
    {
        return $this->id_type;
    }


    public function setId($id)
    {
        $this->id_type = $id;
    }

    public function getType (){
        return $this->type ;
    }


    public function setType ($type){
        $this->type = $type;
    }

}
?>