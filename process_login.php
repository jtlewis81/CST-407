<html>

<head>
<style>
        body {
            padding: 0px 20px;
        }
    </style>
</head>

<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

echo "<h2>You attempted to login with " . $username . " and " . $password . "</h2>";

$stmt = $mysqli->prepare("SELECT users.user_id, users.user_name, users.password FROM users WHERE users.user_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($userid, $fetched_name, $fetched_pass);

if ($stmt->num_rows == 1) {
    echo "Found 1 person with that username<br>";
    $stmt->fetch();
    if (password_verify($password, $fetched_pass)){
        echo "Password match!<br>Login success!<br><br>";
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
    }
    else {
        $_SESSION = [];
        session_destroy();
        echo "Login failed!<br>";
    }
} else {
    $_SESSION = [];
    session_destroy();
echo "Login failed!<br>";
}


echo "Session variable = ";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<br><a href='index.php'>Return to main page</a>";

?>

</html>