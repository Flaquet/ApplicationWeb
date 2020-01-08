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
    Supprimer le compte :<input type="radio" name="username_delete">
    <input type="submit" name="delete" value="Delete User" />
</form>
<?php

if (isset($_POST['delete'])){

    $pseudoo = $_SESSION['pseudo'];
    $delete = $db->prepare("DELETE FROM `user` WHERE `pseudo` = :pseudo");
    $delete->execute(['pseudo' => $pseudoo]); 
    echo "Vottre compte a etait suprimer !";
    header('Location: index.php'); 
    exit;
}
?>
