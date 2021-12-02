<?php
    require('../config/login-config.php');

    require("../config/db.php");

    if(isset($_POST['submit-delete-vehicle'])){
        $Vehicle_num = $_POST['submit-delete-vehicle'];
        $query = "DELETE FROM `vehicle` WHERE `Vehicle_num` = '$Vehicle_num'";

        $result = $connection->query($query);
    }

    $query = "SELECT * FROM `vehicle`";

    $result = $connection->query($query);

    $vehicleList = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['vehicleList'] = $vehicleList;

    header('Location: ../views/vehicle-view.php');
?>