
<?php
include ('header');
require('model/database.php');
require('model/accounts.php');
require('model/questionsdb.php');
require('connection.php');
require('email.php');
require('inputquestions.php');
require('Questions.php');
require('reg.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'displaylogin';
    }
}

if ( $action == 'displaylogin'){
    include('1.php');
}

else if ($action == 'login')
{
    $Password = filter_input(INPUT_POST, 'Password');
    $Email_name = filter_input(INPUT_POST, 'email');
    $valid = false;

    if (empty($Email_name)) {
        echo 'You Must enter a Email Value <br>';
    }
    if (strpos($Email_name, '@') !== FALSE) {
        echo "<p>Welcome </p><br>";
    } elseif (strpos($Email_name, '@') == False) {
        echo 'Error enter @ <br>';
    }

    if (empty($Password)) {
        echo $message = 'Error must Valid Password';
    } else if (strlen($Password) < 2) {
        echo $message = 'Length Error Must Contain at Least 8 values';
    } else {
        $valid = false;
        $_SESSION['email'] = $Email_name;
        $check_login = $check_login($Email_name, $Password);
        if (empty($check_login)) {
            header('Location: .$action=displaylogin');
        } else {
            header('Location: .$action=display_questions');
        }
    }
}
else if ($action == 'display_reg')
   {
include ('reg.php');
   }




else if ($action == 'display_questions')
{
include ('displayquestion.php');

}
else if ($action == 'addquestion')
{
include ('addquestion');
    $statement = $db->prepare($query);

    $statement->bindValue(':question_name', $question_name);
    $statement->bindValue(':body_name', $body_name);
    $statement->execute();
    $statement->closeCursor();
}

else if ($action == 'editQuestion') {
    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $dataFromQuestions = dataFromQuestionsById ($id);
    if ($id == NULL || $id == FALSE ) {
        $error = "Missing or incorrect product id or category id.";
    } else {
        include('editquestion');
    }
}
else if ($action == 'delete_question') {
    function delete_product($product_id)
    {
        global $db;
        $query = 'DELETE FROM products
              WHERE productID = :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    }

}
// LOGOUT
else if ( $action == 'logout'){
    include('logout.php');
}
?>

