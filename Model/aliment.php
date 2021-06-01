<?php
class aliment {
    private $id;
    private  $nom;
    private  $image;
    private  $prix;
    private  $vendeur;
    private  $type;
    private  $qte;

    public function __construct($id,$nom, $type,$prix, $image,$vendeur,$qte){
        $this->id = $id;
        $this->nom = $nom;
        $this->type = $type;
        $this->prix = $prix;
        $this->image = $image;
        $this->vendeur = $vendeur;
        $this->qte = $qte;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getQte()
    {
        return $this->qte;
    }


    public function setQte($qte)
    {
        $this->qte = $qte;
    }

    public function getNom (){
        return $this->nom ;
    }

    public function getType (){
        return $this->type ;
    }

    public function getImage (){
        return $this->image ;
    }

    public function getPrix (){
        return $this->prix ;
    }

    public function getVendeur (){
        return $this->vendeur ;
    }

    public function setNom ($nom){
        $this->nom = $nom;
    }

    public function setType ($type){
        $this->type = $type;
    }

    public function setImage ($image){
        $this->image = $image;
    }

    public function setPrix ($prix){
        $this->prix = $prix;
    }

    public function setVendeur ($vendeur){
        $this->vendeur = $vendeur;
    }

}
?>