<?php
session_start();

require("../config/db.php");

if (isset($_POST['submit-edit-owner'])) {
    $ID = $_POST['submit-edit-ownerID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $NIC = $_POST['NIC'];

    $query = "UPDATE `owner` SET `Owner_name`='$name',`Tel_num`='$phone',`Owner_Email`='$email',`Owner_Address`='$address' WHERE `Owner_NIC` = '$NIC';";

    $result = $connection->query($query);

    if ($result) {
        $_SESSION['ownerEditStatus'] = 1;
    } else {
        $_SESSION['ownerEditStatus'] = 0;
    }
    
}

    header('Location: owner-view-controller.php');
?>