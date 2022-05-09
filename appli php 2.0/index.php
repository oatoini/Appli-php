<?php
    $ajout="Ajouter un produit";
    include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
       
        <title>Ajouter un produit</title>
    </head>

    <body>
            <h1>Ajouter un produit</h1>
            <form action="traitement.php?action=ajout" method="post"> 
<!-- Action indique la cible du formulaire, le fichier à atteindre lorsque l'utilisateur soumettra le formulaire -->
                <p>
<!-- Method précise par quelle méthode HTTP les données du formulaire seront transmises au serveur-->
                    <label>
                        Nom du produit : 
                        <input type="text" name="name" required> 
<!--On dispose d'un attribut "name", ce qui va permettre à la requête de classer le contenu de la saisie dans des clés portant le nom choisi.-->
                    </label>
                </p>
                <p>
                    <label>
                        Prix du produit : 
                        <input type="number" step="any" name="price" required> 
<!--Ici la requête va classer le contenu de la saisie dans la clé portant le nom price-->
                    </label>
                </p>
                <p>
                    <label>
                        Quantité désirée : 
                        <input type="number" name="qtt" value="1" required> 
<!--Ici la requête va classer le contenu de la saisie dans la clé portant le nom qtt-->
                    </label>
                </p>
                <p id="submit">
                    <input type="submit" name="submit" value="Ajouter le produit">
                </p>
            </form>
            <?php
                if (isset($_SESSION["products"]) || !empty($_SESSION["products"])) {
                    echo $_SESSION["error"];
                    $_SESSION["error"] = "";
                }
            ?>
    </body>
</html>