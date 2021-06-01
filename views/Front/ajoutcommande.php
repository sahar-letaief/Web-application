<?php
require '../../config1.php';
require "panier.class.php";
require "C:/xampp/htdocs/Naturimal/Controller/commandeC.php";
require "C:/xampp/htdocs/Naturimal/Model/commandeM.php";


$panier = new panier();
$db = getConnexion();
if (empty($_SESSION['user'])) {
    header('location: login.php');
} else {
    if (isset($_POST['submit'])) {
        $state = $_POST['state'];
        $street = $_POST['street'];
        $town = $_POST['town'];
        $zip = $_POST['zip'];
        $total = $_SESSION['total'][1];

        $adresse = $state . " " . $street . " " . $town . " " . $zip;

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
        }
        $email = $_SESSION['user'];
        $comC = new commandeC();
        $temp = $comC->get_id_nouv_commande();
        if (!empty($_SESSION['panierjar'])) {
            $ids = array_keys($_SESSION['panierjar']);
            sort($ids);
            $products = $panier->product_table($db, $ids, "jardinage");
            $nomproduits = array();
            $i = 0;
            foreach ($products as $product) {
                $nomproduits[$i] = $product->NomArticle;
                $i++;
            }
            print_r($ids);
            echo "<br>";            

            $count = count($_SESSION['panierjar']);
            $com = new commande($temp, $firstname, $lastname, $email, $total, $adresse, $ids, $_SESSION['quantityjar'], $nomproduits, "jardinage");
            $comC->ajouter_commande($count, $ids, $com);

            unset($_SESSION['panierjar']);
            unset($_SESSION['totalindivjar']);
            unset($_SESSION['quantityjar']);
            unset($_SESSION['totaljar']);

            $_SESSION['panierjar'] = array();
            $_SESSION['totalindivjar'] = array();
            $_SESSION['quantityjar'] = array();
            $_SESSION['totaljar'] = array();
        }



        if (!empty($_SESSION['panieraccess'])) {

            $ids = array_keys($_SESSION['panieraccess']);
            sort($ids);
            $products = $panier->product_table($db, $ids, "access");
            $nomproduits = array();
            $i = 0;
            foreach ($products as $product) {
                $nomproduits[$i] = $product->nom;
                $i++;
            }
            print_r($ids);
            echo "<br>";
            $count = count($_SESSION['panieraccess']);
            $com2 = new commande($temp, $firstname, $lastname, $email, $total, $adresse, $ids, $_SESSION['quantityaccess'], $nomproduits, "access");
            $comC->ajouter_commande($count, $ids, $com2);

            unset($_SESSION['panieraccess']);
            unset($_SESSION['totalindivaccess']);
            unset($_SESSION['quantityaccess']);
            unset($_SESSION['totalaccess']);

            $_SESSION['panieraccess'] = array();
            $_SESSION['totalindivaccess'] = array();
            $_SESSION['quantityaccess'] = array();
            $_SESSION['totalaccess'] = array();
        }

        if (!empty($_SESSION['panieraliment'])) {

            $ids = array_keys($_SESSION['panieraliment']);
            $products = $panier->product_table($db, $ids, "aliment");
            $nomproduits = array();
            $i = 0;
            foreach ($products as $product) {
                $nomproduits[$i] = $product->nom;
                $i++;
            }
            sort($ids);
            print_r($ids);
            echo "<br>";
            $count = count($_SESSION['panieraliment']);
            $com3 = new commande($temp, $firstname, $lastname, $email, $total, $adresse, $ids, $_SESSION['quantityaliment'], $nomproduits, "aliment");
            $comC->ajouter_commande($count, $ids, $com3);

            unset($_SESSION['panieraliment']);
            unset($_SESSION['totalindivaliment']);
            unset($_SESSION['quantityaliment']);
            unset($_SESSION['totalaliment']);

            $_SESSION['panieraliment'] = array();
            $_SESSION['totalindivaliment'] = array();
            $_SESSION['quantityaliment'] = array();
            $_SESSION['totalaliment'] = array();
        }
        $_SESSION['total'][1] = 0;
        header('location: Accueil.php');
    }
}
