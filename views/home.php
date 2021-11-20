<?php
require('../config/login-config.php');
$allAvailableVehicles = $_SESSION['allAvailableVehicles'];
$avatar = $_SESSION['userEmailForAvatar'];
$userType = '';
if (isset($_SESSION['userType'])) {
    $userType = $_SESSION['userType'];
}

$january;
$February;
$March;
$April;
$May;
$June;
$July;
$August;
$September;
$Octomber;
$November;
$December;

if (isset($_SESSION['january'])) {
    $january = $_SESSION['january'];
}

if (isset($_SESSION['february'])) {
    $february = $_SESSION['february'];
}
if (isset($_SESSION['March'])) {
    $March = $_SESSION['March'];
}

if (isset($_SESSION['April'])) {
    $April = $_SESSION['April'];
}
if (isset($_SESSION['May'])) {
    $May = $_SESSION['May'];
}

if (isset($_SESSION['June'])) {
    $June = $_SESSION['June'];
}

if (isset($_SESSION['July'])) {
    $July = $_SESSION['July'];
}

if (isset($_SESSION['August'])) {
    $August = $_SESSION['August'];
}

if (isset($_SESSION['September'])) {
    $September = $_SESSION['September'];
}

if (isset($_SESSION['Octomber'])) {
    $Octomber = $_SESSION['Octomber'];
}

if (isset($_SESSION['November'])) {
    $November = $_SESSION['November'];
}

if (isset($_SESSION['December'])) {
    $December = $_SESSION['December'];
}



