<?php
  include_once "../../config1.php";
  include "../../Model/categorie.php";
  include "../../Controller/categorieC.php";


$error = "";

$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();
if (
   // isset($_POST["IdCategorie"]) &&
    isset($_POST["NomCategorie"]) &&
    isset($_POST["Description"]) 
) {
        $categorie = new categorie(
           // $_POST['IdCategorie'],
            $_POST['NomCategorie'],
            $_POST['Description']
  
        );
        $categorieC-> AjouterCategorie($categorie);
       header('Location:AfficherBotaniqueAd.php');
    }
    else
        $error = "Missing information";

?>

<HTML>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <title>Ajouter Categorie</title>
        </head>
        <body>
        <link rel="stylesheet" href="assets/css/ajouter.css">
        <div class="container">  
          <form id="categorie" name="MonForm"  method="post" onsubmit="return valider()">
            <h3>Ajouter une categorie</h3>
            <h4>Ajouter une categorie à la base de donnees</h4>
            
            <!--<fieldset>
              <input placeholder="Id Categorie" type="text" tabindex="1" name="IdCategorie" id="IdCategorie" readonly>
            </fieldset>-->
            <fieldset>
            <label for="Nom Categorie">Nom categorie: </label>
              <input placeholder="Nom de la categorie" type="text" tabindex="2" name="NomCategorie" id="NomCategorie" >
            </fieldset>
            <fieldset>
            <label for="Description">Description: </label>
              <input placeholder="Description" type="text" tabindex="3" name="Description" id="Description">
            </fieldset>
            <fieldset>
              <button name="submit" type="submit" value="submit" id="categorie submit" class="btn btn-warning">Submit</button>
            </fieldset>
            <fieldset>
            <a href="AfficherBotaniqueAd.php" class="btn btn-warning">Cancel</a>
            </fieldset>
          </form >     
        </div>

    <SCRIPT LANGUAGE="JavaScript">
    function valider() 
    {
    var NomCategorie=window.document.MonForm.NomCategorie.value;
    var Description=window.document.MonForm.Description.value;
    if((NomCategorie=="") || (Description=="") ){
        alert ("verifier les champs");
        return false; 
    } 
    if(NomCategorie.charAt(0)<'A' || NomCategorie.charAt(0)>'Z'){
        alert ("Le nom de la categorie doit commencer par une lettre Majuscule");
        return false;
    }
    if (Description.length<2){
      alert("Veuillez saisir une description");
      return false;
    }
    if(Description.charAt(0)<'A' || Description.charAt(0)>'Z'){
        alert ("La description de la categorie doit commencer par une lettre Majuscule");
        return false;
    }
    else return true;
}
        
  </script>       
        
        </body>
        </HTMl>