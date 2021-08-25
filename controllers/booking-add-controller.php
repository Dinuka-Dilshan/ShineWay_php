<?php

    //bookingAddStatus 0 = no vehicle number exist 1 = no such customer 2= error 3=done

    require("../config/db.php"); 

    session_start();

    $bookingID = "SELECT  COUNT(Booking_ID) as `bookingIDCount` FROM booking;";

    $result = $connection->query($bookingID);

    $bookingIDCount = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['bookingIDCount'] = $bookingIDCount[0]['bookingIDCount'];


    if (isset($_POST['submit-add-booking'])) {

        $vehicleNumber = $_POST['vehicleNumber'];
        $customerNIC = $_POST['NIC'];
    
        $vehicleDetails = "SELECT `vehicle_num`,`Brand`,`Model`,`Type`,`Daily_price`,`Weekly_price`,`Monthly_price` FROM vehicle WHERE Vehicle.Vehicle_num NOT IN(SELECT booking.Vehicle_num FROM booking WHERE booking.Status = 'Ongoing') AND vehicle.Vehicle_num = '$vehicleNumber';";
        $resultVehicleDetails = $connection->query($vehicleDetails);
    
        if($resultVehicleDetails->num_rows == 0){
            $_SESSION['bookingAddStatus'] = "0";
            $_SESSION['failedToAddBookingID'] = $_POST['bookingID'];
            $_SESSION['failedToAddLicense'] = $_POST['license'];
            $_SESSION['failedToAddStartingDate'] = $_POST['startingDate'];
            $_SESSION['failedToAddPackageType'] = $_POST['packageType'];
            $_SESSION['failedToAddDescription'] = $_POST['description'];
            $_SESSION['failedToAddDepositAmount'] = $_POST['depositAmount'];
            $_SESSION['failedToAddPayment'] = $_POST['advancedPayment'];
            $_SESSION['failedToAddNIC'] = $_POST['NIC'];
            $_SESSION['failedToAddVehicleNumber'] = $_POST['vehicleNumber'];
            
        }else{
            $customerDetails = "SELECT `Cus_NIC`, `Cus_name`, `Tel_num`, `Email`, `Cus_Address` FROM `customer` WHERE `Cus_NIC` = '$customerNIC';";
            $resultCustomerDetails = $connection->query($customerDetails);
    
            if($resultCustomerDetails->num_rows == 0){
                $_SESSION['bookingAddStatus'] = "1";
                $_SESSION['failedToAddBookingID'] = $_POST['bookingID'];
                $_SESSION['failedToAddLicense'] = $_POST['license'];
                $_SESSION['failedToAddStartingDate'] = $_POST['startingDate'];
                $_SESSION['failedToAddPackageType'] = $_POST['packageType'];
                $_SESSION['failedToAddDescription'] = $_POST['description'];
                $_SESSION['failedToAddDepositAmount'] = $_POST['depositAmount'];
                $_SESSION['failedToAddPayment'] = $_POST['advancedPayment'];
                $_SESSION['failedToAddNIC'] = $_POST['NIC'];
                $_SESSION['failedToAddVehicleNumber'] = $_POST['vehicleNumber'];

            }else{
                $bookingID = $_POST['bookingID'];
                $license = $_POST['license'];
                $startingDate = $_POST['startingDate'];
                $packageType = $_POST['packageType'];
                $description = $_POST['description'];
                $depositAmount = $_POST['depositAmount'];
                $advancedPayment = $_POST['advancedPayment'];
                $status = 'Ongoing';
                $NIC = $_POST['NIC'];
                $vehicleNumber = $_POST['vehicleNumber'];

                $query = "INSERT INTO `booking`(`Vehicle_num`, `Booking_ID`, `Licen_num`, `Start_date`,  `Package_Type`, `Cus_NIC`, `Discription`, `Deposit_Amount`, `Advanced_Payment`, `Status`) VALUES ('$vehicleNumber','$bookingID','$license','$startingDate','$packageType','$NIC','$description','$depositAmount','$advancedPayment','$status')";
                $result = $connection->query($query);
    
                if($result){
                     $_SESSION['bookingAddStatus'] = "3";
                }else{
                    $_SESSION['bookingAddStatus'] = "2"; 
                    $_SESSION['failedToAddBookingID'] = $_POST['bookingID'];
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
  
    header('Location: ../views/booking-add.php')
?>