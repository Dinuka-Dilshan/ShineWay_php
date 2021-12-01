<?php
require('../config/login-config.php');
$avatar = $_SESSION['userEmailForAvatar'];
$userType = '';
if (isset($_SESSION['userType'])) {
    $userType = $_SESSION['userType'];
}

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
    <script src="../public/js/dropDown.js"></script>

    <div class="vh-100 w-100 d-flex">
        <div class="vh-100 w-15 d-none d-xl-block border-end overflow-hidden px-2 pt-3 bg-lightYello" id='sideNav'>

            <div class="text-main fs-4 d-flex ms-4 fw-bold align-items-center mt-2">
                <div><i class="fas fa-car me-3 fs-3"></i>Shineway</div>
            </div>

            <hr style="width:100% border">
            <div class="d-flex justify-content-center flex-column mt-6">

                <div class="drop" onclick="location.href='../controllers/home-controller.php'">
                    <i class="fas fa-arrow-circle-right"></i><span class="ms-3">Dashboard</span>
                </div>

                <div class="drop" id="drop">
                    <i class="fas fa-arrow-circle-right"></i><span class="ms-3">Booking</span>
                </div>

                <div class="drop-item" id="drop-item">
                    <a class="dropdown-item" href="../controllers/booking-view-controller.php">View Booking</a>
                </div>

                <div class="drop-item" id='drop-item'>
                    <a class="dropdown-item" href="../controllers/booking-add-controller.php">Add Booking </a>

                </div>




                <div class="drop" id="drop2">
                    <i class="fas fa-arrow-circle-right"></i><span class="ms-3">Customer</span>
                </div>

                <div class="drop-item" id="drop-item2">
                    <a class="dropdown-item" href="../controllers/customer-view-controller.php">View Customer</a>


                </div>

                <div class="drop-item" id='drop-item2'>
                    <a class="dropdown-item" href="../controllers/customer-add-controller.php">Add Customer</a>


                </div>




                <div class="drop <?php if ($userType == 'User') echo 'd-none' ?>" id="drop3">
                    <i class="fas fa-arrow-circle-right"></i><span class="ms-3">Owner</span>
                </div>

                <div class="drop-item" id="drop-item3">
                    <a class="dropdown-item" href="../controllers/Owner-view-controller.php">View Owner</a>




                </div>

                <div class="drop-item" id='drop-item3'>
                    <a class="dropdown-item" href="../controllers/Owner-add-controller.php">Add Owner </a>



                </div>




                <div class="drop" id="drop4">
                    <i class="fas fa-arrow-circle-right"></i><span class="ms-3">Vehicle</span>
                </div>

                <div class="drop-item" id="drop-item4">
                    <a class="dropdown-item" href="../controllers/vehicle-view-controller.php">View Vehicle</a>


                </div>

                <div class="drop-item" id='drop-item4'>
                    <a class="dropdown-item" href="../controllers/vehicle-add-controller.php">Add Vehicle </a>


                </div>




                <div class="drop <?php if ($userType == 'User') echo 'd-none' ?>" id="drop5">
                    <i class="fas fa-arrow-circle-right"></i><span class="ms-3">User</span>
                </div>

                <div class="drop-item" id="drop-item5">
                    <a class="dropdown-item" href="../controllers/user-view-controller.php">View User</a>



                </div>

                <div class="drop-item" id='drop-item5'>
                    <a class="dropdown-item" href="../controllers/user-add-controller.php">Add User </a>



                </div>






                <!-- <div class="drop " id="drop5" onclick="location.href ='../controllers/payment-controller.php' ">
                    <i class="fas fa-arrow-circle-right"></i><span class="ms-3">Payment</span>
                </div>-->

                <div class="drop " id="drop6">
                    <i class="fas fa-arrow-circle-right"></i><span class="ms-3">Payments</span>
                </div>
                <!--<div class="drop " id="drop5" onclick="location.href ='../controllers/payment-controller.php' ">
                    <i class="fas fa-arrow-circle-right"></i><span class="ms-3">Payments</span>
                </div>-->
                <div class="drop-item" id="drop-item6">
                    <a class="dropdown-item" href="../controllers/payment-controller.php">Make Payment</a>
                </div>

                <div class="drop-item" id="drop-item6">
                    <a class="dropdown-item" href="../controllers/payment-view-controller.php">View Payments</a>
                </div>





                <div class="logout-btn d-flex">

                    <div> <span class="avatar "><img class="avatar" src="../public/img/Users/<?php echo $avatar ?>.jpg" alt=""></span>
                        <span class="ms-2 " style="font-size: 0.82rem;"><?php echo $_SESSION['userName']  ?></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center ps-3" style="cursor: pointer;" onclick="location.href='../config/logout.php'"><i class="fas fa-sign-out-alt"></i></div>
                </div>


            </div>

            <script>
                navItemDropHandler('drop', 'drop-item', '#4FC9DA', 'white');
                navItemDropHandler('drop2', 'drop-item2', '#4FC9DA', 'white');
                navItemDropHandler('drop3', 'drop-item3', '#4FC9DA', 'white');
                navItemDropHandler('drop4', 'drop-item4', '#4FC9DA', 'white');
                navItemDropHandler('drop5', 'drop-item5', '#4FC9DA', 'white');
                navItemDropHandler('drop6', 'drop-item6', '#4FC9DA', 'white');

                document.getElementById('drop').addEventListener('click', () => {
                    document.querySelectorAll('#drop-item2').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item3').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item4').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item4').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item6').forEach((item) => {
                        item.style.display = 'none';
                    })


                    document.getElementById('drop2').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop2').style.color = '#403d38';

                    document.getElementById('drop3').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop3').style.color = '#403d38';

                    document.getElementById('drop4').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop4').style.color = '#403d38';

                    document.getElementById('drop5').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop5').style.color = '#403d38';

                    document.getElementById('drop6').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop6').style.color = '#403d38';


                });

                document.getElementById('drop2').addEventListener('click', () => {
                    document.querySelectorAll('#drop-item').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item3').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item4').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item4').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item6').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.getElementById('drop').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop').style.color = '#403d38';

                    document.getElementById('drop3').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop3').style.color = '#403d38';

                    document.getElementById('drop4').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop4').style.color = '#403d38';

                    document.getElementById('drop5').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop5').style.color = '#403d38';

                    document.getElementById('drop6').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop6').style.color = '#403d38';
                })


                document.getElementById('drop3').addEventListener('click', () => {
                    document.querySelectorAll('#drop-item2').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item4').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item4').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item6').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.getElementById('drop6').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop6').style.color = '#403d38';

                    document.getElementById('drop2').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop2').style.color = '#403d38';

                    document.getElementById('drop').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop').style.color = '#403d38';

                    document.getElementById('drop4').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop4').style.color = '#403d38';

                    document.getElementById('drop5').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop5').style.color = '#403d38';


                })

                document.getElementById('drop4').addEventListener('click', () => {
                    document.querySelectorAll('#drop-item2').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item3').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item5').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item6').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.getElementById('drop6').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop6').style.color = '#403d38';

                    document.getElementById('drop2').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop2').style.color = '#403d38';

                    document.getElementById('drop3').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop3').style.color = '#403d38';

                    document.getElementById('drop').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop').style.color = '#403d38';

                    document.getElementById('drop5').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop5').style.color = '#403d38';


                })

                document.getElementById('drop5').addEventListener('click', () => {
                    document.querySelectorAll('#drop-item2').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item3').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item4').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item6').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.getElementById('drop6').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop6').style.color = '#403d38';

                    document.getElementById('drop2').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop2').style.color = '#403d38';

                    document.getElementById('drop3').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop3').style.color = '#403d38';

                    document.getElementById('drop4').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop4').style.color = '#403d38';

                    document.getElementById('drop').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop').style.color = '#403d38';


                })



                document.getElementById('drop6').addEventListener('click', () => {
                    document.querySelectorAll('#drop-item2').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item3').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item4').forEach((item) => {
                        item.style.display = 'none';
                    })
                    document.querySelectorAll('#drop-item').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.querySelectorAll('#drop-item5').forEach((item) => {
                        item.style.display = 'none';
                    })

                    document.getElementById('drop5').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop5').style.color = '#403d38';

                    document.getElementById('drop2').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop2').style.color = '#403d38';

                    document.getElementById('drop3').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop3').style.color = '#403d38';

                    document.getElementById('drop4').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop4').style.color = '#403d38';

                    document.getElementById('drop').style.backgroundColor = '#F8F6F2';
                    document.getElementById('drop').style.color = '#403d38';


                })
            </script>

        </div>

        <div class="vh-100 w-85 overflow-y-scroll " id='mainContent'>
            <!--navbar-->
            <nav class="navbar navbar-expand-lg navbar-white   p-3  shadow-0 border-bottom">
                <div class="container-fluid">
                    <a id="btn-side-nav" class=" d-none d-xl-block" role="button"><i class="fas fa-align-justify " style="color: #4FC9DA;"></i>
                    </a>

                    <a class="navbar-brand text-black fw-bold ms-3 "><?php echo $heading; ?></a>
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse " id="navbar">
                        <div class="navbar-nav ms-auto d-flex d-xl-none">
                            <a class="nav-link active text-main" aria-current="page" href="../controllers/home-controller.php">Dashboard</a>
                            <a class="nav-link  text-main" href="../controllers/booking-view-controller.php">View Bookings</a>
                            <a class="nav-link text-main" href="../controllers/booking-add-controller.php">Add Booking</a>

                            <a class="nav-link text-main" href="../controllers/customer-view-controller.php">View Customers</a>
                            <a class="nav-link text-main" href="../controllers/customer-add-controller.php">Add Customers</a>
                            <a class="nav-link text-main" href="../controllers/vehicle-view-controller.php">View Vehicles</a>
                            <a class="nav-link text-main" href="../controllers/vehicle-add-controller.php">Add Vehicles</a>
                            <a class="nav-link text-main" href="../controllers/payment-controller.php">Make Payment</a>
                            <a class="nav-link text-main" href="../controllers/payment-view-controller.php">View Payments</a>

                            <a class="nav-link text-main <?php if ($userType == 'User') echo 'd-none' ?>" href="../controllers/owner-add-controller.php">Add Vehicle Owners</a>
                            <a class="nav-link  text-main<?php if ($userType == 'User') echo 'd-none' ?>" href="../controllers/owner-view-controller.php">View Vehicle Owners</a>
                            <a <?php ?> class="nav-link text-main <?php if ($userType == 'User') echo 'd-none' ?>" href="../controllers/user-add-controller.php">Add Users</a>
                            <a <?php ?> class="nav-link  text-main<?php if ($userType == 'User') echo 'd-none' ?>" href="../controllers/user-view-controller.php">View Users</a>

                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-start d-flex d-xl-none">

                            <form action="../config/logout.php">
                                <input class="btn bg-main text-white " type="submit" value="Logout" />
                            </form>

                        </div>

                    </div>
                </div>
            </nav>


            </script>