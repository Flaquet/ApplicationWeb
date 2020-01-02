<?php session_start(); 
    include("include/database.php");
    if (isset($_SESSION['id'])){
        header('Location: index.php'); 
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/stylemenu.css">
</head>
<body>

    <form method="post">
        Pseudo <input type="text" name="Pseudo">
        Mots de passe <input type="password" name="Mdp">
        <button type="submit" name="connection">Envoyer</button>
    </form>
    <?php

        if(!empty($_POST)){
            $valid = true;
            if(isset($_POST['connection'])){

                $pseudo = $_POST['Pseudo'];
                $mdp = $_POST['Mdp'];

                if(empty($pseudo)){
                    $valid = false;
                    echo "Il y a pas de pseudo.";
                }
                if(empty($mdp)){
                    $valid = false;
                    echo "il y a pas de mdp.";
                }

                
                $verif = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
                $verif->execute([
                    'pseudo' => $pseudo,
                ]);
                $verif = $verif->fetch();

                $hashmdp = password_verify($mdp, $verif['mdp']);
                
                if($verif['pseudo'] == ""){
                    $valid = false;
                    echo "Le pseudo est incorrecte";
                }
                if($hashmdp){
                    $valid = true;
                    echo 'Le mot de passe est valide !';
                } else {
                    $valid = false;
                    echo 'Le mot de passe est invalide.';
                }

                if($valid){

                    $_SESSION['id'] = $verif['id_user'];
                    $_SESSION['nom'] = $verif['nom'];
                    $_SESSION['prenom'] = $verif['prenom'];
                    $_SESSION['pseudo'] = $verif['pseudo'];

                    header('Location:  index.php');
                    exit;
                }
            }
        }
    ?>
</body>
</html>
