<html>
<head>
<style>
        body {
            padding: 0px 20px;
        }
    </style>
</head>

<?php
// add a new user to the database. requires input from register_new_user.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db_connect.php";
$new_username = $_GET['username'];
$new_password1 = $_GET['password'];
$new_password2 = $_GET['password-confirm'];

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

echo "<h2>Trying to add a new user " . $new_username . " pw =  " . $new_password1 . " and " . $new_password2 . "</h2>";

// check to see if this username has already been registered.
$sql = "SELECT * FROM users WHERE user_name = '$new_username'";
$result = $conn->query($sql) or die(mysqli_error($conn));

if ($result->num_rows > 0) {
    echo "The username " . $new_username . " is already in use.  Try another.";
    echo "<br><br><a href='register_new_user.php'>Return to registration</a>";
    exit;
}

// check for minimum length
if(strlen($new_password1) < 8){
    echo "Passwords must be at least 8 characters! Please try again.";
    echo "<br><br><a href='register_new_user.php'>Return to registration</a>";
    exit;
}

// check for a number
preg_match('/[0-9]+/', $new_password1, $matches);
if(sizeof($matches) == 0){
    echo "Passwords must contain at least 1 number! Please try again.";
    echo "<br><br><a href='register_new_user.php'>Return to registration</a>";
    exit;
}

// check for a special character
preg_match('/[!@#$%^&*()]+/', $new_password1, $matches);
if(sizeof($matches) == 0){
    echo "Passwords must contain at least 1 special character!<br>Please try again using one or more of these: ! @ # $ % ^ & * ( )";
    echo "<br><br><a href='register_new_user.php'>Return to registration</a>";
    exit;
}

// check to see if the password fields match
if ($new_password1 != $new_password2) {
    echo "The passwords do not match. Please try again.";
    echo "<br><br><a href='register_new_user.php'>Return to registration</a>";
    exit;
}

// add the new user
$sql = "INSERT INTO users (user_id, user_name, users.password) VALUES (null, '$new_username', '$hashed_password')";
$result = $conn->query($sql) or die(mysqli_error($conn));
if ($result) {
    echo "Registration success!";
} else {
    echo "Something went wrong.  Not registered.";
}

echo "<a href = 'index.php'>Return to main</a>";
?>

</html>