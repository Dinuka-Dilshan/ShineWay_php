<?php
session_start();
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
        <div class="vh-100 w-15 d-none d-xl-block border-end">

        </div>

        <div class="vh-100 w-85 ">
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
            </div>

        </div>
    </div>







    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="public/js/form-validstion.js"></script>
</body>

</html>