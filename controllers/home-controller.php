<?php

    session_start();

    require("../config/db.php");

    $queryForCarCount = "SELECT COUNT(vehicle.Vehicle_num) AS count FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT payment.Vehicle_num FROM payment WHERE payment.Status = 'Ongoing') AND vehicle.Type = 'Car'";
    $queryForVanCount =  "SELECT COUNT(vehicle.Vehicle_num) AS count FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT payment.Vehicle_num FROM payment WHERE payment.Status = 'Ongoing') AND vehicle.Type = 'Van'";
    $queryForBikeCount = "SELECT COUNT(vehicle.Vehicle_num) AS count FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT payment.Vehicle_num FROM payment WHERE payment.Status = 'Ongoing') AND vehicle.Type = 'Bike'";


    $result = $connection->query($queryForCarCount);
    $carCount = $result->fetch_assoc();

    $result = $connection->query($queryForVanCount);
    $vanCount = $result->fetch_assoc();

    $result = $connection->query($queryForBikeCount);
    $bikeCount = $result->fetch_assoc();


    $_SESSION['carCount'] = $carCount['count'];
    $_SESSION['vanCount'] = $vanCount['count'];
    $_SESSION['bikeCount'] = $bikeCount['count'];

    header('Location: ../views/home.php');
?>