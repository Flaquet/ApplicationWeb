
<?php
session_start();
include("include/menu.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                        <input type="radio" name="chevaleresse" value="chevaleresse">

                    </li>
                    <li>

                        <figure>
                            <img src="IMG/epice.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="epice" value="epice">

                    </li>
                    <li>

                        <figure>
                            <img src="IMG/goule.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="goule" value="goule">

                    </li>
                    <li>
                        <figure>
                            <img src="IMG/joueuse.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="joueuse" value="joueuse">

                    </li>
                    <li>

                        <figure>
                            <img src="IMG/ikonik.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="ikonik" value="ikonik">


                    </li>

                    <li>

                        <figure>
                            <img src="IMG/lapin.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="lapin" value="lapin">
                    </li>
                    <li>

                        <figure>
                            <img src="IMG/Dynamo.png" srcset="" alt="" />
                        </figure>
                        <span></span>
                        <input type="radio" name="Dynamo" value="Dynamo">

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

        if(isset($_POST["valider"])){
            if (!isset($_SESSION['id'])){
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

            
            if(!empty($chevaleresse)){

                echo "Chevaleresse Rouge";

            }else{

            }
            if(!empty($epice)){

                echo "Soldat d'épice";
            }else{

            }
            if(!empty($goule)){

                echo "Soldat Goule";
            }else{

            }
            if(!empty($joueuse)){

                echo "Joueuse Décisive";
            }else{

            }
        
            if(!empty($ikonik)){

                echo "I.K.O.N.E";
            }else{

            }

            if(!empty($lapin)){

                echo "Lapinette Bagarreuse";
            }else{

            }
            if(!empty($Dynamo)){

                echo "Dynamo";
            }else{
        }
        }

    ?>

</body>

</html>

