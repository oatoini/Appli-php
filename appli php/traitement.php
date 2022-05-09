<?php
/*Nous souhaitons enregistrer les produits en session sur le serveur. Et pour disposer d'une session : session_start(). */
        session_start();
        //Démarrer une session
        if (isset($_POST['submit'])){
        /* Nous vérifions alors l'existence de la clé "submit" dans le tableau $_POST, cette clé correspondant à l'attribut "name" du bouton <input type="submit" 
        name="submit"> du formulaire. La condition sera alors vraie seulement si la requête POST transmet bien une clé "submit" au serveur.*/
            $name= filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            /*On effectue une validation ou un nettoyage de chaque donnée transmise par le formulaire, avec filter_input ,en employant divers filtres
            Le filtre FILTER_SANITIZE_STRING supprime une chaîne de caractères de toute présence de caractères spéciaux et de toute balise HTML potentielle 
            ou les encode. Pas d'injection de code HTML possible !*/
            $price= filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            /*ce filtre validera le prix que s'il est un nombre à virgule (pas de texte ou autre…), le drapeau FILTER_FLAG_ALLOW_FRACTION est ajouté 
            pour permettre l'utilisation du caractère "," ou "." pour la décimale.*/
            $qtt= filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            /*ce filtre ne validera la quantité que si celle-ci est un nombre entier différent de zéro (qui est considéré comme nul).*/
            
            /*Il nous faut vérifier si les filtres ont tous fonctionné grâce à une nouvelle condition */
            if ($name && $price && $qtt){

            /*Sachant qu'un filtre renverra false ou null s'il échoue, et que nous ne pouvons pas anticiper la saisie de l'utilisateur à ce niveau, il suffit 
            de vérifier implicitement si chaque variable contient une valeur jugée positive par PHP. Voilà pourquoi la condition ne compare les variables à 
            rien de précis.*/

            /*Comme il est demandé de conserver chaque produit renseigné, nous allons construire pour chaque produit un tableau associatif $product*/
                $product=[
                    "name"=>$name,
                    "price"=>$price,
                    "qtt"=>$qtt,
                    "total"=>$price*$qtt
                ];
                //Il ne nous reste plus qu'à enregistrer ce produit nouvellement créé en session.
                $_SESSION['products'][]=$product; //$_SESSION permet de stocker des infos qui seront automatiquement transmises de page en page.
                /*On indique la clé "products" de ce tableau
                Les deux crochets "[]" sont un raccourci pour indiquer à cet emplacement que nous ajoutons une nouvelle entrée au 
                futur tableau "products" associé à cette clé.*/
            }
        }
        header("Location:index.php");
        ?>