<?php

session_start();

require('./partials/header.php');

$bookingList = $_SESSION['bookingList'];

$error = -1; // -1 = no message to display 1 = successfull  0 = error

if (isset($_SESSION['bookingEditStatus'])) {
    if ($_SESSION['bookingEditStatus'] == 1) {
        $error = 1;
    } else if ($_SESSION['bookingEditStatus'] == 0) {
        $error = 0;
    } else {
        $error = -1;
    }

    unset($_SESSION['bookingEditStatus']);
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
                            BOOKINGS
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
                            <th class="fs-6 fw-bold" scope="col">Booking ID</th>
                            <th class="fs-6 fw-bold" scope="col">Vehicle Number</th>
                            <th class="fs-6 fw-bold" scope="col">License</th>
                            <th class="fs-6 fw-bold" scope="col">Starting Date</th>
                            <th class="fs-6 fw-bold" scope="col">Package Type</th>
                            <th class="fs-6 fw-bold" scope="col">Customer NIC</th>
                            <th class="fs-6 fw-bold" scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $countTable = 1; ?>
                        <?php foreach ($bookingList as $booking) : ?>
                            <tr onclick="cellClickFire(this)" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">
                                <th scope="row"><?php echo $countTable  ?></th>
                                <td><?php echo $booking['Booking_ID'] ?></td>
                                <td><?php echo $booking['Vehicle_num'] ?></td>
                                <td><?php echo $booking['Licen_num'] ?></td>
                                <td><?php echo $booking['Start_date'] ?></td>
                                <td><?php echo $booking['Package_Type'] ?></td>
                                <td><?php echo $booking['Cus_NIC'] ?></td>
                                <td><?php echo $booking['Discription'] ?></td>
                                <form action="../controllers/booking-view-controller.php" method="post">
                                    <td>
                                        <button name="submit-delete-booking" value="<?php echo $booking['Booking_ID'] ?>" type="submit" class="btn btn-danger btn-sm px-3">
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-align-center img-thumbnail d-flex justify-content-center">
                            <img class="modal-img" id="user-image" src="../public/img/Users/jadinukadilshan@gmail.com.jpg" alt="Cannot Load Image">
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
                                            <input readonly id="bookingID" name="bookingID" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example1">Booking ID</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input pattern="([0-9]{9}[x|X|v|V]|[0-9]{12})" id="vehicleNumber" name="vehicleNumber" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example2">Vehicle Number</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid Vehicle Number</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-outline ">
                                            <input name="license" id="license" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example4">License</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid License</div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Email input -->
                                <div class="row mb-2">
                                    <div class="col">
                                        <label class="form-label mb-0 pb-0" for="form6Example5">Starting Date</label>
                                        <div class="form-outline mt-0">
                                            <input name="startingDate" id="startingDate" type="date" class="form-control" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid Date</div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Number input -->
                                <div class="row mb-4">
                                    <div class="col-12 ">
                                        <label class="form-label bg-white mb-0 pb-0 " for="typeSelect">Package Type</label>
                                        <select name="packageType" class="bg-white  form-control " id="packageType" required>
                                            <option selected value="Daily Basis"> Daily Basis </option>
                                            <option value="Weekly Basis"> Weekly Basis</option>
                                            <option value="Monthly Basis"> Monthly Basis</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-outline ">
                                            <input name="NIC" id="NIC" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example4">Customer NIC</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid NIC</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-outline">
                                            <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                                            <label class="form-label" for="textAreaExample">Description</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="submit-edit-user" class="btn btn-primary btn-block fs-6 py-2 mb-2">Update Booking</button>
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
    const modalTitle = document.getElementById('Modal-edit-title');
    const modalEditBookingID = document.getElementById('bookingID');
    const modalEditVehicleNumber = document.getElementById('vehicleNumber');
    const modalEditLicense = document.getElementById('license');
    const modalEditStartingDate = document.getElementById('startingDate');
    const modalEditPackageType = document.getElementById('packageType');
    const modalEditNIC = document.getElementById('NIC');
    const modalEditDescription = document.getElementById('description');

    function cellClickFire(x) {
        modalEditBookingID.value = table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditVehicleNumber.value = table.rows[x.rowIndex].cells[2].innerHTML;
        modalEditLicense.value = table.rows[x.rowIndex].cells[3].innerHTML;
        modalEditStartingDate.value = table.rows[x.rowIndex].cells[4].innerHTML;
        modalEditNIC.value = table.rows[x.rowIndex].cells[6].innerHTML;
        modalEditDescription.value = table.rows[x.rowIndex].cells[7].innerHTML;
        modalTitle.innerHTML = "Edit Booking ID: " + table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditPackageType.value = table.rows[x.rowIndex].cells[5].innerHTML;
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