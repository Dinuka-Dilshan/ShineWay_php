<?php
require('../config/login-config.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../public/css/home.css">
    <title>ShineWay | 2021</title>
</head>

<body>

    <script defer src="../public/js/sideNav.js"></script>

    <div class="vh-100 w-100 d-flex">
        <div class="vh-100 w-15 d-none d-xl-block border-end overflow-hidden px-2 pt-3 " id='sideNav'>

            <div class="d-flex justify-content-center flex-column mt-5">
                <div class="btn-group my-2 ">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false">
                        Booking
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../controllers/booking-view-controller.php">View Booking</a></li>
                        <li><a class="dropdown-item" href="../controllers/booking-add-controller.php">Add Booking </a></li>
                        <li><a class="dropdown-item" href="../controllers/booking-edit-controller.php">Edit Booking</a></li>
                        

                    </ul>
                </div>

                <div class="btn-group my-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false">
                        Customer
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../controllers/customer-view-controller.php">View Customer</a></li>
                        <li><a class="dropdown-item" href="../controllers/customer-add-controller.php">Add Customer</a></li>
                        <li><a class="dropdown-item" href="../controllers/customer-edit-controller.php">Edit Customer</a></li>
                        

                    </ul>
                </div>

                <div class="btn-group my-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false">
                        Owner
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../controllers/Owner-view-controller.php">View Owner</a></li>
                        <li><a class="dropdown-item" href="../controllers/Owner-add-controller.php">Add Owner </a></li>
                        <li><a class="dropdown-item" href="../controllers/Owner-edit-controller.php">Edit Owner</a></li>
                        

                    </ul>
                </div>

                <div class="btn-group my-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false">
                        Vehicle
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../controllers/vehicle-view-controller.php">View Vehicle</a></li>
                        <li><a class="dropdown-item" href="../controllers/vehicle-add-controller.php">Add Vehicle </a></li>
                        <li><a class="dropdown-item" href="../controllers/vehicle-edit-controller.php">Edit Vehicle</a></li>
                       

                    </ul>
                </div>

                <div class="btn-group my-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false">
                        User
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../controllers/user-view-controller.php">View User</a></li>
                        <li><a class="dropdown-item" href="../controllers/user-add-controller.php">Add User </a></li>
                        <li><a class="dropdown-item" href="../controllers/user-edit-controller.php">Edit User</a></li>
                        

                    </ul>
                </div>


                <div class="btn-group my-2 ">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false">
                        Payment
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../controllers/payment-controller.php">Make Payment</a></li>
                        
                        

                    </ul>
                </div>
                
            </div>

            <div class="logout-btn">

                    <form action="../config/logout.php">
                        <input class="btn btn-primary " type="submit" value="Logout" />
                    </form>

                </div>
        </div>

        <div class="vh-100 w-85 overflow-y-scroll" id='mainContent'>
            <!--navbar-->
            <nav class="navbar navbar-expand-lg navbar-white  bg-white shadow-0 border-bottom">
                <div class="container-fluid">
                    <a id="btn-side-nav" class="btn btn-primary d-none d-xl-block" style="background-color: #1266F1;" href="#!" role="button"><i class="fas fa-align-justify"></i>
                    </a>

                    <a class="navbar-brand text-muted ms-1" href="../controllers/home-controller.php">ShineWay</a>
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse " id="navbar">
                        <div class="navbar-nav ms-auto d-flex d-xl-none">
                            <a class="nav-link active" aria-current="page" href="../controllers/home-controller.php">Home</a>
                            <a class="nav-link" href="../controllers/booking-view-controller.php">Booking</a>
                            <a class="nav-link" href="../controllers/booking-view-controller.php">Payment</a>
                            <a class="nav-link" href="../controllers/customer-view-controller.php">Customers</a>
                            <a class="nav-link" href="../controllers/vehicle-view-controller.php">Vehicles</a>
                            <a class="nav-link" href="../controllers/owner-view-controller.php">Vehicle Owners</a>
                            <a class="nav-link" href="../controllers/user-view-controller.php">Users</a>
                            <a class="nav-link" href="../controllers/booking-view-controller.php">Reports</a>

                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-start d-flex d-xl-none">

                            <form action="../config/logout.php">
                                <input class="btn btn-primary " type="submit" value="Logout" />
                            </form>

                        </div>

                    </div>
                </div>
            </nav>


            </script>