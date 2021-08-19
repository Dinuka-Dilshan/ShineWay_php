<?php
    session_start();
    $error ="";
    $errorDisplay = "d-none";

    if(isset($_SESSION['loginError'])){
        $error = $_SESSION['loginError'];
        $errorDisplay = "";
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="public/css/custom.css">
    <title>ShineWay|Login</title>
</head>

<body>
    <div class="bg-blur position-absolute top-0 start-0"></div>
    <div class="w-100 vh-100 d-flex justify-content-center align-items-center ">
        <div class="container-fluid blur-0">
            <div class="row justify-content-center">
                <div class=" col-12 col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-header fw-bold fs-3">
                            Welcome Back!
                        </div>
                        <div class="card-header text-danger ms-1 <?php echo $errorDisplay ?>">
                            <?php echo $error?>
                        </div>
                        <div class="card-body">

                            <form class="row g-3 needs-validation justify-content-center" novalidate action="controllers/login-controller.php" method="POST">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <input type="email" class="form-control" id="loginEmail" name="email" required />
                                        <label for="loginEmail" class="form-label"  >Email</label>
                                        <div class="invalid-feedback">You must enter a valid email address!</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-outline">
                                        <input type="password" class="form-control"  name="password" id="loginPassword" required />
                                        <label for="loginPassword" class="form-label">Password</label>
                                        <div class="invalid-feedback">You must enter a password!</div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <a href="#!">Forgot password?</a>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary btn-block" type="submit">LOG IN</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-absolute top-0 start-0 ">
        <p class="display-6 fw-bold p-2 inline-block "> <img src="public/img/ShineWay.png" alt="logo" class="logo "> <span>ShineWay</span></p>
    </div>

    <div class="position-absolute bottom-0 end-0 pe-2">
        <span class=" fs-tiny text-white">&copy;2021 ShineWay | All Rights Reserved</span>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="public/js/form-validstion.js"></script>
</body>

</html>