<?php

session_start();

require('./partials/header.php');

$userList = $_SESSION['userList'];




?>


<!--table-->

<div class="row g-3 mt-lg-3">
    <div class="col-12">
        <div class="card shadow-0 border">
            <div class="card-header bg-success">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-12 col-lg-4 m-1 fw-bold fs-5 text-white">
                            Users
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
                            <th class="fs-6 fw-bold" scope="col">User Type</th>
                            <th class="fs-6 fw-bold" scope="col">Email</th>
                            <th class="fs-6 fw-bold" scope="col">Telephone</th>
                            <th class="fs-6 fw-bold" scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $countTable = 1; ?>
                        <?php foreach ($userList as $user) : ?>
                            <tr onclick="cellClickFire(this)" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">
                                <th scope="row"><?php echo $countTable  ?></th>
                                <td><?php echo $user['name'] ?></td>
                                <td><?php echo $user['NIC'] ?></td>
                                <td><?php echo $user['user_type'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td><?php echo $user['Telephone'] ?></td>
                                <td><?php echo $user['Address'] ?></td>
                                <form action="../controllers/user-view-controller.php" method="post">
                                    <td>
                                        <button name="submit-delete-user" value="<?php echo $user['ID'] ?>" type="submit" class="btn btn-danger btn-sm px-3">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </form>
                                <!--<form action="../controllers/user-edit-controller.php" method="post">-->
                                <td>
                                    <button data-mdb-toggle="modal" data-mdb-target="#modal2" name="submit-edit-user" value="<?php echo $user['ID'] ?>" type="submit" class="btn btn-secondary btn-sm px-3">
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
                <h5 class="modal-title" id="Modal-edit-title" >Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <form class=" needs-validation" novalidate>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-outline">
                                            <input id="Modal-edit-name" type="text" id="form6Example1" class="form-control" required />
                                            <label class="form-label" for="form6Example1">Name</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid name</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input id="Modal-edit-nic" type="text" id="form6Example2" class="form-control" required />
                                            <label class="form-label" for="form6Example2">NIC</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid NIC</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline ">
                                            <input id="Modal-edit-address" type="text" id="form6Example4" class="form-control" required />
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
                                            <input id="Modal-edit-email"  type="email" id="form6Example5" class="form-control" required />
                                            <label class="form-label" for="form6Example5">Email</label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Enter a valid Email</div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Number input -->
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input id="Modal-edit-phone" type="number" id="form6Example6" class="form-control" required />
                                            <label class="form-label" for="form6Example6">Phone</label>
                                            <div class="valid-feedback ">Looks good!</div>
                                            <div class="invalid-feedback ">Enter a valid phone number</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="bg-white mb-4 mt-1">
                                    <label class="form-label bg-white " for="customFile">Image</label>
                                    <input type="file" class="form-control bg-white " id="customFile" />
                                </div>

                                <select class="bg-white  form-control mb-4" required>
                                    <option selected value="1">User Type - Admin </option>
                                    <option value="1">User Type - User</option>
                                </select>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">Update User</button>
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







<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
<script src="../public/js/form-validstion.js"></script>
<!-- Modal image set -->
<script>
    const table = document.getElementById('dataTable');
    let userImage = document.getElementById('user-image');
    const modalTitle = document.getElementById('staticBackdropLabel');
    const modalEditName = document.getElementById('Modal-edit-name');
    const modalEditNIC = document.getElementById('Modal-edit-nic');
    const modalEditAddress = document.getElementById('Modal-edit-address');
    const modalEditPhone = document.getElementById('Modal-edit-phone');
    const modalEditEmail = document.getElementById('Modal-edit-email');
    const modalEditTitle = document.getElementById('Modal-edit-title');

    function cellClickFire(x) {
        userImage.src = `../public/img/Users/${table.rows[x.rowIndex].cells[4].innerHTML}.jpg`;
        modalTitle.innerHTML = table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditName.value = table.rows[x.rowIndex].cells[1].innerHTML;
        modalEditNIC.value = table.rows[x.rowIndex].cells[2].innerHTML;
        modalEditAddress.value = table.rows[x.rowIndex].cells[6].innerHTML;
        modalEditPhone.value = table.rows[x.rowIndex].cells[5].innerHTML;
        modalEditEmail.value = table.rows[x.rowIndex].cells[4].innerHTML;
        modalEditTitle.innerHTML = "Edit User: " + table.rows[x.rowIndex].cells[1].innerHTML;
    }
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