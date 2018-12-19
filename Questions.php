<?php
session_start();
echo "<link rel='stylesheet' type='text/css' href='style.css'>";
require "connection.php";
$question_name = filter_input(INPUT_POST,'question');
$body_name = filter_input(INPUT_POST,'body');



    if(empty($question_name)) {
     echo 'You Must Enter a Question<br>';
    }
if (strlen($question_name) < 3) {
    echo $message = 'Length Error Must Contain at Least 3 Characters';
}
    if(empty($body_name)) {
    echo 'You Must Enter a Answer<br>';
    }
    if (strlen($body_name) < 5) {
        echo $message = 'Length Error Must Contain at Least 500 Characters';
    }
    else echo 'Complete';

// Add data to table
$query = "INSERT INTO questions ( body, skill,)
VALUES (:question_name,:body_name)";

$statement = $db->prepare($query);

$statement->bindValue(':question_name', $question_name);
$statement->bindValue(':body_name', $body_name);
$statement->execute();
$statement->closeCursor();






?>