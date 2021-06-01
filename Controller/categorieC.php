<?php
    require_once "../../config1.php";
    class categorieC{
        public function afficherCategories() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getCategorieById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie WHERE IdCategorie = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getACategorieByName($Nom) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie WHERE NomCategorie = :Nom'
                );
                $query->execute([
                    'Nom' => $Nom
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function AjouterCategorie($Cat) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO categorie (NomCategorie,Description) 
                VALUES ( :NomCategorie, :Description)'
                );
                $query->execute([
                   // 'IdCategorie' => $Cat->getIdCategorie(),
                     'NomCategorie' => $Cat->getNomCategorie(),
                 'Description' => $Cat->getDescriptionCategorie()
                ]);
                
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function UpdateCategorie($Cat, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE categorie SET NomCategorie= :NomCategorie,Description = :Description WHERE IdCategorie = :id'
                );
                $query->execute([
                    'NomCategorie' => $Cat->getNomCategorie(),
                    'Description' => $Cat->getDescriptionCategorie(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function DeleteCategorie($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM categorie WHERE IdCategorie = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function RechercherCategorie($Nom) {            
            $sql = "SELECT * from categorie where NomCategorie LIKE '%$Nom%' ORDER BY IdCategorie"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'NomCategorie' => $Cat->getNomCategorie(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function TriCategoriesAd(){
            try{
                $pdo=getConnexion();
                $query=$pdo->prepare('SELECT * FROM categorie ORDER BY NomCategorie DESC');
                $query->execute();
                return $query->fetchAll();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }

        }
       
        
        
    }