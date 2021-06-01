<?php 
class Hebergs {
    private int $Id;
    private string $Nom;
    private string $Email;
    private int $Prix;
    private string $Adresse;
    private string $Description;
    private string $Image;

    public function __construct($Nom,$Email,$Prix,$Adresse,$Description,$Image){
        //$this->IdArticle=$IdArticle;
        $this->Nom=$Nom;
        $this->Email=$Email;
        $this->Prix=$Prix;
        $this->Adresse=$Adresse;
        $this->Description=$Description;
        $this->Image=$Image;
    }

    public function getId(){
        return $this->Id;
    }
    public function getNom(){
        return $this->Nom;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getPrix(){
        return $this->Prix;
    }
    public function getAdresse(){
        return $this->Adresse;
    }
    public function getDescription(){
        return $this->Description;
    }
    public function getImage(){
        return $this->Image;
    }

    public function setId($Id){
        $this->Id = $Id;
    }
    public function setNom($Nom){
        $this->Nom = $Nom;
    }
    public function setEmail($Email){
        $this->Email = $Email;
    }
    public function setPrix($Prix){
        $this->Prix = $Prix;
    }
    public function setAdresse($Adresse){
        $this->Adresse = $Adresse;
    }
    public function setDescription($Description){
        $this->Description = $Description;
    }
    public function setImage($Image){
        $this->Image=$Image;
    }


}
?>