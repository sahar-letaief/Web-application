<?php
class panier
{


    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['panierjar'])) {
            $_SESSION['panierjar'] = array();
        }
        if (!isset($_SESSION['panieranimal'])) {
            $_SESSION['panieranimal'] = array();
        }
        if (!isset($_SESSION['panieraccess'])) {
            $_SESSION['panieraccess'] = array();
        }
        if (!isset($_SESSION['panieraliment'])) {
            $_SESSION['panieraliment'] = array();
        }
    }
    public function add_product_to_cart($db, $data = array(), $type_article)
    {
        if ($type_article == "jardinage") {
            $req = $db->prepare('SELECT * FROM ARTICLEJARDINAGE WHERE IdArticle=:id');
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        } else if ($type_article == "access") {
            $req = $db->prepare('SELECT * FROM ACCESSOIRES WHERE id=:id');
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        } else if ($type_article == "aliment") {
            $req = $db->prepare('SELECT * FROM ALIMENTS WHERE id=:id');
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        }
    }


    public function add_product($product_id, $type_article)
    {
        if ($type_article == "jardinage") {
            if (isset($_SESSION['panierjar'][$product_id])) {
                $_SESSION['panierjar'][$product_id]++;
            } else {
                $_SESSION['panierjar'][$product_id] = 1;
            }
        }
        else if ($type_article == "access") {
            if (isset($_SESSION['panieraccess'][$product_id])) {
                $_SESSION['panieraccess'][$product_id]++;
            } else {
                $_SESSION['panieraccess'][$product_id] = 1;
            }
        }
        else if ($type_article == "aliment") {
            if (isset($_SESSION['panieraliment'][$product_id])) {
                $_SESSION['panieraliment'][$product_id]++;
            } else {
                $_SESSION['panieraliment'][$product_id] = 1;
            }
        }
    }

    public function product_table($db, $data = array(), $type_article)
    {
        if ($type_article == "jardinage") {
            $req = $db->prepare('SELECT * FROM ARTICLEJARDINAGE WHERE IdArticle IN (' . implode(',', $data) . ')');
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        } 
        else if ($type_article == "access") {
            $req = $db->prepare('SELECT * FROM ACCESSOIRES WHERE id IN (' . implode(',', $data) . ')');
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        }
        else if ($type_article == "aliment") {
            $req = $db->prepare('SELECT * FROM ALIMENTS WHERE id IN (' . implode(',', $data) . ')');
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        }
    }



    // public function update_product_quantity_cart($product_id, $quantity)
    // {
    //     $_SESSION['panierjar'][$product_id] = $quantity;
    // }

    public function add_complaint($product_id, $db)
    {

        // $_SESSION['user'][1] = 2;
        $ids = explode(" ", $product_id);
        $id_commande = $ids[1];
        $id_produit = $ids[0];

        try {
            $req = $db->prepare('SELECT * FROM UTILISATEUR WHERE Email =:em');
            $req->bindValue(':em', $_SESSION['user']);
            $req->execute();
            $res = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $e->getMessage();
        }

        foreach ($res as $r) {
            $firstname = $r->FirstName;
            $lastname = $r->LastName;
            $email = $r->Email;
        }

        try {
            $req = $db->prepare('SELECT * FROM reclamation WHERE idproduit =:id AND id_commande=:id_c');
            $req->bindValue(':id', $id_produit);
            $req->bindValue(':id_c', $id_commande);
            $req->execute();
            $res = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $e->getMessage();
        }

        foreach ($res as $r) {
            $id = $r->idproduit;
        }
        if (empty($id)) {
            try {
                $query = $db->prepare(
                    'INSERT INTO reclamation (nom, prenom, email, id_commande, idproduit, encours)
                    VALUES (:nom, :prenom, :email, :id_commande, :idproduit, :encours)'
                );
                $query->bindValue(':nom', $firstname);
                $query->bindValue(':prenom', $lastname);
                $query->bindValue(':email', $email);
                $query->bindValue(':id_commande', $id_commande);
                $query->bindValue(':idproduit', $id_produit);
                $query->bindValue(':encours', '0');
                $query->execute();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        } else {
        }
    }


    public function DeleteProductId($product_id)
    {
        $ids = explode(" ", $product_id);
        $type_article = $ids[1];
        $id_produit = $ids[0];

        if ( $type_article == "jardinage"){
            unset($_SESSION['panierjar'][$id_produit]);

        }else if ( $type_article == "access"){
            unset($_SESSION['panieraccess'][$id_produit]);
        }
        else if ( $type_article == "aliment"){
            unset($_SESSION['panieraliment'][$id_produit]);
        }
        // unset($_SESSION['idproduit'][$product_id]);
        // unset($_SESSION['qtproduit'][$product_id]);
        // unset($_SESSION['nomproduit'][$product_id]);
        /* for($i = 0, $size = count($_SESSION['idorder']); $i < $size; ++$i) {
            // echo $_SESSION['id'][$i];

            if ( $_SESSION['idorder'][$i] == $product_id ){
                // unset($_SESSION['id'][$i]);

                if ( $_SESSION['count'] >0 ){
                    $_SESSION['count']--;
                }
                if ( $i == $size ){
                    array_pop($_SESSION['idorder']);
                    $size--;
                }
                else{
                    for($j = $i ; $j <= $size-1; ++$j) {
                        echo $_SESSION['idorder'][$j];
                        echo '<br>';
                        if ( $j < $size ){
                            $_SESSION['idorder'][$j] = $_SESSION['idorder'][$j+1];
                        }
                    }
                    array_pop($_SESSION['idorder']);
                    $size--;
                }
                
            }

            // if ( empty($_SESSION['id'][$i])){
               
            // }
        }
        if ( empty($_SESSION['panier'])){
            unset($_SESSION['idorder']);
            $_SESSION['idorder'] = array();
        }
        sort($_SESSION['idorder']);
        sort($_SESSION['panier']);*/
    }




    public function total($db, $panier, $type_article)
    {
        $total = 0;
        if ($type_article == "jardinage") {
            $ids = array_keys($_SESSION['panierjar']);
            if (!empty($ids)) {
                $products = $panier->product_table($db, $ids, "jardinage");
            } else {
                $products = array();
            }
            foreach ($products as  $product) {
                $total += $product->PrixArticle * $_SESSION['panierjar'][$product->IdArticle];
            }
            return $total;
        }
        else if ($type_article == "access") {
            $ids = array_keys($_SESSION['panieraccess']);
            if (!empty($ids)) {
                $products = $panier->product_table($db, $ids, "access");
            } else {
                $products = array();
            }
            foreach ($products as  $product) {
                $total += $product->prix * $_SESSION['panieraccess'][$product->id];
            }
            return $total;
        }
        else if ($type_article == "aliment") {
            $ids = array_keys($_SESSION['panieraliment']);
            if (!empty($ids)) {
                $products = $panier->product_table($db, $ids, "aliment");
            } else {
                $products = array();
            }
            foreach ($products as  $product) {
                $total += $product->prix * $_SESSION['panieraliment'][$product->id];
            }
            return $total;
        }
    }
}
