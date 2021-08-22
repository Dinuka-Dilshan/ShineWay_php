<?php
session_start();

require("../config/db.php");

if (isset($_POST['submit-edit-vehicle'])) {
    $vehicleNumber = $_POST['vehicleNumber'];
    $brand = $_POST['Brand'];
    $model = $_POST['model'];
    $NIC = $_POST['NIC'];
    $dailyPrice = $_POST['dailyPrice'];
    $weeklyPrice = $_POST['weeklyPrice'];
    $monthlyPrice = $_POST['monthlyPrice'];
    $ownerPrice = $_POST['ownerPrice'];
    $vehicleType = $_POST['vehicleType'];

    $query = "UPDATE `vehicle` SET `Brand`='$brand',`Model`='$model',`Type`='$vehicleType',`Owner_NIC`='$NIC',`Daily_price`='$dailyPrice',`Weekly_price`='$weeklyPrice',`Monthly_price`='$monthlyPrice',`Owner_payment`='$ownerPrice' WHERE `Vehicle_num`= '$vehicleNumber';";

    $result = $connection->query($query);

    if ($result) {
        $_SESSION['ownerEditStatus'] = 1;
    } else {
        $_SESSION['ownerEditStatus'] = 0;
    }

    if($_FILES['overallImage']['name']!=''){
        $target_file = "../public/img/Vehicles/".$vehicleNumber."-overall.jpg";
        if(file_exists($target_file)){
            unlink($target_file);
        }
        move_uploaded_file($_FILES["overallImage"]["tmp_name"], $target_file);
    }

    if($_FILES['insideImage']['name']!=''){
        $target_file = "../public/img/Vehicles/".$vehicleNumber."-inside.jpg";
        if(file_exists($target_file)){
            unlink($target_file);
        }
        move_uploaded_file($_FILES["insideImage"]["tmp_name"], $target_file);
    }
    
}

    header('Location: vehicle-view-controller.php');
?>