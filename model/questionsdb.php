<?php
function get_products_by_category($owneremail) {
    global $db;
    $query = 'SELECT * FROM questions
              WHERE questions.owneremail = :owneremail';


    $statement = $db->prepare($query);
    $statement->bindValue(":owneremail", $owneremail);
    $statement->execute();
    $questions = $statement->fetchAll();
    $statement->closeCursor();
    return $questions;
}
function deleteQuestion($id) {
    global $db;
    $query = "DELETE FROM questions WHERE id = '$id'";
    $statement = $db->prepare($query);
    //$statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

{
    function addquestion($title,$body)
    {
        global $db;
        $query = "INSERT INTO questions ( body, skill,)
VALUES (:question_name,:body_name)";

        $statement = $db->prepare($query);

        $statement->bindValue(':question_name', $question_name);
        $statement->bindValue(':body_name', $body_name);
        $statement->execute();
        $statement->closeCursor();
    }
}
        

