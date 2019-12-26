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
    <form name="inscription" action="inscription.php" method="post">
        Nom <input type="text" name="pseudo">
        Prenom <input type="text" name="pseudo">
        Pseudo <input type="text" name="pseudo">
        Mots de passe <input type="password" name="myPassword">
        Mots de passe confirme <input type="password" name="myPasswordConfir">    
        <input type="submit" value="inscrire" />
    
    </form>

    <?php 

        
    
    ?>
</body>
</html>