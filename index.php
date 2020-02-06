<?php
session_start();
include("include/menu.php");
include("include/database.php");
include("user.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/stylemenu.css">
    <link rel="stylesheet" href="CSS/styleindex.css">
    <title>Index</title>
</head>

<body>
<script src="js/in.js"></script>

    <?php Menu(); ?>
    <div class="test">
        <p> Bonjour et bienvenue sur le site permettant d'effectuer
            des votes pour des Skins du Jeu Vidéo Fortnite Battle Royal
        </p>

        <figure>
            <img onclick="changtext()" src="IMG/banniere.png" srcset="" alt="" />
        </figure>
        </li>
    </div>

    <div id="root"> Cliquer sur l'image svp </div>
    <input type="button" onclick="getRandom()" value="oki">
    <div id="pp">..</div>
    <div name="test"> 1 </div>
    <div name="test"> 2 </div>
    <div name="test"> 3 </div>


    <?php
    $DonneeBruteUser = $db->query("select * from user");
    $TabUserIndex = 0;

    while ($tab = $DonneeBruteUser->fetch()) {
        //ici on creer nos objets User pour chaque tuple de notre requête
        //et on les places dans un tableau de User
        $TabUser[$TabUserIndex++] = new User($tab["id_user"], $tab["pseudo"]);
    }
    ?>
    <h1>Liste deroulante</h1>
    <FORM action="" methode="GET">
        <select name="user" id="pet-select">
        <option value="0"> Choix du User </option>
            <?php
            //parcours du tableau de User pour afficher les options de la liste déroulante
            foreach ($TabUser as $objetUser) {
                echo '<option value="' . $objetUser->getId() . '">' . $objetUser->getNom() . '</option>';
            }
            ?>
        </select>
        <input type="submit"></input>
    </FORM>

    <?php

    if (isset($_GET["user"])) {
        //recherche de l'id dans le tableau de user
        foreach ($TabUser as $objetUser) {
            if ($objetUser->getId() == $_GET["user"]) {
                $objetUser->afficherUser();
            }
        }
    } else {
        echo "Aucun user selectionné";
    }
    ?>
    <h1>CheckBox</h1>
    <FORM action="" method="POST">
        <p>Qui Supprimer ?</p>
        <?php
        //parcours du tableau de User pour
        //afficher les options de la liste déroulante

        foreach ($TabUser as $objetUser) {
            echo '<p><input
    type="checkbox" value="' . $objetUser->getId() . '" name="users[]" />';
            echo '<label for="coding">' .
                $objetUser->getNom() . ' </label></p>';
        }
        ?>
        <input type="submit"></input>
    </FORM>

    <?php if (isset($_POST["users"])) {
        foreach ($_POST['users'] as $idUser) {
            // $idUser correspondra à value de checkboxe checké
            // reste plus qu'a faire une requete update ou insert ou delete
            //ici on va rechercher id dans le tableau de user
            $j = 0;
            foreach ($TabUser as $objetUser) {
                if ($objetUser->getId() == $idUser) {
                    $objetUser->deleteUser();
                    //j'en profite pour le retirer de mon tableau. car il sera supprimé à l'affichage
                    unset($TabUser[$j]);
                }
                $j++;
            }
        }
    }
    ?>
</body>

</html>