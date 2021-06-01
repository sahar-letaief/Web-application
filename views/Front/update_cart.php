<?php
    require 'panier.class.php' ;
    if ( isset($_POST['data_info'])){
    $datas = json_decode($_POST['data_info']);
    $total = end($datas);
    array_pop($datas);

    $count = 0;
    $quantity = array();
    $total_indiv = array();
    foreach($datas as $data){
        if ( $count % 2 == 0)
        {
            array_push($quantity,json_decode($data));
        }
        else
        {
            array_push($total_indiv,json_decode($data));

        }
        $count++;
    }
    print_r($total_indiv);

    $parc = 0;
    $panier = new panier();


    $ids = array_keys($_SESSION['panierjar']);
    sort($ids);
    $count_jardinage = count($ids);
    print_r($ids);
    for ( $i = 0 ; $i < $count_jardinage ; $i++){
    $_SESSION['panierjar'][$ids[ $parc ]] = $quantity[$i];
    // $panier->update_product_quantity_cart(  $ids[ $parc ]  , $q);
    $_SESSION['quantityjar'][ $ids[ $parc ] ] = $quantity[$i];
    $parc++;
    }
    $parc = 0;
    for ( $i = 0 ; $i < $count_jardinage ; $i++){
        $_SESSION['totalindivjar'][ $ids[ $parc ] ] = $total_indiv[$i];
        $parc++;
    }


    $ids = array_keys($_SESSION['panieraccess']);
    $count_access = count($ids);
    sort($ids);
    print_r($ids);
    $parc=0;
    for ( $i = $count_jardinage ; $i < $count_jardinage + $count_access ; $i++){
        $_SESSION['panieraccess'][$ids[ $parc ]] = $quantity[$i];
        $_SESSION['quantityaccess'][ $ids[ $parc ] ] = $quantity[$i];
        $parc++;
    }

    $parc=0;
    for ( $i = $count_jardinage ; $i < $count_jardinage + $count_access ; $i++){
        $_SESSION['totalindivaccess'][ $ids[ $parc ] ] = $total_indiv[$i];
        $parc++;
    }


    $ids = array_keys($_SESSION['panieraliment']);
    $count_aliment = count($ids);
    sort($ids);
    print_r($ids);
    $parc=0;
    for ( $i = $count_jardinage + $count_access ; $i < $count_jardinage + $count_access + $count_aliment ; $i++){
        $_SESSION['panieraliment'][$ids[ $parc ]] = $quantity[$i];
        $_SESSION['quantityaliment'][ $ids[ $parc ] ] = $quantity[$i];
        $parc++;
    }

    $parc=0;
    for (  $i = $count_jardinage + $count_access ; $i < $count_jardinage + $count_access + $count_aliment ; $i++){
        $_SESSION['totalindivaliment'][ $ids[ $parc ] ] = $total_indiv[$i];
        $parc++;
    }

    $_SESSION['total'][1] = $total;

    }

?>