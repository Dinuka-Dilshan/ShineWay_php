<?php



require('./partials/header.php');


$scriptSetValues;

$error = -1; // -1 = no message to display 1 = successfull  0 = error 2 = email exists

if (isset($_SESSION['customerAddStatus'])) {
    if ($_SESSION['customerAddStatus'] == 1) {
        $error = 1;
    } else if ($_SESSION['customerAddStatus'] == 0) {
        $error = 0;
    } else if ($_SESSION['customerAddStatus'] == 2) {
        $error = 2;
        $name =  $_SESSION['faildToAddName'];
        $email = $_SESSION['faildToAddEmail'];
        $phone =  $_SESSION['faildToAddPhone'];
        $address =  $_SESSION['faildToAddAddress'];
        $NIC = $_SESSION['faildToAddNIC'];
        $License  = $_SESSION['faildToAddlicense'];
        $scriptSetValues = "setFiledsAfterFail('$name', '$phone', '$email', '$address', '$NIC', '$License');";
        unset($_SESSION['faildToAddName']);
        unset($_SESSION['faildToAddEmail']);
        unset($_SESSION['faildToAddPhone']);
        unset($_SESSION['faildToAddAddress']);
        unset($_SESSION['faildToAddNIC']);
        unset($_SESSION['faildToAddlicense']);
    } else {
        $error = -1;
    }

    unset($_SESSION['customerAddStatus']);
}


?>

<div class="col-12 col-lg-4 p-3 fw-bold fs-5 text-white bg-success w-100 ">
ADD CUSTOMER
</div>

<div class="container-fluid mt-3 ">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="card border shadow-0 my-3 ">
                <div class="card-header fs-3">
                    ADD CUSTOMER
                </div>
                <div class="card-body">
                    <form  class=" needs-validation" novalidate action="../controllers/customer-add-controller.php" method="POST">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-outline">
                                    <input pattern="^(?![ .]+$)[a-zA-Z .]*" id="name" name="name" type="text" class="form-control" required />
                                    <label class="form-label" for="form6Example1">Name</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid name</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input pattern="([0-9]{9}[x|X|v|V]|[0-9]{12})" id="nic" name="NIC" type="text" class="form-control" required />
                                    <label class="form-label" for="form6Example2">NIC</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid NIC</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline ">
                                    <input pattern="^(?![0-9]+$)[a-zA-Z0-9 ,]{2,}$" name="address" id="address" type="text" class="form-control" required />
                                    <label class="form-label" for="form6Example4">Address</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid Address</div>
                                </div>
                            </div>
                        </div>


                        <!-- Email input -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline ">
                                    <input name="email" id="email" type="email" class="form-control" required />
                                    <label class="form-label" for="form6Example5">Email</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid Email</div>
                                </div>
                            </div>
                        </div>


                        <!-- Number input -->
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-outline">
                                    <input pattern="[0-9]{10}" name="phone" id="phone" type="text" class="form-control" required />
                                    <label class="form-label" for="form6Example6">Phone</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid phone number</div>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4">

                            <div class="col">
                                <div class="form-outline">
                                    <input pattern="^[A-Z]{1}[1-9]{7,8}[A-Z]{0,1}$" name="license" id="license" type="text" class="form-control" required />
                                    <label class="form-label" for="form6Example6">License</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid licence number</div>
                                </div>
                            </div>



                        </div>

                        <!-- Submit button -->
                        <div class="row">
                            <div class="col-6">
                                <button type="reset" id="btnReset" class="btn btn-primary btn-block fs-6 py-2 mb-2">Reset</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" name="submit-add-customer" class="btn btn-primary btn-block fs-6 py-2 mb-2">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" data-mdb-toggle="modal" data-mdb-target="#modalMessage" id="btnModal">
    Launch static backdrop modal
</button>

<!-- Modal error-->
<div class="modal fade" id="modalMessage" data-mdb-backdrop="static" data-mdb-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-10">
                            <h6 class="modal-title text-success " id="staticBackdropLabel"> Successfully Added!</h6>
                        </div>

                        <div class="col-2 ">
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" data-mdb-toggle="modal" data-mdb-target="#modalErrorMessage" id="btnErrorModal">
    Launch static backdrop modal
</button>

<!-- Modal error-->
<div class="modal fade" id="modalErrorMessage" data-mdb-backdrop="static" data-mdb-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-10">
                            <h6 class="modal-title text-danger " id="staticBackdropLabel"> Cannot Add!</h6>
                        </div>

                        <div class="col-2 ">
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal email exists -->
<button type="button" class="btn btn-primary d-none" data-mdb-toggle="modal" data-mdb-target="#modalErrorEmailMessage" id="btnErrorEmailModal">
    Launch static backdrop modal
</button>

<!-- Modal error email exists-->
<div class="modal fade" id="modalErrorEmailMessage" data-mdb-backdrop="static" data-mdb-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-10">
                            <h6 class="modal-title text-danger " id="staticBackdropLabel"> NIC Already Exists!</h6>
                        </div>

                        <div class="col-2 ">
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
<script src="../public/js/form-validstion.js"></script>

<script>
    function getByID(elementID) {
        return document.getElementById(elementID);
    }

    function setFiledsAfterFail(name, phone, email, address, nic,license) {
        getByID('name').value = name;
        getByID('phone').value = phone;
        getByID('email').value = email;
        getByID('address').value = address;
        getByID('nic').value = nic;
        getByID('license').value = license;
    }
    <?php
    if ($error == "0") {
        echo "document.getElementById('btnErrorModal').click();";
    } else if ($error == "1") {
        echo "document.getElementById('btnModal').click();";
    } else if ($error == "2") {
        echo "document.getElementById('btnErrorEmailModal').click();";
        echo $scriptSetValues;
    }
    ?>
</script>

<?php
require('./partials/footer.php');
?>