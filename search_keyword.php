<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Accordion - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>  $(function () { $("#accordion").accordion(); });  </script>
    <style>
        body {
            padding: 0px 20px;
        }
    </style>
</head>
<?php
include "db_connect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$keywordfromform = addslashes($_GET['keyword']);


echo "<h2>Show all jokes containing: " . $keywordfromform . "</h2>";

// FIX FOR DB - left in for explanation only, would be removed for production
// added this temporarily to get the tables put into the azure mysql db.
// as best as I could find, they do not have a way to access it directly during a free trial
// or, they simply don't do a good job of explaining how.
/*
// Check if tables exist, if not, create them
$jokesTableExists = false;
$usersTableExists = false;

$sql = "SHOW TABLES LIKE 'jokes_table'";
$result = mysqli_query($mysqli, $sql);
if ($result->num_rows > 0) {
    $jokesTableExists = true;
}

$sql = "SHOW TABLES LIKE 'users'";
$result = mysqli_query($mysqli, $sql);
if ($result->num_rows > 0) {
    $usersTableExists = true;
}

// Create tables if they don't exist
if (!$jokesTableExists) {
    $sql = "CREATE TABLE jokes_table (
              JokeID int NOT NULL AUTO_INCREMENT,
              Joke_question varchar(500) NOT NULL,
              Joke_answer varchar(500) NOT NULL,
              user_id char(100) NOT NULL,
              PRIMARY KEY (JokeID)
            )";
    if (mysqli_query($mysqli, $sql) === false) {
        die("Error creating jokes_table: " . mysqli_error($mysqli));
    }
}

if (!$usersTableExists) {
    $sql = "CREATE TABLE users (
              user_id int NOT NULL AUTO_INCREMENT,
              user_name text NOT NULL,
              password text NOT NULL,
              email_address text,
              admin_role tinyint DEFAULT NULL,
              PRIMARY KEY (user_id)
            )";
    if (mysqli_query($mysqli, $sql) === false) {
        die("Error creating users table: " . mysqli_error($mysqli));
    }
}
*/
// END FIX

$sql = "SELECT JokeID, Joke_question, Joke_answer, jokes_table.user_id, user_name FROM Jokes_table JOIN users ON users.user_id = jokes_table.user_id WHERE Joke_question LIKE '%$keywordfromform%'";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($JokeID, $Joke_question, $Joke_answer, $userid, $username);

if ($stmt->num_rows > 0) {
  // output data of each row
  echo "<div id='accordion'>";
  while ($stmt->fetch()) {
    $safe_joke_question = htmlspecialchars($Joke_question);
    $safe_joke_answer = htmlspecialchars($Joke_answer);
    echo "<h3>" . $safe_joke_question . "</h3>";
    echo "<div><p>" . $safe_joke_answer . " -- Submitted by user: " . $username . "</p></div>";
  }
  echo "</div>";
} else {
  echo "0 results";
}

echo "<br><a href='index.php'>Return to main page</a>";

?>