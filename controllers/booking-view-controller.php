<?php
    session_start();

    require("../config/db.php");

    if(isset($_POST['submit-delete-booking'])){
        $bookingID = $_POST['submit-delete-booking'];
        $query = "DELETE FROM `booking` WHERE `Booking_ID` = '$bookingID';";

        $result = $connection->query($query);
    }

    $query = "SELECT * FROM `booking`";

    $result = $connection->query($query);

    $bookingList = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['bookingList'] = $bookingList;

    header('Location: ../views/booking-view.php');
?>