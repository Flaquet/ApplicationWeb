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
        Prenom <input type="text" name="Prenom" id="Prenom">
        Pseudo <input type="text" name="pseudo" id="pseudo">
        Mots de passe <input type="password" name="myPassword" id="myPassword">
        Mots de passe confirme <input type="password" name="myPasswordConfir" id="myPasswordConfir">    
        <input type="submit" value="inscrire" />
    
    </form>

    <?php 

        $pseudo_erreur1 = NULL;
        $pseudo_erreur2 = NULL;
        $mdp_erreur = NULL;

        $q = $db->prepare("INSERT INTO `user`( `nom`, `prenom`, `pseudo`, `mdp`) VALUES (:nom,:prenom,:pseudo,:mdp)");
        $q->execute([
            'nom' => '';
            'prenom' => '';
            'pseudo' => '';
            'mdp' => '';
        ])


    ?>
</body>
</html>