<?php
$username = 'mdg29';
$password = 'pcrnAsxx';
$hostname = 'sql.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";
try {
    $db = new PDO($dsn, $username, $password);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();



}




