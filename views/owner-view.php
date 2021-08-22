<?php

session_start();

require('./partials/header.php');

$ownerList = $_SESSION['ownerList'];

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
                            Vehicle Owners
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
                            <th class="fs-6 fw-bold d-none" scope="col">Salute</th>
                            <th class="fs-6 fw-bold" scope="col">Email</th>
                            <th class="fs-6 fw-bold" scope="col">Telephone</th>
                            <th class="fs-6 fw-bold" scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Owner_NIC`, `Salute`, `Owner_NIC`, `Tel_num`, `Owner_Email`, `Owner_Address-->
                        <?php $countTable = 1; ?>
                        <?php foreach ($ownerList as $owner) : ?>
                            <tr onclick="cellClickFire(this)" >
                                <th scope="row"><?php echo $countTable  ?></th>
                                <td><?php echo $owner['Owner_name'] ?></td>
                                <td><?php echo $owner['Owner_NIC'] ?></td>
                                <td class="d-none"><?php echo $owner['Salute'] ?></td>
                                <td><?php echo $owner['Owner_Email'] ?></td>
                                <td><?php echo $owner['Tel_num'] ?></td>
                                <td><?php echo $owner['Owner_Address'] ?></td>
                                <td class="d-none"><?php echo $owner['ID'] ?></td>
                                <form action="../controllers/owner-view-controller.php" method="post">
                                    <td>
                                        <button name="submit-delete-owner" value="<?php echo $owner['ID'] ?>" type="submit" class="btn btn-danger btn-sm px-3">
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
                            <form  class=" needs-validation" novalidate action="../controllers/owner-edit-controller.php" method="POST">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-outline">
                                            <input pattern="^(?![ .]+$)[a-zA-Z .]*" id="Modal-edit-name" name="name" type="text" class="form-control" required />
                                            <label class="form-label" for="form6Example1">Name</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid name</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input pattern="([0-9]{9}[x|X|v|V]|[0-9]{12})" id="Modal-edit-nic" name="NIC" type="text" id="form6Example2" class="form-control" required />
                                            <label class="form-label" for="form6Example2">NIC</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid NIC</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline ">
                                            <input pattern="^(?![0-9]+$)[a-zA-Z0-9 ,]{2,}$" name="address" id="Modal-edit-address" type="text"  class="form-control" required />
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
                                            <input name="email" id="Modal-edit-email" type="email"  class="form-control" required />
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
                                            <input pattern="[0-9]{10}" name="phone" id="Modal-edit-phone" type="text" id="form6Example6" class="form-control" required />
                                            <label class="form-label" for="form6Example6">Phone</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid phone number</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    
                                </div>


                                
                                <!-- Submit button -->
                                <button type="submit" name="submit-edit-owner" class="btn btn-primary btn-block fs-6 py-2 mb-2">Update User</button>
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
    const modalEditName = document.getElementById('Modal-edit-name');
    const modalEditNIC = document.getElementById('Modal-edit-nic');
    const modalEditAddress = document.getElementById('Modal-edit-address');
    const modalEditPhone = document.getElementById('Modal-edit-phone');
    const modalEditEmail = document.getElementById('Modal-edit-email');
    const modalEditTitle = document.getElementById('Modal-edit-title');

    function cellClickFire(x) {
        modalTitle.innerHTML = table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditName.value = table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditNIC.value = table.rows[x.rowIndex].cells[2].innerHTML;
        modalEditAddress.value = table.rows[x.rowIndex].cells[6].innerHTML;
        modalEditPhone.value = table.rows[x.rowIndex].cells[5].innerHTML;
        modalEditEmail.value = table.rows[x.rowIndex].cells[4].innerHTML;
        modalEditTitle.innerHTML = "Edit User: " + table.rows[x.rowIndex].cells[1].innerHTML;
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

