<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your database server.
//$host = "localhost";
//$port = "3306";
//$username = "root";
//$user_pass = "root";
//$database_in_use = "jokesdb";

$con = mysqli_init();
//mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
mysqli_ssl_set($con,NULL,NULL, NULL, NULL, NULL);
mysqli_real_connect($conn, "cst407.mysql.database.azure.com", "ymappqobfm", "jpq5Gkkt9oyxP1\$V", "cst407-jokes-app-database", 3306, MYSQLI_CLIENT_SSL);

// $mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
// if ($mysqli->connect_error) {
//     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }
// echo $mysqli->host_info . "<br>";

?>