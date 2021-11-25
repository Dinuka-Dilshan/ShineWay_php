<?php

    require('../config/login-config.php');
    require('../config/db.php');

    if(isset($_POST['payment-booking-id']) && isset($_POST['payment-ending-Date']) ){
        $bookingID = $_POST['payment-booking-id'];
        $endingDate = $_POST['payment-ending-Date'];

        $bookingDetails = "SELECT * FROM `booking` WHERE `Booking_ID`='$bookingID';";
        $result = $connection->query($bookingDetails);

    
        $bookingDetails = $result->fetch_all(MYSQLI_ASSOC);

        if($result->num_rows !=0){
            if($bookingDetails[0]['Status'] == 'Ongoing'){


                $query = "UPDATE `booking` SET `Status`='Completed',`End_date`='$endingDate' WHERE `Booking_ID` = '$bookingID';";

                $result = $connection->query($query);


               
                

                $vehicleNumber = $bookingDetails[0]['Vehicle_num'];
                $vehicleDetails = "SELECT * FROM `vehicle` WHERE `Vehicle_num` = '$vehicleNumber';";
                $result = $connection->query($vehicleDetails);
                $vehicleDetails = $result->fetch_all(MYSQLI_ASSOC);

                $nic = $bookingDetails[0]['Cus_NIC'];
                $customerDetails = "SELECT * FROM `customer` WHERE `Cus_NIC` = '$nic';";
                $result = $connection->query($customerDetails);
                $customerDetails = $result->fetch_all(MYSQLI_ASSOC);


                $price = 0;
                $days = date_diff( date_create($bookingDetails[0]['Start_date']),date_create($endingDate)  )->format("%R%a")+1;

                if($bookingDetails[0]['Package_Type'] == 'Daily Basis'){
                   $price = $vehicleDetails[0]['Daily_price'] * $days;

                }else if($bookingDetails[0]['Package_Type'] == 'Weekly Basis'){

                    $price = ($vehicleDetails[0]['Weekly_price']/7) * $days;

                }else if($bookingDetails[0]['Package_Type'] == 'Monthly Basis'){

                    $price = ($vehicleDetails[0]['Monthly_price']/30) * $days;

                }

                $priceWithoutPrePayements = $price;
                $today = date("Y-m-d");

                $query = "INSERT INTO `payment`(`Booking_ID`, `Amount`, `date`) VALUES (' $bookingID','$priceWithoutPrePayements','$today');";

                $result = $connection->query($query);




                $price = $price - ($bookingDetails[0]['Deposit_Amount'] + $bookingDetails[0]['Advanced_Payment']);
                $_SESSION['billAmount'] = $price;
                $_SESSION['bill-vehicleDetails'] = $vehicleDetails;
                $_SESSION['bill-bookingDetails'] =$bookingDetails;
                $_SESSION['bill-customerDetails'] = $customerDetails;
                $_SESSION['bill-endingDate'] = $endingDate;
                $_SESSION['priceWithoutPrePayements'] = $priceWithoutPrePayements;
            }else{
                $_SESSION['error'] = true;
            }
        }else{
            $_SESSION['error'] = true;
        }
    }

    
    header('Location: ../views/payment.php');
?>