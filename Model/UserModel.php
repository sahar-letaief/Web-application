<?php


class Utilisateur 
{
       private ?string $FirstName = null;
       private ?string $LastName = null ;
       private ?string $Email = null ;
       private ?string $Password = null ;

     /*function __construct ( string $FirstName, string $LastName, string $Email , string $Password  ){
            $this->FirstName= $Password;
            $this->LastName= $LastName;
            $this->Email= $Email; 
            $this->Password= $email;
    }*/
    
         public function getFirstName (){
             return $this->FirstName;
         }

        public function setFirstName (string $First) {
            $this->FirstName = $First;
         }

        public function getLastName (){
            return $this->LastName;
        }

        public function setLastName (string $LastName) {
            $this->LastName = $LastName;
        }


        public function getEmail (){
            return $this->Email;
        }

        public function setEmail (string $Email) {
            $this->Email = $Email;
        }

        public function getPassword (){
            return $this->Password;
        }

        public function setPassword (string $Password) {
            $this->Password = $Password;
        }





}

?>