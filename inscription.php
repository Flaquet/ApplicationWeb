<?php   
    session_start();
    include("include/database.php");
    include("include/menu.php");

    if (isset($_SESSION['id'])){
        echo "Vous ete deja inscript";
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
                header('Location: index.php');
                exit;
                }

            }
        }

    ?>
</body>
</html>