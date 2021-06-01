<?php 

class reclamation{
    private $idreclamation;
    private $nom;
    private $prenom;
    private $email;
    private $idcommande;
    private $idproduit;
    private $typeproduit;


    public function __construct($nom,$prenom,$email,$idcommande,$idproduit,$typeproduit){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->idcommande=$idcommande;
        $this->idproduit=$idproduit;
        $this->typeproduit=$typeproduit;
    }

    public function idreclamation(){
        return $this->idreclamation;
    }

    public function getnom(){
        return $this->nom;
    }

    public function getprenom(){
        return $this->prenom;
    }

    public function getemail(){
        return $this->email;
    }

    public function getidcommande(){
        return $this->idcommande;
    }

    public function getidproduit(){
        return $this->idproduit;
    }

    public function gettypeproduit(){
        return $this->typeproduit;
    }

}

?>