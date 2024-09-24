<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    if(isset($_SESSION["loggedin_user"])) {
        unset($_SESSION["loggedin_user"]);
    }
}

header("Location: ../index.php");
exit();

?>