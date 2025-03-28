<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'evenements');

$dns = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

try{
    $db = new PDO($dns, DB_USER, DB_PASS,
    [
        'PDO::ATTR_ERRMODE' => PDO::ERRMODE_EXCEPTION,
        'PDO::ATTR_DEFAULT_FETCH_MODE' => PDO::FETCH_ASSOC,
    ]);

} catch (PDOException $e){
    die('Erreur lors de la connexion ' . $e->getMessage());
}

session_start();