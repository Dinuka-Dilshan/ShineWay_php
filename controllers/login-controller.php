<?php

    require("../config/db.php");

    if(isset($_POST['email']) && isset($_POST['password'])){

        $email = mysqli_real_escape_string( $connection,$_POST['email']);
        $password =  md5(mysqli_real_escape_string( $connection,$_POST['password']));

        $query = "SELECT  `email`, `password` FROM `users` WHERE `email`='$email' AND `password`='$password'";

        $result = $connection->query($query);

       if($result->num_rows == 1){
            echo 'done';
       }else{
           session_start();
           $_SESSION['loginError'] = "Incorrect";
           header('location:../index.php');
       }

    }
