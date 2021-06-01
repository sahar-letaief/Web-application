<?php

class commande 
{
    private $idcommande;
    private $nom;
    private $prenom;
    private $email;
    private $total;
    private $adresse;

    private $idproduit;
    private $qtproduit;
    private $nomproduit;
    private $type;


    public function __construct($idcommande,$nom,$prenom,$email,$total,$adresse,$idproduit,$qtproduit,$nomproduit,$type){
        $this->idcommande=$idcommande;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        
        $this->total=$total;
        $this->adresse=$adresse;

        $this->idproduit=$idproduit;
        $this->qtproduit=$qtproduit;
        $this->nomproduit=$nomproduit;
        $this->type=$type;
    }

    public function getidcommande(){
        return $this->idcommande;
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

    public function gettotal(){
        return $this->total;
    }

    public function getadresse(){
        return $this->adresse;
    }

    public function getidproduit(){
        return $this->idproduit;
    }

    public function getqtproduit(){
        return $this->qtproduit;
    }

    public function getnomproduit(){
        return $this->nomproduit;
    }

    public function gettypeproduit(){
        return $this->type;
    }
}


?>