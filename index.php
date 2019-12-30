<?php
    session_start();
    include("include/menu.php");
    include("include/database.php");
    $p = $db->prepare("SELECT * FROM user WHERE id_user = ?");
    $p->execute([$_SESSION['id']);
    $p = $p->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>

    <?php Menu(); ?>

</body>
</html>