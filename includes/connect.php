<?php
try
{
$pdo = new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_503a03e10b4d793',
'DB_USERNAME', 'DB_PASSWORD');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
$error = 'Unable to connect to the database server.';
include 'error.html.php';
exit();
}


