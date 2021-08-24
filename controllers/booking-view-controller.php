<?php
    session_start();

    require("../config/db.php");

    if(isset($_POST['submit-delete-booking'])){
        $NIC = $_POST['submit-delete-customer'];
        $query = "DELETE FROM `customer` WHERE `Cus_NIC` = '$NIC'";

        $result = $connection->query($query);
    }

    $query = "SELECT * FROM `booking`";

    $result = $connection->query($query);

    $bookingList = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['bookingList'] = $bookingList;

    header('Location: ../views/booking-view.php');
?>