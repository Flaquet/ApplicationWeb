<?php
session_start();
include("include/database.php");
include("include/menu.php");
if (!isset($_SESSION['id'])){
    header('Location: index.php'); 
    exit;
}
?>
<head><link rel="stylesheet" href="CSS/stylemenu.css"></head>
<?php Menu(); ?>
<form method="post">
    Supprimer le compte :<input type="radio" name="delete_utili">
    <input type="submit" name="delete" value="Supprimer" />
</form>
<?php

if (isset($_POST['delete'])){

    $pseudoo = $_SESSION['pseudo'];
    $delete = $db->prepare("DELETE FROM `user` WHERE `pseudo` = :pseudo");
    $delete->execute(['pseudo' => $pseudoo]); 
    echo "Votre compte a ete supprime !";
    session_destroy();
    header('Location: index.php'); 
    exit;
}
?>
