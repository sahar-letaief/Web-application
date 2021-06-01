<?php 
class articles_jardinage {
    private int $IdArticle;
    private int $IdCategorie;
    private string $NomArticle;
    private string $ImageArticle;
    private string $DescriptionArticle;
    private float $PrixArticle;
    private int $QuantiteArticle;

    public function __construct($IdCategorie,$NomArticle,$ImageArticle,$DescriptionArticle,$PrixArticle,$QuantiteArticle){
        //$this->IdArticle=$IdArticle;
        $this->IdCategorie=$IdCategorie;
        $this->NomArticle=$NomArticle;
        $this->ImageArticle=$ImageArticle;
        $this->DescriptionArticle=$DescriptionArticle;
        $this->PrixArticle=$PrixArticle;
        $this->QuantiteArticle=$QuantiteArticle;
    }

    //getters
    public function getIdArticle(){
        return $this->IdArticle;
    }
    public function getIdCategorieArticle(){
        return $this->IdCategorie;
    }
    public function getNomArticle(){
        return $this->NomArticle;
    }
    public function getImageArticle(){
        return $this->ImageArticle;
    }
    public function getDescriptionArticle(){
        return $this->DescriptionArticle;
    }
    public function getPrixArticle(){
        return $this->PrixArticle;
    }
    public function getQuantiteArticle(){
        return $this->QuantiteArticle;
    }

    //setters
    public function setIdArticle ($IdArticle){
        $this->IdArticle = $IdArticle;
    }
    public function setCategorieArticle ($IdCategorie){
        $this->IdCategorie = $IdCategorie;
    }
    public function setINomArticle ($NomArticle){
        $this->NomArticle = $NomArticle;
    }
    public function setImageArticle ($ImageArticle){
        $this->ImageArticle = $ImageArticle;
    }
    public function setDescriptionArticle($DescriptionArticle){
        return $this->$DescriptionArticle;
    }
    public function setPrixArticle ($PrixArticle){
        $this->PrixArticle = $PrixArticle;
    }
    public function setQuantiteArticle($QuantiteArticle){
        $this->QuantiteArticle=$QuantiteArticle;
    }


}
?>