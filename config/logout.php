<?php

    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
        unset($_SESSION["loggedin"]);
        header("location: ../index.php");
        exit;
    }


?>