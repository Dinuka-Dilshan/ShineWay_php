<?php


$heading = 'ADD VEHICLES';
require('./partials/header.php');


$scriptSetValues;

$error = -1; // -1 = no message to display 1 = successfull  0 = error 2 = email exists 3 = no owner nic found

if (isset($_SESSION['vehicleAddStatus'])) {
    if ($_SESSION['vehicleAddStatus'] == 1) {
        $error = 1;
    } else if ($_SESSION['vehicleAddStatus'] == 0) {
        $error = 0;
    } else if ($_SESSION['vehicleAddStatus'] == 2) {
        $error = 2;
        $vehicleNumber = $_SESSION['faildToAddVehicleNumber'];
        $brand = $_SESSION['faildToAddBrand'];
        $Model = $_SESSION['faildToAddModel'] ;
        $dailyPrice = $_SESSION['faildToAddDailyPrice'];
        $NIC = $_SESSION['faildToAddNIC'];
        $weeklyPrice = $_SESSION['faildToAddWeeklyPrice'];
        $monthlyPrice = $_SESSION['faildToAddMonthlyPrice'];
        $ownerPrice = $_SESSION['faildToAddOwnerPrice'];
        $vehicleType = $_SESSION['faildToAddVehicleType'];


        $scriptSetValues = "setFiledsAfterFail('$vehicleNumber', '$brand', '$Model', '$NIC', '$dailyPrice', '$weeklyPrice', '$monthlyPrice','$ownerPrice','$vehicleType');";
        unset( $_SESSION['faildToAddVehicleNumber']);
        unset($_SESSION['faildToAddBrand']);
        unset($_SESSION['faildToAddModel']);
        unset($_SESSION['faildToAddDailyPrice']);
        unset($_SESSION['faildToAddNIC']);
        unset($_SESSION['faildToAddWeeklyPrice']);
        unset($_SESSION['faildToAddMonthlyPrice']);
        unset($_SESSION['faildToAddOwnerPrice']);
        unset($_SESSION['faildToAddVehicleType']);


    }else if ($_SESSION['vehicleAddStatus'] == 3) {
        $error = 3;
        $vehicleNumber = $_SESSION['faildToAddVehicleNumber'];
        $brand = $_SESSION['faildToAddBrand'];
        $Model = $_SESSION['faildToAddModel'] ;
        $dailyPrice = $_SESSION['faildToAddDailyPrice'];
        $NIC = $_SESSION['faildToAddNIC'];
        $weeklyPrice = $_SESSION['faildToAddWeeklyPrice'];
        $monthlyPrice = $_SESSION['faildToAddMonthlyPrice'];
        $ownerPrice = $_SESSION['faildToAddOwnerPrice'];
        $vehicleType = $_SESSION['faildToAddVehicleType'];


        $scriptSetValues = "setFiledsAfterFail('$vehicleNumber', '$brand', '$Model', '$NIC', '$dailyPrice', '$weeklyPrice', '$monthlyPrice','$ownerPrice','$vehicleType');";
        unset( $_SESSION['faildToAddVehicleNumber']);
        unset($_SESSION['faildToAddBrand']);
        unset($_SESSION['faildToAddModel']);
        unset($_SESSION['faildToAddDailyPrice']);
        unset($_SESSION['faildToAddNIC']);
        unset($_SESSION['faildToAddWeeklyPrice']);
        unset($_SESSION['faildToAddMonthlyPrice']);
        unset($_SESSION['faildToAddOwnerPrice']);
        unset($_SESSION['faildToAddVehicleType']);
    }else {
        $error = -1;
    }

    unset($_SESSION['vehicleAddStatus']);
}


?>



