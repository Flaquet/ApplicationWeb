<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <form action="connexion.php" method="post">

        <input type="email" name="myEmailField">
        <input type="password" name="myPassword">  
        <button type="button" name="inscription" formtarget="_self">Inscription</button>    
    
    </form>
</body>
</html>