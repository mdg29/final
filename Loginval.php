<?php include 'header.php';  ?>
<?php
$valid = TRUE;
if ($valid) {
    $valid = TRUE;
    if (empty($email)) {
        echo "You must enter Email Address<br>";
        $valid = false;
    } elseif (strpos($email, '@') === false) {
        echo "The Email is Missing '@' !!  <br>";
        $valid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo " '$email' is Not a valid <br> ";
        $valid = false;
    }
    if (empty($pass)) {
        echo " You must enter Password!!<br>";
        $valid = false;
    } elseif (strlen($pass) < 8) {
        echo " Password must be at least 8 character !<br>";
        $valid = false;
    }
    return $valid;
}
?>

    

<?php include 'footer.php'; ?>