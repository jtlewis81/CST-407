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

echo $keywordfromform;
echo "<h2>Show all jokes with the word " . $keywordfromform . "</h2>";

$sql = "SELECT JokeID, Joke_question, Joke_answer, jokes_table.user_id, user_name FROM Jokes_table JOIN users ON users.user_id = jokes_table.user_id WHERE Joke_question LIKE '%$keywordfromform%'";

//$keywordfromform = "%" . $keywordfromform . "%";

$stmt = $mysqli->prepare($sql);
//$stmt->bind_param("s", $keywordfromform);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($JokeID, $Joke_question, $Joke_answer, $userid, $username);

echo "SQL = " . $sql . "<br>";
if ($stmt->num_rows > 0) {
  // output data of each row
  echo "<div id='accordion'>";
  while ($stmt->fetch()) {
    $safe_joke_question = htmlspecialchars($Joke_question);
    $safe_joke_answer = htmlspecialchars($Joke_answer);
    echo "<h3>" . $safe_joke_question . "</h3>";
    echo "<div><p>" . $safe_joke_answer . " -- Submitted by user " . $username . "</p></div>";
  }
  echo "</div>";
} else {
  echo "0 results";
}
?>