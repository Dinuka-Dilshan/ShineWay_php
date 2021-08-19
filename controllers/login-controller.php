<?php
    
    session_start();
    require("../config/db.php");

    if(isset($_POST['email']) && isset($_POST['password'])){

        $email = mysqli_real_escape_string( $connection,$_POST['email']);
        $password =  md5(mysqli_real_escape_string( $connection,$_POST['password']));

        $query = "SELECT  `email`, `password` ,`name`, `user_type` FROM `users` WHERE `email`='$email' AND `password`='$password'";

        $result = $connection->query($query);
        $userData = $result->fetch_assoc();

       if($result->num_rows == 1){
           $_SESSION['userName'] =  $userData['name'];
           $_SESSION['userType'] =  $userData['user_type'];
           header('Location: home-controller.php');
       }else{
           $_SESSION['loginError'] = "Incorrect";
           header('location:../index.php');
       }

    }
