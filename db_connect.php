<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your database server.
//$host = "localhost";
$host = "cst407.mysql.database.azure.com";
$port = "3306";
//$username = "root";
$username = "ymappqobfm";
//$user_pass = "root";
$user_pass = "jpq5Gkkt9oyxP1\$V";
//$database_in_use = "jokesdb";
$database_in_use = "cst407-jokes-app-database";

$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
//$con = mysqli_init();
//mysqli_ssl_set($con,NULL,NULL, NULL, NULL, NULL);
//$mysqli = mysqli_real_connect($con, "cst407.mysql.database.azure.com", "ymappqobfm", "jpq5Gkkt9oyxP1\$V", "cst407-jokes-app-database", 3306, MYSQLI_CLIENT_SSL);

// $mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

?>