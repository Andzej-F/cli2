<?php

$host = 'localhost';
$user = 'root';
$passwd = '';
$pdo = NULL;

$dsn = 'mysql:host=' . $host;

try {
    $pdo = new PDO($dsn, $user,  $passwd);

    $query = file_get_contents("init.sql");
    $pdo->exec($query);
    echo "\nDatabase 'cli2' created successfully\n";

    /* Enable exceptions on errors */
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    /* If there is an error an exception is thrown */
    echo 'Database connection failed<br>';
    echo 'Error number: ' . $e->getCode() . '<br>';
    echo 'Error message: ' . $e->getMessage() . '<br>';
    exit();
}
