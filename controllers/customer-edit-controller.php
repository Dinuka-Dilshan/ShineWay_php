<?php
session_start();

require("../config/db.php");

if (isset($_POST['submit-edit-customer'])) {
    $name = $_POST['customer-edit-name'];
    $email = $_POST['customer-edit-email'];
    $phone = $_POST['customer-edit-phone'];
    $address = $_POST['customer-edit-address'];
    $NIC = $_POST['customer-edit-NIC'];
    $license = $_POST['customer-edit-license'];

    $query = "UPDATE `customer` SET `Licen_num`='$license',`Cus_name`='$name',`Tel_num`='$phone',`Email`='$email',`Cus_Address`='$address' WHERE `Cus_NIC` = '$NIC';";

    $result = $connection->query($query);

    if ($result) {
        $_SESSION['customerEditStatus'] = 1;
    } else {
        $_SESSION['customerEditStatus'] = 0;
    }
    
}

    header('Location: customer-view-controller.php');
?>