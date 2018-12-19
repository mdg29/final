<?php
session_start();
require "connection.php";

$email = $_SESSION['email'];

echo "<link rel='stylesheet' type='text/css' href='style.css'>";
    "<form action='newquestions.php' method = 'post'></form>";

$title= filter_input(INPUT_POST, 'title');
$body = filter_input(INPUT_POST, 'body');
// Add data to table

$query = "INSERT INTO questions (owneremail,title, body)
VALUES (:email,:title,:body)";




$statement = $db->prepare($query);
$statement->bindvalue(':email', $email);
$statement->bindValue(':title', $title);
$statement->bindValue(':body', $body);
$statement->execute();
$statement->closeCursor();

header("Location: https://web.njit.edu/~mdg29/IS218/hw1/1.php", true, 301);



