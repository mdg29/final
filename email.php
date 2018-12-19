

<?php
session_start();
include ('header.php');

echo "<link rel='stylesheet' type='text/css' href='style.css'>";


require "connection.php";
    $Password = filter_input(INPUT_POST,'Password');
    $Email_name = filter_input(INPUT_POST,'email');
    $valid =false;
echo "<h2> $greetings  $fname $lname </h2>";

if (empty($Email_name)) {
    echo  'You Must enter a Email Value <br>';
}
 if (strpos($Email_name, '@') !== FALSE) {
    echo "<p>Welcome </p><br>";
}
elseif (strpos($Email_name,'@')==False )
{echo 'Error enter @ <br>';}

    if (empty($Password)){
        echo $message = 'Error must Valid Password';
    }

else if (strlen($Password) < 2) {
    echo $message ='Length Error Must Contain at Least 8 values';
}else {
$valid=false;
    $_SESSION['email'] = $Email_name;

// TODO: RUN SELECT for Account with Email and Password
    $query = "SELECT *
          FROM accounts
          WHERE email='$Email_name' and password ='$Password' ";
    $statement = $db->prepare($query);
    $statement->execute();

    if ($statement->rowCount() > 0) {
            // display user question
        $query = 'SELECT body, title
        FROM questions
    where owneremail = :owneremail';
        $statement = $db->prepare($query);



        $statement->bindValue(':owneremail', $Email_name);
        $statement->execute();
        $questions = $statement->fetchAll();
        $body = $questions[0] ['title'];
        $body = $questions[0]['body'];
        $statement->closeCursor();

        foreach ($questions as $questions){
            $counter++;
            $item[number];

            echo" <center><h1>Questions</h1>". $questions['title'];
            echo "<h1>Body</h1> ".$questions['body'];
            echo "<h1>Skills</h1> ".$questions['skills'];

        }

        echo " <center><hn><form action='addquestion.php' method = \"post\">    <input type='submit' value='New Question'> </center></form>";
        echo " <center><hn><form action='1.php' method = \"post\">    <input type='submit' value='Home Page'> </center></form>";





    } else {
        echo 'no users found';
    }
    $statement->closeCursor();


}
 if ( $action == 'logout'){
    include('logout.php');
}
include ('footer.php');