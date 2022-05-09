<?php
/*recap.php devra nous permettre d'afficher de manière organisée et exhaustive la liste des produits présents en session. 
Elle doit également présenter le total de l'ensemble de ceux-ci. A la différence d'index.php, nous aurons besoin ici de 
parcourir le tableau de session, il est donc nécessaire d'appeler la fonction session_start() en début de fichier afin de récupérer, 
comme dit plus haut, la session correspondante à l'utilisateur.*/
    require "header.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Récapitulatif des produits</title>
    </head>

    <body>
        <?php 


/*Nous rajoutons une condition qui vérifie :
-Soit la clé "products" du tableau de session $_SESSION n'existe pas : !isset()
-Soit cette clé existe mais ne contient aucune donnée : empty()
Dans ces deux cas, nous afficherons à l'utilisateur un message le prévenant qu'aucun produit n'existe en session. Il ne nous reste plus 
qu'à afficher le contenu de $_SESSION['products'] dans la partie else de notre condition. */
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                echo "<p>Aucun produit en session...</p>";
            }else{
        echo "<table>",
            "<thead>",
                "<tr>",
                    "<th>#</th>",
                    "<th>Nom</th>",
                    "<th>Prix</th>",
                    "<th>Quantité</th>",
                    "<th>Total</th>",
                "</tr>",
            "</thead>",
            "<tbody>";  
/*De else{ à <tbody>, nous trouvons les balises HTML initialisant correctement un tableau HTML avec une ligne d'en-têtes <thead>, afin de bien décomposer les 
données de chaque produit.*/
                $totalGeneral = 0; //Dans un premier temps, avant la boucle, on initialise une nouvelle variable $totalGeneral à zéro.
                foreach($_SESSION['products'] as $index => $product){
/*la boucle itérative foreach() de PHP, est particulièrement efficace pour exécuter, produit par produit, les mêmes instructions qui vont permettre l'affichage 
uniforme de chacun d'entre eux. Pour chaque donnée dans $_SESSION['products'], nous disposerons au sein de la boucle de deux variables :
- $index : aura pour valeur l'index du tableau $_SESSION['products'] parcouru. Nous pourrons numéroter ainsi chaque produit avec ce numéro dans le tableau HTML 
(en première colonne).
- $product : cette variable contiendra le produit, sous forme de tableau, tel que l'a créé et stocké en session le fichier traitement.php.*/
                    echo "<tr class='tableau'>",
                            "<td>".$index."</td>",
                            "<td class=product>".$product['name']."</td>", 
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."€</td>",
/*La fonction PHP number_format() permet de modifier l'affichage d'une valeur numérique en précisant plusieurs paramètres :
number_format(
    variable à modifier,
    nombre de décimales souhaité,
    caractère séparateur décimal,
    caractère séparateur de milliers
);*/
                            "<td><a href='traitement.php?action=moins&id=$index'><button class=button><i class='fa-solid fa-circle-minus'></i></i></button></a>"
.$product['qtt']."<a href='traitement.php?action=plus&id=$index'><button class=button><i class='fa-solid fa-circle-plus'></i></button></a></td>",
                            "<td class=total>".number_format($product['total'], 2, ",", "&nbsp;")."€</td>",
                            "<td><a class='supprimer' href='traitement.php?action=supprimer&id=".$index."'>Supprimer</a></td>",
                        "</tr>";
//La boucle créera alors une ligne <tr> et toutes les cellules <td> nécessaires à chaque partie du produit à afficher, et ce pour chaque produit présent en session.
                    $totalGeneral+=$product['total'];
//Grâce à l'opérateur combiné +=, on ajoute le total du produit parcouru à la valeur de $totalGeneral, qui augmente d'autant pour chaque produit.
                }
            echo    "<tr>",
                        "<td colspan=4>Total générale : </td>",
                        "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                        "<td><a class='supprimer' href='traitement.php?action=suppression&id=".$index."'>Supprimer total</a></td>",
                    "</tr>",
/*Une fois la boucle terminée, nous affichons une dernière ligne avant de refermer notre tableau. Cette ligne contient deux cellules : 
une cellule fusionnée de 4 cellules (colspan=4) pour l'intitulé, et une cellule affichant le contenu formaté de $totalGeneral avec number_format(). */
                "</tbody>",
                "</table>";
            
            }
        ?>
        
    </body>
</html>