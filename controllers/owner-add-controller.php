<?php
require("../config/db.php");

session_start();

if (isset($_POST['submit-add-owner'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $NIC = $_POST['NIC'];

    $nicCheck = "SELECT  `Owner_NIC` FROM `owner` WHERE `Owner_NIC` = '$NIC';";
    $result = $connection->query($nicCheck);

    if($result->num_rows != 0){
        $_SESSION['ownerAddStatus'] = 2;
        $_SESSION['faildToAddName'] = $_POST['name'];
        $_SESSION['faildToAddEmail'] = $_POST['email'];
        $_SESSION['faildToAddPhone'] = $_POST['phone'];
        $_SESSION['faildToAddAddress'] = $_POST['address'];
        $_SESSION['faildToAddNIC'] = $_POST['NIC'];
    }else{
        $query = "INSERT INTO `owner`(`Owner_NIC`, `Owner_name`, `Tel_num`, `Owner_Email`, `Owner_Address`) VALUES ('$NIC','$name','$phone','$email','$address')";

        $result = $connection->query($query);
    
        if ($result) {
            $_SESSION['ownerAddStatus'] = 1;
        } else {
            $_SESSION['ownerAddStatus'] = 0;
        }
    }

   
    
}
    //unset($_POST);
    header('Location: ../views/owner-add.php');
?>