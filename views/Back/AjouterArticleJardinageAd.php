
<?php

  include_once "../../config1.php";
    include "../../Model/articles jardinage.php";
    include "../../Controller/articles JardinageC.php";
    include "../../Model/categorie.php";
    include "../../Controller/categorieC.php";


$error = "";

// create user
$article = null;

// create an instance of the controller
$articleC = new articles_jardinageC();
if (
    //isset($_POST["IdArticle"]) &&
    isset($_POST["IdCategorieArticle"]) &&
    isset($_POST["NomArticle"]) &&
    isset($_POST["ImageArticle"]) &&
    isset($_POST["DescriptionArticle"]) &&
    isset($_POST["PrixArticle"]) &&
    isset ($_POST['QuantiteArticle']) 
) {
        $article = new articles_jardinage(
           // $_POST['IdArticle'],
            $_POST['IdCategorieArticle'],
            $_POST['NomArticle'],
            $_POST['ImageArticle'],
            $_POST['DescriptionArticle'],
            $_POST['PrixArticle'],
            $_POST['QuantiteArticle']
        );
        $articleC->AjouterArticleJardinage($article);
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
            <title> Ajouter article</title>

</head>

<body>


        <link rel="stylesheet" href="assets/css/ajouter.css">
        <div class="container">  
        <form id="AjoutArticle" method="post" name='MonForm' onsubmit="return valider()" >
            <h3>Ajouter un article de jardinage</h3>
            <h4>Ajouter un article de jardinage à la base de données</h4>
            <fieldset>
                <!--<input placeholder="Id de l'article" type="text" tabindex="1" name="IdArticle" id="IdArticle" >
            </fieldset>-->
            <fieldset>
                <label for="Id Categorie">Id categorie: </label>
                <select name="IdCategorieArticle" id="IdCategorieArticle" tabindex=1 placeholder="Selectionner un id">
                <option value="">--Choisissez un Id--</option>
                <?php
                 $cat=new categorieC();
                 $liste=$cat->afficherCategories();
                 foreach($liste as $aux){
                ?>
                <option><?php echo $aux['IdCategorie'];?></option>
                <?php
                }?>
                </select>
            </fieldset>
            <fieldset>
            <label for="NomArticle">Nom article: </label>
                <input placeholder="Nom article" type="text"  tabindex="3" name="NomArticle" id="NomArticle" >
            </fieldset>
            <fieldset>
            <label for="ImageArticle">Image Article: </label>
                <input placeholder="photo" type="file" tabindex="4" name="ImageArticle" accept="image/png, image/jpeg" id="ImageArticle" >
             </fieldset>
            <fieldset>
            <label for="Description">Description: </label>
                <textarea placeholder="Description de l'article" tabindex="5" name="DescriptionArticle" id="DescriptionArticle" pattern="[0-9a-zA-Z-\.]{0,12}"></textarea>
            </fieldset>
            <fieldset>
            <label for="PrixArticle">Prix Article: </label>
                <input placeholder="Prix de l'article" type="text" tabindex="6" name="PrixArticle" id="PrixArticle" >
            </fieldset>
            <fieldset>
            <label for="QuantiteArticle">Quantite Article: </label>
                <input placeholder="Quantite de l'article" type="text" tabindex="7" name="QuantiteArticle" id="QuantiteArticle" >
            </fieldset>
            <br><br>
            <fieldset>
            <p id="erreur"></p>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="submit" class="btn btn-warning" >Submit</button>
            </fieldset> 
            <fieldset>           
            <a href="AfficherBotaniqueAd.php" class="btn btn-warning">Cancel</a>
            </fieldset>           
            

        </form>

    </div>
   
    <SCRIPT LANGUAGE="JavaScript">
   
    function valider() 
    {
    //var IdCategorieArticle=window.document.MonForm.IdCategorieArticle.value;
    var NomArticle=window.document.MonForm.NomArticle.value;
    var DescriptionArticle=window.document.MonForm.DescriptionArticle.value;
    var PrixArticle=window.document.MonForm.PrixArticle.value;
    var QuantiteArticle=window.document.MonForm.QuantiteArticle.value;
       
        
        
    
    if((IdCategorieArticle=="") || (DescriptionArticle=="") || (PrixArticle=="") || (QuantiteArticle=="")||(NomArticle=="")){
        alert ("verifier les champs");
        return false; 
    } 
    if(NomArticle.charAt(0)<'A' || NomArticle.charAt(0)>'Z'){
        alert ("Le nom de l'article doit commencer par une lettre Majuscule");
        return false;
    }
    if(DescriptionArticle.charAt(0)<'A' || DescriptionArticle.charAt(0)>'Z'){
        alert ("La description de l'article doit commencer par une lettre Majuscule");
        return false;
    }
    if (DescriptionArticle.length<2){
      alert("Veuillez saisir une description");
      return false;
    }
    if(QuantiteArticle>10){
        alert("la quantite ne doit pas dépasser 10");
        return false;
    }
    if(isNaN(QuantiteArticle)){
        alert("la quantite de l'article doit etre un entier");
        return false;
    }
    if(isNaN(PrixArticle)){
        alert("le prix de l'article doit etre un entier");
        return false;
    }
          
   
    else return true;
}
</SCRIPT></body>
</HTMl>

