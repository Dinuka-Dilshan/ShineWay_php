<?php
    session_start();

    require("../config/db.php");

    if(isset($_POST['submit-edit-user'])){
        $ID = $_POST['submit-edit-userID'];
        $name = $_POST['edit-name'];
        $email = $_POST['edit-email'];
        $phone = $_POST['edit-phone'];
        $address = $_POST['edit-address'];
        $NIC = $_POST['edit-NIC'];
        $userType = $_POST['edit-userType'];

        $query = "UPDATE `users` SET `NIC`='$NIC',`name`='$name',`user_type`='$userType',`email`='$email',`Telephone`='$phone',`Address`='$address'  WHERE `ID` = '$ID'";

        $result = $connection->query($query);

        if($result){
            $_SESSION['userEditStatus'] = 1;
        }else{
            $_SESSION['userEditStatus'] = 0;
        }
        

    }

    header('Location: user-view-controller.php');

?>