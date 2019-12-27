<?php   
    session_start();
    include("database.php");
    include("menu.php");
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

    <?php
    echo'
    <form name="inscription" action="inscription.php" method="post">

        Nom <input type="text" name="Nom">
        Prenom <input type="text" name="Prenom">
        Pseudo <input type="text" name="pseudo">
        Mots de passe <input type="password" name="myPassword">
        Mots de passe confirme <input type="password" name="myPasswordConfir">    
        <input type="submit" value="inscrire" />
    
    </form>';
    ?>
    <?php 

        $pseudo_erreur1 = NULL;
        $pseudo_erreur2 = NULL;
        $mdp_erreur = NULL;
        $i = 0;
        $pseudo=$_POST['pseudo'];
        $pass = md5($_POST['myPassword']);
        $confirm = md5($_POST['myPasswordConfir']);

        $query=$db->prepare('SELECT COUNT(*) AS nbr FROM user WHERE pseudo =:pseudo');
        $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
        $query->execute();
        $pseudo_free=($query->fetchColumn()==0)?1:0;
        $query->CloseCursor();
        if(!$pseudo_free){

            $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
            $i++;

        }

        if ($pass != $confirm || empty($confirm) || empty($pass)){

            $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
            $i++;

        }

    ?>
</body>
</html>