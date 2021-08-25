<?php
session_start();

require("../config/db.php");

if (isset($_POST['submit-edit-booking'])) {
    $bookingID = $_POST['bookingID'];
    $vehicleNumber = $_POST['vehicleNumber'];
    $license = $_POST['license'];
    $startingDate = $_POST['startingDate'];
    $packageType = $_POST['packageType'];
    $customerNIC = $_POST['NIC'];
    $description = $_POST['description'];
    $depositAmount = $_POST['depositAmount'];
    $advancedPayment = $_POST['advancedPayment'];
    $status = $_POST['status'];

    $query = "UPDATE `booking` SET `Vehicle_num`='$vehicleNumber',`Licen_num`='$license',`Start_date`='$startingDate',`Package_Type`='$packageType',`Cus_NIC`='$customerNIC',`Discription`='$description',,`Deposit_Amount`='$depositAmount',`Advanced_Payment`='$advancedPayment',`Status`='$status' WHERE `Booking_ID` = '$bookingID';";

    $result = $connection->query($query);

    if ($result) {
        $_SESSION['customerEditStatus'] = 1;
    } else {
        $_SESSION['customerEditStatus'] = 0;
    }
    
}

    header('Location: booking-view-controller.php');
?>