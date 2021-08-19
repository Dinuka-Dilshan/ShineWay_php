<?php

    session_start();

    require("../config/db.php");

    $queryForCarCount = "SELECT COUNT(vehicle.Vehicle_num) AS count FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT payment.Vehicle_num FROM payment WHERE payment.Status = 'Ongoing') AND vehicle.Type = 'Car'";
    $queryForVanCount =  "SELECT COUNT(vehicle.Vehicle_num) AS count FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT payment.Vehicle_num FROM payment WHERE payment.Status = 'Ongoing') AND vehicle.Type = 'Van'";
    $queryForBikeCount = "SELECT COUNT(vehicle.Vehicle_num) AS count FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT payment.Vehicle_num FROM payment WHERE payment.Status = 'Ongoing') AND vehicle.Type = 'Bike'";
    $queryForAllAvailableVehicles = "SELECT `vehicle_num`,`Brand`,`Model`,`Type`,`Daily_price`,`Weekly_price`,`Monthly_price` FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT payment.Vehicle_num FROM payment WHERE payment.Status = 'Ongoing');";

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