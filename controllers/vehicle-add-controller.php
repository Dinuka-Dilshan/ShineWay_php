<?php
require("../config/db.php");

session_start();

if (isset($_POST['submit-add-vehicle'])) {

    $vehicleNumber = $_POST['vehicleNumber'];
    $brand = $_POST['Brand'];
    $model = $_POST['model'];
    $NIC = $_POST['NIC'];
    $dailyPrice = $_POST['dailyPrice'];
    $weeklyPrice = $_POST['weeklyPrice'];
    $monthlyPrice = $_POST['monthlyPrice'];
    $ownerPrice = $_POST['ownerPrice'];
    $vehicleType = $_POST['vehicleType'];

    $vehicleNumberCheck = "SELECT `Vehicle_num` FROM `vehicle` WHERE `Vehicle_num` = '$vehicleNumber';";
    $result = $connection->query($vehicleNumberCheck);

    if($result->num_rows != 0){
        $_SESSION['customerAddStatus'] = 2;
        $_SESSION['faildToAddVehicleNumber'] = $_POST['vehicleNumber'];
        $_SESSION['faildToAddBrand'] = $_POST['Brand'];
        $_SESSION['faildToAddModel'] = $_POST['model'];
        $_SESSION['faildToAddNIC'] = $_POST['address'];
        $_SESSION['faildToAddNIC'] = $_POST['NIC'];
        $_SESSION['faildToAddlicense'] = $_POST['license'];
    }else{
        $query = "INSERT INTO `vehicle`(`Vehicle_num`, `Brand`, `Model`, `Type`, `Owner_NIC`, `Daily_price`, `Weekly_price`,`Monthly_price`,  `Owner_payment`) VALUES ('$vehicleNumber','$brand','$model','$vehicleType','$NIC','$dailyPrice','$weeklyPrice','$monthlyPrice','$ownerPrice')";

        $result = $connection->query($query);
    
        if ($result) {
            $_SESSION['vehicleAddStatus'] = 1;
        } else {
            $_SESSION['vehicleAddStatus'] = 0;
        }
    }

   
    
}
    //unset($_POST);
    header('Location: ../views/vehicle-add.php');
?>