<?php
require("../config/db.php");

session_start();

if (isset($_POST['submit-add-customer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $NIC = $_POST['NIC'];
    $License = $_POST['license'];

    $nicCheck = "SELECT  `Cus_NIC` FROM `customer` WHERE `Cus_NIC` = '$NIC'";
    $result = $connection->query($nicCheck);
    if($result->num_rows != 0){
        $_SESSION['customerAddStatus'] = 2;
        $_SESSION['faildToAddName'] = $_POST['name'];
        $_SESSION['faildToAddEmail'] = $_POST['email'];
        $_SESSION['faildToAddPhone'] = $_POST['phone'];
        $_SESSION['faildToAddAddress'] = $_POST['address'];
        $_SESSION['faildToAddNIC'] = $_POST['NIC'];
        $_SESSION['faildToAddlicense'] = $_POST['license'];
    }else{
        $query = "INSERT INTO `customer`(`Cus_NIC`, `Licen_num`, `Cus_name`, `Tel_num`, `Email`, `Cus_Address`) VALUES ('$NIC','$License','$name','$phone','$email','$address')";

        $result = $connection->query($query);
    
        if ($result) {
            $_SESSION['customerAddStatus'] = 1;
        } else {
            $_SESSION['customerAddStatus'] = 0;
        }
    }

   
    
}
    //unset($_POST);
    header('Location: ../views/customer-add.php');
?>