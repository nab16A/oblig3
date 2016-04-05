<?php

require('myDB.php');
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e)
{
    printf($e->getMessage());
}