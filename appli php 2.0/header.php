<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"

integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="

crossorigin="anonymous"

referrerpolicy="no-referrer" />
    <title><?=$ajout?></title>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">Ajouter un produit</a></li>
            <li><a href="recap.php">Récapitulatif</a></li>
            <li><?php 
                if (!isset ($_SESSION['products']) || empty($_SESSION['products'])){ 
/*SI (la session « products » est indéfinie) ou (la session products est vide) ALORS {On veut veut retourner un booléen faux donc SI FAUX SINON VRAI*/
                    echo "0";   
/*Afficher « 0 » ;	    c’est-à-dire dans <li> < ?php ?> enregistré </li>*/
                }else{
                    echo count($_SESSION['products']);  
/*SINON afficher le total du nb d’éléments dans (la session « products »);*/
                }                    
/*Isset() permet de vérifier si une variable est définie ou non.
Empty() détermine si une variable est vide, mais sert aussi à valider des champs.*/
            ?>Enregistré</li>
        </ul>
    </header>
</body>
</html>