<?php
session_start();
include("include/menu.php");
include("include/database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VoteSKIN</title>
    <link rel="stylesheet" href="CSS/voteskin.css">
    <link rel="stylesheet" href="CSS/stylemenu.css">
</head>

<body>
    <?php Menu();
    ?>
    <section class="container">
        <div class="push-card__content">
            <h1>Vote</h1>

        </div>
    </section>
    <section class="container">
        <form method="post">
            <div class="container--thicker">
                <ul class="galery">

                    <li>

                        <figure>
                            <img src="IMG/chevaleresse.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="chevaleresse" value="1">

                    </li>
                    <li>

                        <figure>
                            <img src="IMG/epice.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="epice" value="2">

                    </li>
                    <li>

                        <figure>
                            <img src="IMG/goule.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="goule" value="3">

                    </li>
                    <li>
                        <figure>
                            <img src="IMG/joueuse.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="joueuse" value="4">

                    </li>
                    <li>

                        <figure>
                            <img src="IMG/ikonik.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="ikonik" value="5">


                    </li>

                    <li>

                        <figure>
                            <img src="IMG/lapin.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="lapin" value="6">
                    </li>
                    <li>

                        <figure>
                            <img src="IMG/Dynamo.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="Dynamo" value="7">

                    </li>


                </ul>
            </div>
            <div class="container--thicker">
                <ul class="galery">
                    <li>
                        <input type="submit" value="Voter !" name="valider">
                    </li>
                </ul>
            </div>
        </form>
    </section>

    <?php

    if (isset($_POST["valider"])) {
        if (!isset($_SESSION['id'])) {
            header('Location: connexion.php');
            exit;
        }
        $chevaleresse = $_POST["chevaleresse"];
        $epice = $_POST["epice"];
        $goule = $_POST["goule"];
        $joueuse = $_POST["joueuse"];
        $ikonik = $_POST["ikonik"];
        $lapin = $_POST["lapin"];
        $Dynamo = $_POST["Dynamo"];


        if (!empty($chevaleresse)) {

            echo "Chevaleresse Rouge";
        } else {
        }
        if (!empty($epice)) {

            echo "Soldat d'épice";
        } else {
        }
        if (!empty($goule)) {

            echo "Soldat Goule";
        } else {
        }
        if (!empty($joueuse)) {

            echo "Joueuse Décisive";
        } else {
        }

        if (!empty($ikonik)) {

            echo "I.K.O.N.E";
        } else {
        }

        if (!empty($lapin)) {

            echo "Lapinette Bagarreuse";
        } else {
        }
        if (!empty($Dynamo)) {

            echo "Dynamo";
        } else {
        }
    }

    ?>
    <?php


    $nom = htmlspecialchars($_GET['nom']);
    if ($vote == 1) {
        $reponse = $db->prepare("UPDATE appli SET vote = 1 WHERE nom = '$chevaleresse'");
    } elseif ($vote == 2) {
        $reponse = $db->prepare("UPDATE appli SET vote = 2 WHERE nom = '$epice'");
    } elseif ($vote == 3) {
        $reponse = $db->prepare("UPDATE appli SET vote = 3 WHERE nom = '$goule'");
    } elseif ($vote == 4) {
        $reponse = $db->prepare("UPDATE appli SET vote = 4 WHERE nom = '$joueuse'");
    } elseif ($vote == 5) {
        $reponse = $db->prepare("UPDATE appli SET vote = 5 WHERE nom = '$ikonik'");
    } elseif ($vote == 6) {
        $reponse = $db->prepare("UPDATE appli SET vote = 6 WHERE nom = '$lapin'");
    } elseif ($vote == 7) {
        $reponse = $db->prepare("UPDATE appli SET vote = 7 WHERE nom = '$Dynamo'");
    } else {
        echo "choissisez une valeur avant de voter";
    }
    ?>

</body>

</html>