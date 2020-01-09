<?php
try
{
$db = new PDO('mysql:host=192.168.65.192;dbname=applicationweb', 'applicationweb', 'applicationweb');

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
