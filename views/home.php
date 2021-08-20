<?php
session_start();
$allAvailableVehicles = $_SESSION['allAvailableVehicles'];
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

    <div class="vh-100 w-100 d-flex">
        <div class="vh-100 w-15 d-none d-xl-block border-end overflow-hidden bg-info">
            
        </div>

        <div class="vh-100 w-85 overflow-y-scroll">
            <!--navbar-->
            <nav class="navbar navbar-expand-lg navbar-white  bg-white shadow-0 border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand text-muted" href="#">ShineWay</a>
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse " id="navbar">
                        <div class="navbar-nav ms-auto d-flex d-xl-none">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            <a class="nav-link" href="#">Booking</a>
                            <a class="nav-link" href="#">Payment</a>
                            <a class="nav-link" href="#">Customers</a>
                            <a class="nav-link" href="#">Vehicles</a>
                            <a class="nav-link" href="#">Vehicle Owners</a>
                            <a class="nav-link" href="#">Users</a>
                            <a class="nav-link" href="#">Reports</a>

                        </div>
                    </div>
                </div>
            </nav>

            <!--content-->

            <div class="container-fluid">
                <div class="row g-3 mt-lg-3">

                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                hello <?php echo $_SESSION['userName']  ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-header fw-bold">
                                Cars
                            </div>
                            <div class="card-body">
                                <?php echo $_SESSION['carCount'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-header fw-bold">
                                Vans
                            </div>
                            <div class="card-body">
                                <?php echo $_SESSION['vanCount'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-header fw-bold">
                                Bikes
                            </div>
                            <div class="card-body">
                                <?php echo $_SESSION['bikeCount']  ?>
                            </div>
                        </div>
                    </div>

                </div>


                <!--table-->

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