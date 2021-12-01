<?php
    require('../config/login-config.php');

    require("../config/db.php");

  
    /*if(isset($_POST['submit-delete-booking'])){
        $bookingID = $_POST['submit-delete-booking'];
        $query = "DELETE FROM `booking` WHERE `Booking_ID` = '$bookingID';";

        $result = $connection->query($query);
    }*/

    $query = " SELECT payment.Booking_ID as Booking_ID, payment.Amount as Amount, payment.date as date, booking.Vehicle_num as Vehicle_num ,booking.Cus_NIC as Cus_NIC
    FROM payment,booking
    WHERE payment.Booking_ID = booking.Booking_ID;";

    $result = $connection->query($query);

    $paymentList = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['paymentList'] = $paymentList;

    header('Location: ../views/payment-view.php');
?>