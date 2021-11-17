<?php

    //bookingAddStatus 0 = no vehicle number exist 1 = no such customer 2= error 3=done

    require("../config/db.php"); 

    require('../config/login-config.php');

    

    $_SESSION['bookingIDCount'] = $bookingIDCount[0]['bookingIDCount'];


    if (isset($_POST['submit-add-booking'])) {

        $vehicleNumber = $_POST['vehicleNumber'];
        $customerNIC = $_POST['NIC'];
    
        $vehicleDetails = "SELECT * FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT booking.Vehicle_num FROM booking WHERE booking.Status = 'Ongoing') AND vehicle.Vehicle_num = '$vehicleNumber';";
        $resultVehicleDetails = $connection->query($vehicleDetails);
    
        if($resultVehicleDetails->num_rows == 0){
            $_SESSION['bookingAddStatus'] = "0";
            $_SESSION['failedToAddLicense'] = $_POST['license'];
            $_SESSION['failedToAddStartingDate'] = $_POST['startingDate'];
            $_SESSION['failedToAddPackageType'] = $_POST['packageType'];
            $_SESSION['failedToAddDescription'] = $_POST['description'];
            $_SESSION['failedToAddDepositAmount'] = $_POST['depositAmount'];
            $_SESSION['failedToAddPayment'] = $_POST['advancedPayment'];
            $_SESSION['failedToAddNIC'] = $_POST['NIC'];
            $_SESSION['failedToAddVehicleNumber'] = $_POST['vehicleNumber'];
            
        }else{
            $customerDetails = "SELECT * FROM `customer` WHERE `Cus_NIC` = '$customerNIC';";
            $resultCustomerDetails = $connection->query($customerDetails);
    
            if($resultCustomerDetails->num_rows == 0){
                $_SESSION['bookingAddStatus'] = "1";
                $_SESSION['failedToAddLicense'] = $_POST['license'];
                $_SESSION['failedToAddStartingDate'] = $_POST['startingDate'];
                $_SESSION['failedToAddPackageType'] = $_POST['packageType'];
                $_SESSION['failedToAddDescription'] = $_POST['description'];
                $_SESSION['failedToAddDepositAmount'] = $_POST['depositAmount'];
                $_SESSION['failedToAddPayment'] = $_POST['advancedPayment'];
                $_SESSION['failedToAddNIC'] = $_POST['NIC'];
                $_SESSION['failedToAddVehicleNumber'] = $_POST['vehicleNumber'];

            }else{
                $license = $_POST['license'];
                $startingDate = $_POST['startingDate'];
                $packageType = $_POST['packageType'];
                $description = $_POST['description'];
                $depositAmount = $_POST['depositAmount'];
                $advancedPayment = $_POST['advancedPayment'];
                $status = 'Ongoing';
                $NIC = $_POST['NIC'];
                $vehicleNumber = $_POST['vehicleNumber'];

                $query = "INSERT INTO `booking`(`Vehicle_num`,  `Licen_num`, `Start_date`,  `Package_Type`, `Cus_NIC`, `Discription`, `Deposit_Amount`, `Advanced_Payment`, `Status`) VALUES ('$vehicleNumber','$license','$startingDate','$packageType','$NIC','$description','$depositAmount','$advancedPayment','$status')";
                $result = $connection->query($query);
    
                if($result){
                    $_SESSION['bookingAddStatus'] = "3";


                    $bookingID = "SELECT  COUNT(Booking_ID) as `bookingIDCount` FROM booking;";

                    $resultBookingID = $connection->query($bookingID);

                    $bookingIDCount = $resultBookingID->fetch_assoc();

                    $resultCustomerDetails = $resultCustomerDetails->fetch_assoc();

                    $resultVehicleDetails = $resultVehicleDetails->fetch_assoc();
                    
                    $_SESSION['billPreviewCustomerName'] = $resultCustomerDetails['Cus_name'];
                    $_SESSION['billPreviewCustomerTelephone'] = $resultCustomerDetails['Tel_num'];
                    $_SESSION['billPreviewCustomerAddress'] = $resultCustomerDetails['Cus_Address'];
                    $_SESSION['billPreviewVehicleDailyPrice'] = $resultVehicleDetails['Daily_price'];
                    $_SESSION['billPreviewVehicleWeeklyPrice'] = $resultVehicleDetails['Weekly_price'];
                    $_SESSION['billPreviewVehicleMonthlyPrice'] = $resultVehicleDetails['Monthly_price'];
                    $_SESSION['billPreviewBookingID'] = $bookingIDCount['bookingIDCount'];
                    $_SESSION['billPreviewLicense'] = $_POST['license'];
                    $_SESSION['billPreviewStartingDate'] = $_POST['startingDate'];
                    $_SESSION['billPreviewPackageType'] = $_POST['packageType'];
                    $_SESSION['billPreviewDescription'] = $_POST['description'];
                    $_SESSION['billPreviewDepositAmount'] = $_POST['depositAmount'];
                    $_SESSION['billPreviewPayment'] = $_POST['advancedPayment'];
                    $_SESSION['billPreviewNIC'] = $_POST['NIC'];
                    $_SESSION['billPreviewVehicleNumber'] = $_POST['vehicleNumber'];

                }else{
                    $_SESSION['bookingAddStatus'] = "2"; 
                    $_SESSION['failedToAddLicense'] = $_POST['license'];
                    $_SESSION['failedToAddStartingDate'] = $_POST['startingDate'];
                    $_SESSION['failedToAddPackageType'] = $_POST['packageType'];
                    $_SESSION['failedToAddDescription'] = $_POST['description'];
                    $_SESSION['failedToAddDepositAmount'] = $_POST['depositAmount'];
                    $_SESSION['failedToAddPayment'] = $_POST['advancedPayment'];
                    $_SESSION['failedToAddNIC'] = $_POST['NIC'];
                    $_SESSION['failedToAddVehicleNumber'] = $_POST['vehicleNumber'];
                }
            
            }
    
        }
    
        
    
    
    }
    unset($_POST);
    header('Location: ../views/booking-add.php')
?>