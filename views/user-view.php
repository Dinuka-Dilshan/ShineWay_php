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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    
<!-- Modal image set -->
<script>
    const table = document.getElementById('dataTable');
    let userImage = document.getElementById('user-image');
    const modalTitle = document.getElementById('staticBackdropLabel');

    function cellClickFire(x) {
        userImage.src = `../public/img/Users/${table.rows[x.rowIndex].cells[4].innerHTML}.jpg`;
        modalTitle.innerHTML = table.rows[x.rowIndex].cells[1].innerHTML;
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