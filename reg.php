<?php
session_start();
require "connection.php";

    $first_name = filter_input(INPUT_POST, 'first');
    $Last_name = filter_input(INPUT_POST, 'Last');
    $Birthday_name = filter_input(INPUT_POST, 'Birthday');
    $Email_name = filter_input(INPUT_POST, 'Email');
    $Password_name = filter_input(INPUT_POST, 'Password');
    if(empty($first_name)) {
        echo 'You Must Enter a Name<br>';

    }
    if(empty($Last_name)) {
    echo 'You Must Enter a Last Name<br>';
}
    if(empty($Birthday_name)) {
    echo 'You Must Enter a DOB<br>';
}
    if(empty($Email_name)) {
    echo 'You Must Enter an Email<br>';
}
    elseif (strpos($Email_name,'@')==False )
    {echo 'Error enter @ <br>';}

    if(empty($Password_name)) {
    echo 'You Must Enter a Password<br>';
}
    else echo 'Complete';

    // Add data to table

    $query = "INSERT INTO accounts ( email, fname , lname, birthday, password)
VALUES (:Email_name,:first_name,:Last_name,:Birthday_name,:Password_name)";


    $statement = $db->prepare($query);

    $statement->bindValue(':Email_name', $Email_name);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':Last_name', $Last_name);
    $statement->bindValue(':Birthday_name', $Birthday_name);
    $statement->bindValue(':Password_name', $Password_name);
    $statement->execute();
    $statement->closeCursor();

    //display from name
    $query = " SELECT fname,lname
          FROM accounts
    where email = :Email_name";
        $statement = $db->prepare($query);

    $statement->bindValue(':Email_name', $Email_name);
    $statement->execute();
    $accounts = $statement -> fetch();
    $statement->closeCursor();
    $name = $accounts['fname'];
    $lname = $accounts['lname'];
    echo $name;
    echo $lname;

?>






