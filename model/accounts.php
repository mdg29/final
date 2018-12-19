<?php
function check_login($Email_name, $Password )
{
    global $db;

    $query = "SELECT *
          FROM accounts
          WHERE email='$Email_name' and password ='$Password'  ";
    $statement = $db->prepare($query);
    $statement->execute();


    $User = $statement->fetch();
    $statement->closeCursor();
    return $User;
}
function check_login_name($Email_name)
{
    global $db;
    $query = 'SELECT * FROM accounts
              WHERE owneremail= :Email_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':Email_name', $Email_name);
    $statement->execute();
    $accounts = $statement->fetch();
    $statement->closeCursor();
    $Email_name = $accounts['email'];
    return $Email_name;
}