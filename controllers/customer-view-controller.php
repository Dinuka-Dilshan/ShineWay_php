<?php
    session_start();

    require("../config/db.php");

    if(isset($_POST['submit-delete-customer'])){
        $NIC = $_POST['submit-delete-customer'];
        $query = "DELETE FROM `customer` WHERE `Cus_NIC` = '$NIC'";

        $result = $connection->query($query);
    }

    $query = "SELECT * FROM `customer`";

    $result = $connection->query($query);

    $customerList = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['customerList'] = $customerList;

    header('Location: ../views/customer-view.php');
?>