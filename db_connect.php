<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your database server.
//$host = "localhost";
$host = 'cst407.mysql.database.azure.com';
$port = '3306';
//$username = "root";
$username = 'ymappqobfm';
//$user_pass = "root";
$user_pass = 'jpq5Gkkt9oyxP1$V';
//$database_in_use = "jokesdb";
$database_in_use = 'cst407-jokes-app-database';

$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}

// ADDED AUTO SETUP FOR TABLES

// Check connection
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if tables exist, if not, create them
$jokesTableExists = false;
$usersTableExists = false;

$sql = "SHOW TABLES LIKE 'jokes_table'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $jokesTableExists = true;
}

$sql = "SHOW TABLES LIKE 'users'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $usersTableExists = true;
}

// Create tables if they don't exist
if (!$jokesTableExists) {
    $sql = "CREATE TABLE jokes_table (
              JokeID int NOT NULL,
              Joke_question varchar(500) NOT NULL,
              Joke_answer varchar(500) NOT NULL,
              user_id char(100) NOT NULL,
              PRIMARY KEY (JokeID)
            )";
    if ($mysqli->query($sql) === false) {
        die("Error creating jokes_table: " . $mysqli->error);
    }
}

if (!$usersTableExists) {
    $sql = "CREATE TABLE users (
              user_id int NOT NULL,
              user_name text NOT NULL,
              password text NOT NULL,
              email_address text,
              admin_role tinyint DEFAULT NULL,
              PRIMARY KEY (user_id)
            )";
    if ($mysqli->query($sql) === false) {
        die("Error creating users table: " . $mysqli->error);
    }
}

echo $mysqli->host_info . "<br>";

?>