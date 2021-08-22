<?php
require("../config/db.php");

session_start();

if (isset($_POST['submit-add-user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $NIC = $_POST['NIC'];
    $userType = $_POST['userType'];

    $emailCheck = "SELECT  `email` FROM `users` WHERE `email` = '$email'";
    $result = $connection->query($emailCheck);
    if($result->num_rows != 0){
        $_SESSION['userAddStatus'] = 2;
        $_SESSION['faildToAddName'] = $_POST['name'];
        $_SESSION['faildToAddEmail'] = $_POST['email'];
        $_SESSION['faildToAddPhone'] = $_POST['phone'];
        $_SESSION['faildToAddAddress'] = $_POST['address'];
        $_SESSION['faildToAddNIC'] = $_POST['NIC'];
        $_SESSION['faildToAddUserType'] = $_POST['userType'];
    }else{
        $query = "INSERT INTO `users`(`NIC`, `name`, `user_type`, `email`, `Telephone`, `Address`) VALUES ('$NIC','$name','$userType','$email','$phone','$address')";

        $result = $connection->query($query);
    
        if ($result) {
            $_SESSION['userAddStatus'] = 1;
        } else {
            $_SESSION['userAddStatus'] = 0;
        }
    
        if($_FILES['image']['name']!=''){
            $target_file = "../public/img/Users/".$email.".jpg";
            if(file_exists($target_file)){
                unlink($target_file);
            }
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
    }

   
    
}
    //unset($_POST);
    header('Location: ../views/user-add.php');
?>