<?php 
    require_once "C:/xampp/htdocs/Naturimal/config1.php";
    require_once "C:/xampp/htdocs/Naturimal/views/Front/panier.class.php";
    $panier = new panier();
    class commandeC{
        
        public function afficher_commande(){
            $db = getConnexion();
            try{
                $query= $db->prepare('SELECT * FROM comande');
                $query->execute();
                return $query->fetchAll();
            }catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function return_image( $temp,$idproduit){
            $db = getConnexion();
            if ( $temp == "jardinage") {
                try {
                    $query = $db->prepare('SELECT * FROM articlejardinage where IdArticle=:id');
                    $query->BindValue(':id', $idproduit);
                    $query->execute();
                    return $query->fetchAll();
                    
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            }
            else if ( $temp == "aliment") {
                try {
                    $query = $db->prepare('SELECT * FROM aliments where id=:i');
                    $query->BindValue(':i', $idproduit);
                    $query->execute();
                    return $query->fetchAll();
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            }
            else if ( $temp == "access") {
                try {
                    $query = $db->prepare('SELECT * FROM accessoires where id=:i');
                    $query->BindValue(':i', $idproduit);
                    $query->execute();
                    return $query->fetchAll();
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            }
        }

        public function ajouter_commande($count,$ids,$com){
            for ( $i = 0 ; $i < $count ; $i++){
                try{
                    $db = getConnexion();
                    $query = $db->prepare(
                        'INSERT INTO COMANDE (id_commande, nom, prenom, email, total, adresse, idproduit, qtproduit, nomproduit, typeproduit)
                        VALUES (:id_commande, :nom, :prenom, :email, :total, :adresse, :idproduit, :qtproduit, :nomproduit, :typeproduit)'
                    );
                    $query->execute([
                        'id_commande' => $com->getidcommande(),
                        'nom'=>$com->getnom(),
                        'prenom'=>$com->getprenom(),
                        'email'=>$com->getemail(),
                        'total'=>$com->gettotal(),
                        'adresse'=>$com->getadresse(),
                        'idproduit'=>$com->getidproduit()[$i],
                        'qtproduit'=>$com->getqtproduit()[$ids[$i]],
                        'nomproduit'=>$com->getnomproduit()[$i],
                        'typeproduit'=>$com->gettypeproduit()
                    ]);

                }catch(PDOException $e){
                    $e->getMessage();
                }
            }
        }

        public function get_id_nouv_commande(){
        $db = getConnexion();
        $temp=0;
        try{
            $req = $db->prepare('SELECT id_commande FROM comande ORDER BY id_commande DESC LIMIT 1');
            $req->execute();
            $id_commandes = $req->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            $e->getMessage();
        }
        if ( empty($id_commandes)){
            $temp++;
        }else{
            foreach($id_commandes as $id_c){
                $temp = $id_c->id_commande;
            }
            $temp ++;
        }
        return $temp;
    }

    public function get_distinct_id_commande(){
    $db = getConnexion();
    try{
        $req = $db->prepare('SELECT DISTINCT id_commande FROM comande');
        $req->execute();
        $ids_commandes = $req->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        $e->getMessage();
    }
    return $ids_commandes;
    }

    public function get_commande_afficher($email ,$id_commande,$type_article){
        $db = getConnexion();
        try {
            $req = $db->prepare('SELECT * FROM COMANDE WHERE email =:em AND id_commande=:id AND typeproduit=:tp');
            $req->bindValue(':em', $email);
            $req->bindValue(':id', $id_commande);
            $req->bindValue(':tp', $type_article);
            $req->execute();
            $products = $req->fetchAll(PDO::FETCH_OBJ);
          } catch (PDOException $e) {
            $e->getMessage();
          }
          return $products;
    }

    public function get_adresse_commande($email){
        $db = getConnexion();
        try {
            $req = $db->prepare('SELECT * FROM comande WHERE email =:em');
            $req->bindValue(':em', $email);
            $req->execute();
            $comande = $req->fetchAll(PDO::FETCH_OBJ);
          } catch (PDOException $e) {
            $e->getMessage();
          }

          foreach ($comande as $c) {
            $adresse = $c->adresse;
          }
          return $adresse;
    }

    }
?>