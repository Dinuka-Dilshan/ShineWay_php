<?php
require('../config/login-config.php');
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

    $ownerNicCheck = "SELECT  `Owner_NIC` FROM `owner` WHERE `Owner_NIC` = '$NIC';";
    $result = $connection->query($ownerNicCheck);

    if($result->num_rows == 0){
        $_SESSION['vehicleAddStatus'] = 3;
        $_SESSION['faildToAddVehicleNumber'] = $_POST['vehicleNumber'];
        $_SESSION['faildToAddBrand'] = $_POST['Brand'];
        $_SESSION['faildToAddModel'] = $_POST['model'];
        $_SESSION['faildToAddNIC'] = $_POST['address'];
        $_SESSION['faildToAddNIC'] = $_POST['NIC'];
        $_SESSION['faildToAddDailyPrice'] = $_POST['dailyPrice'];
        $_SESSION['faildToAddWeeklyPrice'] = $_POST['weeklyPrice'];
        $_SESSION['faildToAddMonthlyPrice'] = $_POST['monthlyPrice'];
        $_SESSION['faildToAddOwnerPrice'] = $_POST['ownerPrice'];
        $_SESSION['faildToAddVehicleType'] = $_POST['vehicleType'];
        header('Location: ../views/vehicle-add.php');
    }else{
        $vehicleNumberCheck = "SELECT `Vehicle_num` FROM `vehicle` WHERE `Vehicle_num` = '$vehicleNumber';";
        $result = $connection->query($vehicleNumberCheck);

        if($result->num_rows != 0){
            $_SESSION['vehicleAddStatus'] = 2;
            $_SESSION['faildToAddVehicleNumber'] = $_POST['vehicleNumber'];
            $_SESSION['faildToAddBrand'] = $_POST['Brand'];
            $_SESSION['faildToAddModel'] = $_POST['model'];
            $_SESSION['faildToAddNIC'] = $_POST['address'];
            $_SESSION['faildToAddNIC'] = $_POST['NIC'];
            $_SESSION['faildToAddDailyPrice'] = $_POST['dailyPrice'];
            $_SESSION['faildToAddWeeklyPrice'] = $_POST['weeklyPrice'];
            $_SESSION['faildToAddMonthlyPrice'] = $_POST['monthlyPrice'];
            $_SESSION['faildToAddOwnerPrice'] = $_POST['ownerPrice'];
            $_SESSION['faildToAddVehicleType'] = $_POST['vehicleType'];
        }else{
            $query = "INSERT INTO `vehicle`(`Vehicle_num`, `Brand`, `Model`, `Type`, `Owner_NIC`, `Daily_price`, `Weekly_price`,`Monthly_price`,  `Owner_payment`) VALUES ('$vehicleNumber','$brand','$model','$vehicleType','$NIC','$dailyPrice','$weeklyPrice','$monthlyPrice','$ownerPrice')";

            $result = $connection->query($query);
        
            if ($result) {
                $_SESSION['vehicleAddStatus'] = 1;

                if($_FILES['insideImage']['name']!=''){
                    $target_file = "../public/img/Vehicles/". $_POST['vehicleNumber']."-inside.jpg";
                    if(file_exists($target_file)){
                        unlink($target_file);
                    }
                    move_uploaded_file($_FILES["insideImage"]["tmp_name"], $target_file);
                }

                if($_FILES['overallImage']['name']!=''){
                    $target_file = "../public/img/Vehicles/". $_POST['vehicleNumber']."-overall.jpg";
                    if(file_exists($target_file)){
                        unlink($target_file);
                    }
                    move_uploaded_file($_FILES["overallImage"]["tmp_name"], $target_file);
                }

            } else {
                $_SESSION['vehicleAddStatus'] = 0;
            }
        }
    
    }

}
    //unset($_POST);
    header('Location: ../views/vehicle-add.php');
