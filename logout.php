<?php
    session_start();
    echo "You have been logged out<br>";
    $_SESSION = [];
    session_destroy();
?>
<br><a href="index.php">Return to main page</a>