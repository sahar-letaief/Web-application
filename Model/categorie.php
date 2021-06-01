<?php
    class categorie{
        private int $IdCategorie;
        private string $NomCategorie;
        private string $Description;

        public function __construct($NomCategorie,$Description){
           // $this->IdCategorie = $IdCategorie;
            $this->NomCategorie= $NomCategorie;
            $this->Description= $Description;
        }

        //getters
        public function getIdCategorie(){
            return $this->IdCategorie;
        }
        public function getNomCategorie(){
            return $this->NomCategorie;
        }
        public function getDescriptionCategorie(){
            return $this->Description;
        }


        //setters
        public function setIdCategorie($IdCategorie){
            return $this->IdCategorie;
        }
        public function setNomCategorie($NomCategorie){
            return $this->NomCategorie;
        }
        public function setDescriptionCategorie($Description){
            return $this->Description;
        }
    }
?>