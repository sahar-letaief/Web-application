<?php
function ajouter_vue(){
    $fichier=dirname(__DIR__) . DIRECTORY_SEPARATOR . 'back' . DIRECTORY_SEPARATOR . 'compteur';
    if(file_exists($fichier)){
        $compteur=(int)file_get_contents($fichier);
        $compteur++;
        file_put_contents($fichier,$compteur);
    } 
    else{
       file_put_contents($fichier,'1');
    }

}
function nombre_vues() : string{
    $fichier=dirname(__DIR__) . DIRECTORY_SEPARATOR . 'back' . DIRECTORY_SEPARATOR . 'compteur' ;
    return file_get_contents($fichier);
}



?>
