<?php
require_once "../../config1.php";
class Hebergements{
    public function AfficherHeberg() {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function DelHeberg($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'DELETE FROM hebergement WHERE Id= :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function TrierAsc() {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement ORDER BY Prix ASC'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function TrierDesc() {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement ORDER BY Prix DESC'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function RechercheHeb($noun) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement WHERE Nom LIKE %$noun% '
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getHebergByIdRATING($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement INNER JOIN rating ON hebergement.Id=rating.Heberg WHERE hebergement.Id = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getHebergById($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement WHERE Id = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getHebergByName($nom) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement WHERE Nom LIKE :nom'
            );
            $query->execute([
                'nom' => $nom
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function AddHeberg($heberg)
    {
        $sql = "INSERT INTO hebergement (Nom, Email, Prix, Adresse, Description, Image) 
        VALUES (:Nom, :Email, :Prix, :Adresse, :Description, :Image)";

       
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare($sql);
            $query->execute([
                'Nom' => $heberg->getNom(),
                'Email' => $heberg->getEmail(),
                'Prix' => $heberg->getPrix(),
                'Adresse' => $heberg->getAdresse(),
                'Description' => $heberg->getDescription(),
                'Image' => $heberg->getImage()

            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public function ModifyHeb($heb, $id)
    {
        
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'UPDATE hebergement SET 
                        Nom = :Nom, 
                        Email= :Email,
                        Prix = :Prix,
                        Adresse = :Adresse,
                        Description = :Description,
                        Image = :Image
                    WHERE Id = :id'
            );
            $query->execute([
                'id' =>  $id,
                'Nom' => $heb->getNom(),
                'Email' => $heb->getEmail(),
                'Prix' => $heb->getPrix(),
                'Adresse' => $heb->getAdresse(),
                'Description' =>$heb->getDescription(),
                'Image' =>$heb->getImage()

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>