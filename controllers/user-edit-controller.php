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

        $query = "UPDATE `user` SET `NIC`='$NIC',`name`='$name',`user_type`='$userType',`email`='$email',`Telephone`='$phone',`Address`='$address'  WHERE `ID` = '$ID'";

        $result = $connection->query($query);
        if($result){
            $_SESSION['userEditStatus'] = true;
        }else{
            $_SESSION['userEditStatus'] = false;
        }

    }

    header('Location: user-view-controller.php');

?>