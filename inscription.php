<?php   
    session_start();
    include("database.php");
    include("menu.php");
    global $db;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>

    <?php Menu(); ?>

    <form method="post">

        Nom <input type="text" name="Nom" id="Nom">
        Prenom <input type="text" name="Prenom">
        Pseudo <input type="text" name="Pseudo">
        Mots de passe <input type="password" name="Mdp">
        Mots de passe confirme <input type="password" name="Mdpconf">    
        <button type="submit" name="inscription">Envoyer</button>
    
    </form>

    <?php 
        if(!empty($_POST)){
            extract($_POST);
            $valid = true;
            if (isset($_POST['inscription'])){
                //on recuper le nom prenom pseudo mdp mdpconf du formulaire pour traiter
                $nom = $_POST['Nom'];
                $prenom = $_POST['Prenom'];
                $pseudo = $_POST['Pseudo'];
                $mdp =  $_POST['Mdp'];
                $mdpconf = $_POST['Mdpconf'];

                if(empty($nom)){
                    $valid = false;
                     echo "Le nom d' utilisateur ne peut pas être vide";
                }
                if(empty($prenom)){
                    $valid = false;
                    echo "Le prenom d' utilisateur ne peut pas être vide";
                }      
                if(empty($pseudo)){
                    $valid = false;
                    echo "Le pseudo d' utilisateur ne peut pas être vide";
                }else{
                    //verifier que le pseudo est disponible
                }
            }
        }

        //$q = $db->prepare("INSERT INTO `user`( `nom`, `prenom`, `pseudo`, `mdp`) VALUES (:nom,:prenom,:pseudo,:mdp)");
        //$q->execute([
        //    'nom' => '';
        //    'prenom' => '';
        //    'pseudo' => '';
        //    'mdp' => '';
        //])


    ?>
</body>
</html>