<div class="container-fluid ">
    <div class="row justify-content-center justify-content-lg-start">
        <div class="col-12 col-lg-8">
            <div class="card border shadow-0 my-4 ">
                <!-- <div class="card-header fs-3 bg-danger text-white">
                    ADD VEHICLE
                </div> -->
                <div class="card-body">
                    <form  enctype="multipart/form-data" class=" needs-validation" novalidate action="../controllers/vehicle-add-controller.php" method="POST">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-outline">
                                    <input pattern="^[A-Z0-9]{2,3}[-][0-9]{4}$" id="vehicleNumber" name="vehicleNumber" type="text" class="form-control" required />
                                    <label class="form-label" for="form6Example1">Vehicle Number</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid Vehicle Number</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-outline">
                                    <input pattern="[a-zA-Z]{2,}" id="brand" name="Brand" type="text"  class="form-control" required />
                                    <label class="form-label" for="form6Example2">Brand</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid Brand</div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-outline ">
                                    <input pattern="[a-zA-Z0-9 -]{2,}" name="model" id="model" type="text" id="form6Example4" class="form-control" required />
                                    <label class="form-label" for="form6Example4">model</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid Model</div>
                                </div>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline ">
                                    <input pattern="([0-9]{9}[x|X|v|V]|[0-9]{12})" autocomplete="off" name="NIC" id="NIC"  type="text" class="form-control" required />
                                    <label class="form-label" for="form6Example5">Owner NIC</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid NIC</div>

                                </div>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-outline">
                                    <input name="dailyPrice" id="dailyPrice" type="number"  class="form-control" required />
                                    <label class="form-label" for="form6Example6">Daily Price</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid price</div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-outline">
                                    <input name="weeklyPrice" id="weeklyPrice" type="number" class="form-control" required />
                                    <label class="form-label" for="form6Example6">Weekly Price</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid price</div>
                                </div>
                            </div>
                        </div>





                        <div class="row mb-3 ">
                            <div class="col-6">
                                <div class="form-outline">
                                    <input name="monthlyPrice" id="monthlyPrice" type="number" class="form-control" required />
                                    <label class="form-label" for="form6Example6">Monthly Price</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid price</div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-outline">
                                    <input name="ownerPrice" id="ownerPrice" type="number" class="form-control" required />
                                    <label class="form-label" for="form6Example6">Owner Payment</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid price</div>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4 g-1">
                            <div class="col-12 ">
                                <div class="bg-white ">
                                    <label class="form-label bg-white mb-0 pb-0" for="customFile">Overall Image</label>
                                    <input required name="overallImage" type="file" class="form-control bg-white " id="overallImage" accept="image/*" />
                                </div>
                            </div>

                            <div class="col-12 ">
                                <div class="bg-white ">
                                    <label class="form-label bg-white mb-0 pb-0" for="customFile">Inside Image</label>
                                    <input required name="insideImage" type="file" class="form-control bg-white " id="insideImage" accept="image/*" />
                                </div>
                            </div>


                            <div class="col-12 mt-2">
                                <label class="form-label bg-white mb-0 pb-0 " for="typeSelect">Vehicle Type</label>
                                <select name="vehicleType" class="bg-white  form-control " id="vehicleType" required>
                                    <option selected value="Car"> Car</option>
                                    <option value="Van"> Van</option>
                                    <option value="Bike"> Bike</option>
                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="reset" id="btnReset" class="btn bg-light-green btn-block fs-6 py-2 mb-2">Reset</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" name="submit-add-vehicle" class="btn bg-main text-white btn-block fs-6 py-2 mb-2">Add Vehicle details</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-4 my-5 d-none d-lg-block">
            <div class="row">
                <div class="col-12 my-2 mt-2">
                    <div class=" py-5 border">
                        
                            <img src="../public/img/add vehicle.gif" alt="" style="width: 100%; height:100%">
                        
                    </div>
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
                            <h6 class="modal-title text-danger " id="modelMessageError"> Cannot Add!</h6>
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
                            <h6 class="modal-title text-danger " id="staticBackdropLabel"> Vehicle Number Already Exists!</h6>
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


<!-- Button trigger modal no NIC -->
<button type="button" class="btn btn-primary d-none" data-mdb-toggle="modal" data-mdb-target="#modalErrorNICMessage" id="btnErrorNICModal">
    Launch static backdrop modal
</button>

<!-- Modal error email exists-->
<div class="modal fade" id="modalErrorNICMessage" data-mdb-backdrop="static" data-mdb-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-10">
                            <h6 class="modal-title text-danger " id="staticBackdropLabel"> No such owner NIC found!</h6>
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

    function setFiledsAfterFail(vehicleNumber, brand, model, NIC, dailyPrice, weeklyPrice, monthlyPrice,ownerPrice,vehicleType) {
        getByID('vehicleNumber').value = vehicleNumber;
        getByID('brand').value = brand;
        getByID('model').value = model;
        getByID('NIC').value = NIC;
        getByID('dailyPrice').value = dailyPrice;
        getByID('weeklyPrice').value = weeklyPrice;
        getByID('monthlyPrice').value = monthlyPrice;
        getByID('ownerPrice').value = ownerPrice;
        getByID('vehicleType').value = vehicleType;
    }
    <?php
    if ($error == "0") {
        echo "document.getElementById('btnErrorModal').click();";
    }else if ($error == "1") {
        echo "document.getElementById('btnModal').click();";
    }else if ($error == "2") {
        echo "document.getElementById('btnErrorEmailModal').click();";
        echo $scriptSetValues;
    }else if($error == "3"){
        echo "document.getElementById('btnErrorNICModal').click();";
        echo $scriptSetValues;
    }
    ?>
</script>

<?php
require('./partials/footer.php');
?>