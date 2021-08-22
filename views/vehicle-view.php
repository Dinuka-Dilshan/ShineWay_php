<?php

session_start();

require('./partials/header.php');

$vehicleList = $_SESSION['vehicleList'];

$error = -1; // -1 = no message to display 1 = successfull  0 = error

if (isset($_SESSION['userEditStatus'])) {
    if ($_SESSION['userEditStatus'] == 1) {
        $error = 1;
    } else if ($_SESSION['userEditStatus'] == 0) {
        $error = 0;
    } else {
        $error = -1;
    }

    unset($_SESSION['userEditStatus']);
}
?>


<!--table-->

<div class="row g-3 mt-lg-3">
    <div class="col-12">
        <div class="card shadow-0 border">
            <div class="card-header bg-success">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-12 col-lg-4 m-1 fw-bold fs-5 text-white">
                            Vehicles
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
                            <th class="fs-6 fw-bold" scope="col">Vehicle No:</th>
                            <th class="fs-6 fw-bold" scope="col">Brand</th>
                            <th class="fs-6 fw-bold" scope="col">Model</th>
                            <th class="fs-6 fw-bold" scope="col">type</th>
                            <th class="fs-6 fw-bold" scope="col">Owner NIC:</th>
                            <!-- <th class="fs-6 fw-bold" scope="col">Registered Date:</th> -->
                            <!-- <th class="fs-6 fw-bold" scope="col">Owner Conditions</th> -->
                            <th class="fs-6 fw-bold" scope="col">Daily price</th>
                            <th class="fs-6 fw-bold" scope="col">Monthly Price</th>
                            <th class="fs-6 fw-bold" scope="col">weekly Price</th>
                            <th class="fs-6 fw-bold" scope="col">Owner Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $countTable = 1; ?>
                        <?php foreach ($vehicleList as $vehicle) : ?>
                            <tr onclick="cellClickFire(this)" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">
                                <th scope="row"><?php echo $countTable  ?></th>
                                <td><?php echo $vehicle['Vehicle_num'] ?></td>
                                <td><?php echo $vehicle['Brand'] ?></td>
                                <td><?php echo $vehicle['Model'] ?></td>
                                <td><?php echo $vehicle['Type'] ?></td>
                                <td><?php echo $vehicle['Owner_NIC'] ?></td>
                                <!-- <td><?php echo $vehicle['Reg_Date'] ?></td> -->
                                <!-- <td><?php echo $vehicle['Owner_Condi'] ?></td> -->
                                <td><?php echo $vehicle['Daily_price'] ?></td>
                                <td><?php echo $vehicle['Weekly_price'] ?></td>
                                <td><?php echo $vehicle['Monthly_price'] ?></td>
                                <td><?php echo $vehicle['Owner_payment'] ?></td>
                                <form action="../controllers/user-view-controller.php" method="post">
                                    <td>
                                        <button name="submit-delete-user" value="<?php echo $user['ID'] ?>" type="submit" class="btn btn-danger btn-sm px-3">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </form>
                                <!--<form action="../controllers/user-edit-controller.php" method="post">-->
                                <td>
                                    <button data-mdb-toggle="modal" data-mdb-target="#modal2" type="button" class="btn btn-secondary btn-sm px-3">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                </td>
                                <!--</form>-->
                            </tr>
                            <?php $countTable++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-align-center img-thumbnail d-flex justify-content-center">
                            <img class="modal-img" id="vehicle-image" src="../public/img/Vehicles/" alt="Cannot Load Image">
                            <img class="modal-img" id="vehicle-image-overall" src="../public/img/Vehicles/" alt="Cannot Load Image">
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