if (empty($Octomber)) {
    $Octomber = 0;
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

    <div class="vh-100 w-100 d-flex">
        <div class="vh-100 w-15 d-none d-xl-block border-end overflow-hidden px-2 pt-3 bg-dark" id='sideNav'>

            <div class="text-white fs-3 d-flex ms-3 align-items-center">
            <div><i class="fas fa-car me-2"></i>Shineway</div>
</div>
            <div class="d-flex justify-content-center flex-column mt-5">
                <div class="btn-group my-2">
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

                <div class="btn-group my-2 <?php if ($userType == 'User') echo 'd-none' ?>">
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

                <div class="btn-group my-2 <?php if ($userType == 'User') echo 'd-none' ?>">
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


                <div class="logout-btn">

                    <form action="../config/logout.php">
                    <input class="btn btn-primary " type="submit" value="Logout" />
                    </form>

                </div>
            </div>



        </div>

        <div class="vh-100 w-85 overflow-y-scroll  " id='mainContent'>
            <!--navbar-->
            <nav class="navbar navbar-expand-lg navbar-white  bg-dark ms-0 shadow-0 border-bottom">
                <div class="container-fluid ">
                    <a id="btn-side-nav" class="btn btn-primary d-none d-xl-block" style="background-color: #1266F1;" href="#!" role="button"><i class="fas fa-align-justify"></i>
                    </a>
                    <a class="navbar-brand text-white ms-3" href="../controllers/home-controller.php">Dashboard</a>

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
                            <a class="nav-link <?php if ($userType == 'User') echo 'd-none' ?>" href="../controllers/owner-view-controller.php">Vehicle Owners</a>
                            <a class="nav-link <?php if ($userType == 'User') echo 'd-none' ?>" href="../controllers/user-view-controller.php">Users</a>
                            

                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-start d-flex d-xl-none">

                            <form action="../config/logout.php">
                                <input class="btn btn-primary " type="submit" value="Logout" />
                            </form>

                        </div>
                    </div>
                </div>
            </nav>

            <!--content-->
           
            <div class="container-fluid bg-light">
                <div class="row g-3 mt-lg-1">

                    <div class="col-12 col-lg-3 py-2">
                        <div class="card border">
                            <div class="card-body fs-5 text-white light-green" >

                                <span class="avatar "><img class="avatar" src="../public/img/Users/<?php echo $avatar ?>.jpg" alt=""></span>
                                Hi <?php echo $_SESSION['userName']  ?> !!
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="card border ">
                            <div class="card-header bg-secondary text-white fw-bold text-center fs-5">
                                Cars
                            </div>
                            <div class="card-body text-center fs-3">
                                <?php echo $_SESSION['carCount'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="card border  ">
                            <div class="card-header fw-bold bg-success text-white text-center fs-5">
                                Vans
                            </div>
                            <div class="card-body text-center fs-3">
                                <?php echo $_SESSION['vanCount'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="card border">
                            <div class="card-header text-white fw-bold bg-warning text-center fs-5">
                                Bikes
                            </div>
                            <div class="card-body text-center fs-3">
                                <?php echo $_SESSION['bikeCount']  ?>
                            </div>
                        </div>
                    </div>

                </div>


                <!--table-->
                <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>

                <div class="row  mt-lg-2 <?php if($userType=='User')echo 'd-none' ?>">
                    <div class="col-12">
                        <div class="card shadow-0 border">
                            <div class="card-header bg-danger">
                                <div class="container-fluid">
                                    <div class="row justify-content-between">
                                        <div class="col-12 col-lg-4 m-1 fw-bold fs-5 text-white">
                                            INCOME PER MONTH
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container my-2 mt-0 border ">
                                    
                                        <canvas id="myChart" width="400" height="145"></canvas>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                


                <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'Octomber', 'November', 'December'],
                            datasets: [{
                                label: 'Income In Each Month',
                                data: [<?php echo $january['January'] ? $january['January'] : 0 ?>, <?php echo $february['February'] ? $february['February'] : 0 ?>, <?php echo $March['March'] ? $March['March'] : 0 ?>, <?php echo $April['April'] ? $April['April'] : 0 ?>, <?php echo $May['May'] ? $May['May'] : 0 ?>, <?php echo $June['June'] ? $June['June'] : 0 ?>, <?php echo $July['July'] ? $July['July'] : 0 ?>, <?php echo $August['August'] ? $August['August'] : 0 ?>, <?php echo $September['September'] ? $September['September'] : 0 ?>, <?php echo $Octomber['Octomber'] ? $Octomber['Octomber'] : 0 ?>, <?php echo $November['November'] ? $November['November'] : 0 ?>, <?php echo $December['December'] ? $December['December'] : 0.0 ?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132,0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>


                <div class="row g-3 mt-lg-3">
                    <div class="col-12">
                        <div class="card shadow-0 border">
                            <div class="card-header bg-success">
                                <div class="container-fluid">
                                    <div class="row justify-content-between">
                                        <div class="col-12 col-lg-4 m-1 fw-bold fs-5 text-white">
                                            Available Vehicles
                                        </div>

                                        <div class="col-12 col-lg-3 d-flex align-items-center">
                                            <div class="input-group rounded me-0">
                                                <input id="searchInput" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                                <span class="input-group-text border-0" id="search-addon">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive ">
                                <table class="table  table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="fs-6 fw-bold" scope="col">#</th>
                                            <th class="fs-6 fw-bold" scope="col">Vehicle Number</th>
                                            <th class="fs-6 fw-bold" scope="col">Brand</th>
                                            <th class="fs-6 fw-bold" scope="col">Model</th>
                                            <th class="fs-6 fw-bold" scope="col">Type</th>
                                            <th class="fs-6 fw-bold" scope="col">Daily Price</th>
                                            <th class="fs-6 fw-bold" scope="col">Weekly Price</th>
                                            <th class="fs-6 fw-bold" scope="col">Monthly price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $countTable = 1; ?>
                                        <?php foreach ($allAvailableVehicles as $vehicle) : ?>
                                            <tr onclick="cellClickFire(this)" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">
                                                <th scope="row"><?php echo $countTable  ?></th>
                                                <td><?php echo $vehicle['vehicle_num'] ?></td>
                                                <td><?php echo $vehicle['Brand'] ?></td>
                                                <td><?php echo $vehicle['Model'] ?></td>
                                                <td><?php echo $vehicle['Type'] ?></td>
                                                <td><?php echo $vehicle['Daily_price'] ?></td>
                                                <td><?php echo $vehicle['Weekly_price'] ?></td>
                                                <td><?php echo $vehicle['Monthly_price'] ?></td>
                                            </tr>
                                            <?php $countTable++ ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <img class="modal-img" id="modal-image-overall" src="../public/img/Vehicles/134-6563-inside.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="modal-img" id="modal-image-inside" src="../public/img/Vehicles/134-6563-inside.jpg" alt="">
                            </div>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>





    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="../public/js/form-validstion.js"></script>


    <script type="module">
        import {
            easeFilterDataTable
        } from '../public/js/table-filter.js';
        easeFilterDataTable('searchInput', 'dataTable');
    </script>

    <script>
        const table = document.getElementById('dataTable');
        let modalImageOverall = document.getElementById('modal-image-overall');
        let modalImageInside = document.getElementById('modal-image-inside');
        const modalTitle = document.getElementById('staticBackdropLabel');

        function cellClickFire(x) {
            modalImageOverall.src = `../public/img/Vehicles/${table.rows[x.rowIndex].cells[1].innerHTML}-inside.jpg`;
            modalImageInside.src = `../public/img/Vehicles/${table.rows[x.rowIndex].cells[1].innerHTML}-overall.jpg`;
            modalTitle.innerHTML = table.rows[x.rowIndex].cells[1].innerHTML;
        }
    </script>


</body>

</html>