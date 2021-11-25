<?php

    require('../config/login-config.php');
    require("../config/db.php");

    $january = "SELECT SUM(Amount) as January FROM payment WHERE MONTH(date) = 1;";
    $February ="SELECT SUM(Amount) as February FROM payment WHERE MONTH(date) = 2;";
    $March = "SELECT SUM(Amount) as March FROM payment WHERE MONTH(date) = 3;";
    $April = "SELECT SUM(Amount) as April FROM payment WHERE MONTH(date) = 4;";
    $May = "SELECT SUM(Amount) as May FROM payment WHERE MONTH(date) = 5;";
    $June = "SELECT SUM(Amount) as June FROM payment WHERE MONTH(date) = 6;";
    $July = "SELECT SUM(Amount) as July FROM payment WHERE MONTH(date) = 7;";
    $August ="SELECT SUM(Amount) as August FROM payment WHERE MONTH(date) = 8;";
    $September ="SELECT SUM(Amount) as September FROM payment WHERE MONTH(date) = 9;";
    $Octomber ="SELECT SUM(Amount) as Octomber FROM payment WHERE MONTH(date) = 10;";
    $November ="SELECT SUM(Amount) as November FROM payment WHERE MONTH(date) = 11;";
    $December = "SELECT SUM(Amount) as December FROM payment WHERE MONTH(date) = 12;";


    $result = $connection->query($january);
    $january = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['january'] = $january[0];

    $result = $connection->query($February);
    $february = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['february'] = $february[0];

    $result = $connection->query($March);
    $March = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['March'] = $March[0];

    $result = $connection->query($April);
    $April = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['April'] = $April[0];


    $result = $connection->query($May);
    $May  = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['May'] = $May[0];

    $result = $connection->query($June);
    $June = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['June'] = $June[0];

    $result = $connection->query($July);
    $July = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['July'] = $July[0];

    $result = $connection->query($August);
    $August = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['August'] = $August[0];


    $result = $connection->query($September);
    $September  = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['September'] = $September[0];

    $result = $connection->query($Octomber);
    $Octomber = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['Octomber'] = $Octomber[0];

    $result = $connection->query($November);
    $November = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['November'] = $November[0];

    $result = $connection->query($December);
    $December = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['December'] = $December[0];



    $queryForCarCount = "SELECT COUNT(vehicle.Vehicle_num) AS count FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT booking.Vehicle_num FROM booking WHERE booking.Status = 'Ongoing') AND vehicle.Type = 'Car'";
    $queryForVanCount =  "SELECT COUNT(vehicle.Vehicle_num) AS count FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT booking.Vehicle_num FROM booking WHERE booking.Status = 'Ongoing') AND vehicle.Type = 'Van'";
    $queryForBikeCount = "SELECT COUNT(vehicle.Vehicle_num) AS count FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT booking.Vehicle_num FROM booking WHERE booking.Status = 'Ongoing') AND vehicle.Type = 'Bike'";
    $queryForAllAvailableVehicles = "SELECT `vehicle_num`,`Brand`,`Model`,`Type`,`Daily_price`,`Weekly_price`,`Monthly_price` FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT booking.Vehicle_num FROM booking WHERE booking.Status = 'Ongoing');";

    $result = $connection->query($queryForCarCount);
    $carCount = $result->fetch_assoc();

    $result = $connection->query($queryForVanCount);
    $vanCount = $result->fetch_assoc();

    $result = $connection->query($queryForBikeCount);
    $bikeCount = $result->fetch_assoc();

    $result = $connection->query($queryForAllAvailableVehicles);
    $allAvailableVehicles = $result->fetch_all(MYSQLI_ASSOC);


    $_SESSION['carCount'] = $carCount['count'];
    $_SESSION['vanCount'] = $vanCount['count'];
    $_SESSION['bikeCount'] = $bikeCount['count'];
    $_SESSION['allAvailableVehicles'] = $allAvailableVehicles;

    

    header('Location: ../views/home.php');
?>