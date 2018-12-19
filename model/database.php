<?php
$username = 'mdg29';
$password = 'pcrnAsxx';
$hostname = 'sql2.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo 'Error: '.$error_message;
    //include('../errors/database_error.php');
    exit();
}
?>


