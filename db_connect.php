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
$conn = sqlsrv_connect("cst407.mysql.database.azure.com", array("cst407-jokes-app-database", "ymappqobfm", "jpq5Gkkt9oyxP1\$V") );


if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}

// ADDED AUTO SETUP FOR TABLES

// Check if tables exist, if not, create them
$jokesTableExists = false;
$usersTableExists = false;

$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'dbo' AND TABLE_NAME = 'jokes_table'";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt && sqlsrv_has_rows($stmt)) {
    $jokesTableExists = true;
}

$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'dbo' AND TABLE_NAME = 'users'";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt && sqlsrv_has_rows($stmt)) {
    $usersTableExists = true;
}

// Create tables if they don't exist
if (!$jokesTableExists) {
    $sql = "CREATE TABLE jokes_table (
              JokeID int NOT NULL PRIMARY KEY,
              Joke_question varchar(500) NOT NULL,
              Joke_answer varchar(500) NOT NULL,
              user_id char(100) NOT NULL
            )";
    $stmt = sqlsrv_query($conn, $sql);
    if (!$stmt) {
        die("Error creating jokes_table: " . sqlsrv_errors());
    }
}

if (!$usersTableExists) {
    $sql = "CREATE TABLE users (
              user_id int NOT NULL PRIMARY KEY,
              user_name text NOT NULL,
              password text NOT NULL,
              email_address text,
              admin_role tinyint DEFAULT NULL
            )";
    $stmt = sqlsrv_query($conn, $sql);
    if (!$stmt) {
        die("Error creating users table: " . sqlsrv_errors());
    }
}

echo $mysqli->host_info . "<br>";

?>