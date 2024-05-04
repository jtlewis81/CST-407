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

if (!$_SESSION['username']) {
    echo "Only logged in users may access this page.  Click <a href='login_form.php'here </a> to login<br>";
    exit;
}

include "db_connect.php";

$new_joke_question = addslashes($_GET['newjoke']);
$new_joke_answer = addslashes($_GET['jokeanswer']);
$userid = $_SESSION['userid'];

echo "<h2>Trying to add a new joke:<br>" . $new_joke_question . "<br>" . $new_joke_answer . "</h2>user id: " . $userid;

$stmt = $conn->prepare("INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer, user_id) VALUES (null, ?, ?, ?)");
$stmt->bind_param("sss", $new_joke_question, $new_joke_answer, $userid);
$stmt->execute();
$stmt->close();

include "search_all_jokes.php";

echo "<a href = 'index.php'>Return to main</a>";

?>

</html>