<?php
    require('../config/login-config.php');

    require("../config/db.php");

    if(isset($_POST['submit-delete-customer'])){
        $NIC = $_POST['submit-delete-customer'];
        $query = "DELETE FROM `customer` WHERE `Cus_NIC` = '$NIC'";

        $result = $connection->query($query);
    }

    $query = "SELECT * FROM `vehicle`";

    $result = $connection->query($query);

    $vehicleList = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['vehicleList'] = $vehicleList;

    header('Location: ../views/vehicle-view.php');
?>