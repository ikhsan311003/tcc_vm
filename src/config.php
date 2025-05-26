<?php
$host = 'db';
$db = 'notesdb';
$user = 'root';
$pass = 'root';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $user, $pass, $options);
?>
