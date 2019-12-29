<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=applicationweb', 'root', '');

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
