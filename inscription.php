<?php   
    session_start();
    include("include/database.php");
    include("include/menu.php");

    if (isset($_SESSION['id'])){
        header('Location: index.php'); 
        exit;
    }

    global $db;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
    <link rel="stylesheet" href="CSS/stylemenu.css">
    <link rel="stylesheet" href="CSS/inscription.css">
</head>
<body>

    <?php Menu(); ?>
    <div id="registration">
    <h2>Inscription</h2>
        <form method="post">
        <fieldset>
            <div><label for="Nom">Nom</label> <input type="text" name="Nom" id="Nom" value="Nom"></div>
            <div><label for="Prenom">Prenom</label> <input type="text" name="Prenom" value=""></div>
            <div><label for="Pseudo">Pseudo</label> <input type="text" name="Pseudo" value=""></div>
            <div><label for="Mdp">Mots de passe</label> <input type="password" name="Mdp" value=""></div>
            <div><label for="Mdpconf">Confirmée</label> <input type="password" name="Mdpconf" value=""></div>  
            <div><button type="submit" name="inscription">Envoyer</button></div>
        </fieldset>
        </form>
    </div>
    <?php 
        if(!empty($_POST)){
            
            $valid = true;
            if (isset($_POST['inscription'])){
                //on recuper le nom prenom pseudo mdp mdpconf du formulaire pour traiter
                $nom = $_POST['Nom'];
                $prenom = $_POST['Prenom'];
                $pseudo = $_POST['Pseudo'];
                $mdp = $_POST['Mdp'];
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
                    $ps = $db->prepare("SELECT `pseudo` FROM `user` WHERE `pseudo` = :pseudo");
                    $ps->execute(['pseudo' => $pseudo]);           
                    $ps = $ps->fetch();
                    
                    if ($ps['pseudo'] <> ""){
                        $valid = false;
                        echo "Ce pseudo existe déjà";
                    }

                }

                if(empty($mdp)) {
                    $valid = false;
                    echo "Le mot de passe ne peut pas être vide";
     
                }else if($mdp != $mdpconf){
                    $valid = false;
                    echo "La confirmation du mot de passe ne correspond pas";
                }

                if($valid){
                    //protection du mdp crytage 
                    $hashmdp = password_hash($mdp, PASSWORD_DEFAULT);

                    $q = $db->prepare("INSERT INTO `user`( `nom`, `prenom`, `pseudo`, `mdp`) VALUES (:nom,:prenom,:pseudo,:mdp)");
                    $q->execute([
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'pseudo' => $pseudo,
                        'mdp' => $hashmdp,
                ]);

                header('Location: connexion.php');
                exit;
                }

            }
        }

    ?>
</body>
</html>