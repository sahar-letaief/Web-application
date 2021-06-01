
<?php
                require '../../config1.php' ;


class WishlistC {

    public function AjouterProduitWish($email,$id_produit)
    {
                $pdo = getConnexion();


            try {
                $query = $pdo->prepare(
                    'INSERT INTO wishlist (Email , id_Produit)
                                 VALUES(:Email , :id_Produit) '
                 );
                    $query->bindValue(':Email',$email);
                    $query->bindValue(':id_Produit' ,$id_produit);
                    $query->execute();

                   // header('Location: http://localhost/Projet2/shop.php');

                    

                }
            catch (PDOExeption $e){ 
                $e->getMessage();
            }
    }    

    public function AfficherProduitWishJar($email)
    {
                $pdo = getConnexion();
             try{
                 $query = $pdo->prepare('SELECT * FROM articlejardinage A JOIN wishlist W  ON W.id_Produit=A.IdArticle  where W.Email=:Email');
                 $query->bindValue(':Email',$email);

                 $query->execute();

                 $result = $query->fetchALL();

             }
             catch(PDOException $e) {
                 $e->getMessage();
             }

            return $result ;

    }
    public function AfficherProduitWishAcc($email)
    {
                $pdo = getConnexion();
             try{
                 $query = $pdo->prepare('SELECT * FROM accessoires A JOIN wishlist W  ON W.id_Produit=A.id where W.Email=:Email');
                 $query->bindValue(':Email',$email);

                 $query->execute();

                 $result = $query->fetchALL();
                  
             }
             catch(PDOException $e) {
                 $e->getMessage();
             }
            return $result ;

    }
      public function AfficherProduitWishAlim($email)
    {
                $pdo = getConnexion();
             try{
                 $query = $pdo->prepare('SELECT * FROM aliments A JOIN wishlist W  ON W.id_Produit=A.id where W.Email=:Email');
                 $query->bindValue(':Email',$email);

                 $query->execute();

                 $result = $query->fetchALL();
                  
             }
             catch(PDOException $e) {
                 $e->getMessage();
             }
            return $result ;

    }
    
        public function ModifierProduitWish($Produit)
    {
        # code...s
    }
        public function SupprimerProduitWish($email, $id_Produit)
    {
                $pdo = getConnexion();

            echo $email;
            echo $id_Produit;
            try{
                $query = $pdo->prepare('DELETE FROM wishlist WHERE Email = :Email AND id_Produit=:id_Produit ');
                $query->bindValue(':Email',$email);
                $query->bindValue(':id_Produit',$id_Produit);
                
                $query->execute();                
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }
    }

        public function ChercherProduitWish($email, $id_Produit)
    {
                $pdo = getConnexion();

        try{
                $query = $pdo->prepare('SELECT * FROM wishlist WHERE Email = :Email AND id_Produit=:id_Produit ');
                $query->bindValue(':Email',$email);
                $query->bindValue(':id_Produit',$id_Produit);
                
                $query->execute(); 
                 $result = $query->fetchALL();
               
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }

            return $result ;
    }
        



}


?>