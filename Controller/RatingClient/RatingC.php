<?php
require_once "../../config1.php";
class Ratingc
{
    public function afficherRatings()
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM rating'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function AffbyStar($star)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM rating WHERE Stars =:star'
            );
            $query->execute([
                'star' =>$star
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getRatingsById($id)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM rating WHERE Id = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getUSr($email)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM utilisateur WHERE Email = :email'
            );
            $query->execute([
                'email' => $email
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getRatingsByHeb($id)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM rating WHERE Heberg = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function ModifyRating($rating, $id)
    {
        
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'UPDATE rating SET 
                        Stars = :Stars, 
                        Comment= :Comment,
                        User = :User,
                        Heberg = :Heberg
                    WHERE Id = :id'
            );
            $query->execute([
                'id' =>  $id,
                'Stars' => $rating->getStars(),
                'Comment' => $rating->getComment(),
                'User' => $rating->getUser(),
                'Heberg' => $rating->getHeberg()

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getRatingsByUser($User)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM rating WHERE User = :User'
            );
            $query->execute([
                'User' => $User
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function AddRating($Rating)
    {
        $sql = "INSERT INTO rating (Stars, Comment, User, Heberg) 
        VALUES (:Stars, :Comment, :User, :Heberg)";

        $pdo = getConnexion();
        try {
            $query = $pdo->prepare($sql);

            $query->execute([
                'Stars' => $Rating->getStars(),
                'Comment' => $Rating->getComment(),
                'User' => $Rating->getUser(),
                'Heberg' => $Rating->getHeberg(),

            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public function DeleteRating($id)
    {
        $sql = "DELETE FROM rating WHERE Id = :id";
        $pdo = getConnexion();
        $req = $pdo->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function Delrat($id)
    {
        $sql = "DELETE FROM rating WHERE Heberg = :id";
        $pdo = getConnexion();
        $req = $pdo->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
