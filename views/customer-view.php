<?php



require('./partials/header.php');

$customerList = $_SESSION['customerList'];

$error = -1; // -1 = no message to display 1 = successfull  0 = error

if (isset($_SESSION['customerEditStatus'])) {
    if ($_SESSION['customerEditStatus'] == 1) {
        $error = 1;
    } else if ($_SESSION['customerEditStatus'] == 0) {
        $error = 0;
    } else {
        $error = -1;
    }

    unset($_SESSION['customerEditStatus']);
}
?>


<!--table-->

<div class="row g-3 mt-lg-3 mx-0">
    <div class="col-12">
        <div class="card shadow-0 border">
            <div class="card-header bg-success">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-12 col-lg-4 m-1 fw-bold fs-5 text-white">
                            Customers
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
                            <th class="fs-6 fw-bold" scope="col">Name</th>
                            <th class="fs-6 fw-bold" scope="col">NIC</th>
                            <th class="fs-6 fw-bold" scope="col">Lisence No:</th>
                            <th class="fs-6 fw-bold" scope="col">Email</th>
                            <th class="fs-6 fw-bold" scope="col">Telephone</th>
                            <th class="fs-6 fw-bold" scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $countTable = 1; ?>
                        <?php foreach ($customerList as $customer) : ?>
                            <tr onclick="cellClickFire(this)">
                                <th scope="row"><?php echo $countTable  ?></th>
                                <td><?php echo $customer['Cus_name'] ?></td>
                                <td><?php echo $customer['Cus_NIC'] ?></td>
                                <td><?php echo $customer['Licen_num'] ?></td>
                                <td><?php echo $customer['Email'] ?></td>
                                <td><?php echo $customer['Tel_num'] ?></td>
                                <td><?php echo $customer['Cus_Address'] ?></td>
                                <form action="../controllers/customer-view-controller.php" method="post">
                                    <td>
                                        <button name="submit-delete-customer" value="<?php echo $customer['Cus_NIC'] ?>" type="submit" class="btn btn-danger btn-sm px-3">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </form>

                                <td>
                                    <button data-mdb-toggle="modal" data-mdb-target="#modal2" type="button" class="btn btn-secondary btn-sm px-3">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                </td>

                            </tr>
                            <?php $countTable++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit user-->
<div class="modal fade" id="modal2" data-mdb-backdrop="static" data-mdb-keyboard="false">
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
                            <form enctype="multipart/form-data" class=" needs-validation" novalidate action="../controllers/customer-edit-controller.php" method="POST">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-outline">
                                            <input pattern="^(?![ .]+$)[a-zA-Z .]*" id="name" name="customer-edit-name" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example1">Name</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid name</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input readonly pattern="([0-9]{9}[x|X|v|V]|[0-9]{12})" id="nic" name="customer-edit-NIC" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example2">NIC</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid NIC</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline ">
                                            <input pattern="^(?![0-9]+$)[a-zA-Z0-9 ,]{2,}$" name="customer-edit-address" id="address" type="text" class="form-control" required />
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
                                            <input name="customer-edit-email" id="email" type="email" class="form-control" required />
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
                                            <input pattern="[0-9]{10}" name="customer-edit-phone" id="phone" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example6">Phone</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid phone number</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">

                                    <div class="col">
                                        <div class="form-outline">
                                            <input readonly pattern="^[A-Z]{1}[1-9]{7,8}[A-Z]{0,1}$" name="customer-edit-license" id="license" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example6">License</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid licence number</div>
                                        </div>
                                    </div>



                                </div>


                                
                                <!-- Submit button -->
                                <button type="submit" name="submit-edit-customer" class="btn btn-primary btn-block fs-6 py-2 mb-2">Update Customer</button>
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
    const modalTitle = document.getElementById('staticBackdropLabel');
    const modalEditName = document.getElementById('name');
    const modalEditNIC = document.getElementById('nic');
    const modalEditAddress = document.getElementById('address');
    const modalEditPhone = document.getElementById('phone');
    const modalEditEmail = document.getElementById('email');
    const modalEditTitle = document.getElementById('Modal-edit-title');
    const modalEditLicense = document.getElementById('license');

    function cellClickFire(x) {
        modalEditName.value = table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditNIC.value = table.rows[x.rowIndex].cells[2].innerHTML;
        modalEditAddress.value = table.rows[x.rowIndex].cells[6].innerHTML;
        modalEditPhone.value = table.rows[x.rowIndex].cells[5].innerHTML;
        modalEditEmail.value = table.rows[x.rowIndex].cells[4].innerHTML;
        modalEditTitle.innerHTML = "Edit Customer: " + table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditLicense.value = table.rows[x.rowIndex].cells[3].innerHTML;
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