<!-- Modal edit user-->
<div class="modal fade" id="modal2" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-edit-title">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <form enctype="multipart/form-data" class=" needs-validation" novalidate action="../controllers/user-edit-controller.php" method="POST">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-outline">
                                            <input pattern="^(?![ .]+$)[a-zA-Z .]*" id="Modal-edit-vehicle-number" name="vehicleNumber" type="text" id="form6Example1" class="form-control" required />
                                            <label class="form-label" for="form6Example1">Vehicle Number</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid Vehicle Number</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-6">
                                        <div class="form-outline">
                                            <input pattern="([0-9]{9}[x|X|v|V]|[0-9]{12})" id="Modal-edit-brand" name="Brand" type="text" id="form6Example2" class="form-control" required />
                                            <label class="form-label" for="form6Example2">Brand</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid Brand</div>
                                        </div>
                                    </div>
                                
                                    <div class="col-6">
                                        <div class="form-outline ">
                                            <input pattern="^(?![0-9]+$)[a-zA-Z0-9 ,]{2,}$" name="model" id="Modal-edit-model" type="text" id="form6Example4" class="form-control" required />
                                            <label class="form-label" for="form6Example4">model</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid Model</div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Email input -->
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline ">
                                            <input name="NIC" id="Modal-edit-NIC" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example5">Owner NIC</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid NIC</div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Number input -->
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <div class="form-outline">
                                            <input pattern="[0-9]{10}" name="dailyPrice" id="Modal-edit-daily-price" type="number" id="form6Example6" class="form-control" required />
                                            <label class="form-label" for="form6Example6">Daily Price</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid price</div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-outline">
                                            <input pattern="[0-9]{10}" name="weeklyPrice" id="Modal-edit-weekly-price" type="number" class="form-control" required />
                                            <label class="form-label" for="form6Example6">Weekly Price</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid price</div>
                                        </div>
                                    </div>
                                </div>





                                <div class="row mb-3 ">
                                    <div class="col-6">
                                        <div class="form-outline">
                                            <input pattern="[0-9]{10}" name="monthlyPrice" id="Modal-edit-monthly-price" type="number" class="form-control" required />
                                            <label class="form-label" for="form6Example6">Monthly Price</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid price</div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-outline">
                                            <input pattern="[0-9]{10}" name="ownerPrice" id="Modal-edit-owner-price" type="number" class="form-control" required />
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
                                            <input name="overallImage" type="file" class="form-control bg-white " id="overallImage" accept="image/*" />
                                        </div>
                                    </div>

                                    <div class="col-12 ">
                                        <div class="bg-white ">
                                            <label class="form-label bg-white mb-0 pb-0" for="customFile">Inside Image</label>
                                            <input name="insideImage" type="file" class="form-control bg-white " id="insideImage" accept="image/*" />
                                        </div>
                                    </div>


                                    <div class="col-12 mt-2">
                                        <label class="form-label bg-white mb-0 pb-0 " for="typeSelect">Vehicle Type</label>
                                        <select name="vehicleType" class="bg-white  form-control " id="typeSelect" required>
                                            <option selected value="Car"> Car</option>
                                            <option value="Van"> Van</option>
                                            <option value="Bike"> Bike</option>
                                        </select>
                                    </div>

                                </div>


                                <!-- Submit button -->
                                <button type="submit" name="submit-edit-user" class="btn btn-primary btn-block fs-6 py-2 mb-2">Update Vehicle details</button>
                            </form>
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
                            <h6 class="modal-title text-success " id="staticBackdropLabel"> Successfully Updated!</h6>
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
                            <h6 class="modal-title text-danger " id="staticBackdropLabel"> Cannot Update!</h6>
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
<!-- Modal image set -->
<script>
    const table = document.getElementById('dataTable');
    let vehicleImage = document.getElementById('vehicle-image');
    let vehicleImageOverall = document.getElementById('vehicle-image-overall');
    const modalTitle = document.getElementById('Modal-edit-title');
    let modalVehicleImageViewTitle = document.getElementById('staticBackdropLabel');
    const modalEditVehicleNumber = document.getElementById('Modal-edit-vehicle-number');
    const modalEditBrand= document.getElementById('Modal-edit-brand');
    const modalEditModel = document.getElementById('Modal-edit-model');
    const modalEditNIC = document.getElementById('Modal-edit-NIC');
    const modalEditDailyPrice = document.getElementById('Modal-edit-daily-price');
    const modalEditWeeklyPrice = document.getElementById('Modal-edit-weekly-price');
    const modalEditMonthlyPrice = document.getElementById('Modal-edit-monthly-price');
    const modalEditOwnerPrice = document.getElementById('Modal-edit-owner-price');

    function cellClickFire(x) {
        vehicleImage.src = `../public/img/Vehicles/${table.rows[x.rowIndex].cells[1].innerHTML}-inside.jpg`;
        vehicleImageOverall.src = `../public/img/Vehicles/${table.rows[x.rowIndex].cells[1].innerHTML}-overall.jpg`;
        modalTitle.innerHTML = table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditVehicleNumber.value = table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditBrand.value = table.rows[x.rowIndex].cells[2].innerHTML;
        modalEditModel.value = table.rows[x.rowIndex].cells[3].innerHTML;
        modalEditNIC.value = table.rows[x.rowIndex].cells[5].innerHTML;
        modalEditDailyPrice.value = table.rows[x.rowIndex].cells[6].innerHTML;
        modalEditWeeklyPrice.value = table.rows[x.rowIndex].cells[7].innerHTML;
        modalEditMonthlyPrice.value = table.rows[x.rowIndex].cells[8].innerHTML;
        modalEditOwnerPrice.value = table.rows[x.rowIndex].cells[9].innerHTML;
        modalTitle.innerHTML = "Edit Vehicle: " + table.rows[x.rowIndex].cells[1].innerHTML;
        modalVehicleImageViewTitle.innerHTML = table.rows[x.rowIndex].cells[1].innerHTML;
    }


    <?php
    if ($error == "0") {
        echo "document.getElementById('btnErrorModal').click();";
    } else if ($error == "1") {
        echo "document.getElementById('btnModal').click();";
    }
    ?>
</script>

<!-- Filter -->
<script type="module">
    import {
        easeFilterDataTable
    } from '../public/js/table-filter.js';
    easeFilterDataTable('searchInput', 'dataTable');
</script>


<?php
require('./partials/footer.php');
?>