<?php include 'header.php';  ?>

<?php
session_start();
session_destroy();
$message =  '<h2 style="color: red; text-align: center ">You have been logged out. Redirecting to Login page...<h2><br>';
        $target = ".";
        redirect ($message, $target);
        exit();
?>