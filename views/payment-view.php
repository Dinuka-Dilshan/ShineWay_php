<?php


$heading = 'VIEW ALL PAYMENTS';
require('./partials/header.php');

$paymentList = $_SESSION['paymentList'];


?>


<!--table-->

<div class="row g-3 mt-lg-3 mx-0">
    <div class="col-12">
        <div class="card shadow-0 border">
            <div class="card-header bg-main">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-12 col-lg-4 m-1 fw-bold fs-5 text-white">
                            Payments
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
                            <th class=" d-none fs-6 fw-bold" scope="col">#</th>
                            <th class="fs-6 fw-bold" scope="col">ID</th>
                            <th class="fs-6 fw-bold" scope="col">Amount</th>
                            <th class="fs-6 fw-bold" scope="col">Date</th>
                            <th class="fs-6 fw-bold" scope="col">Vehicle Number</th>
                            <th class="fs-6 fw-bold" scope="col">Customer NIC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $countTable = 1; ?>
                        <?php foreach ($paymentList as $payment) : ?>
                            <tr>
                                <th class="d-none" scope="row"><?php echo $countTable  ?></th>
                                <td><?php echo $payment['Booking_ID'] ?></td>
                                <td><?php echo $payment['Amount'] ?></td>
                                <td><?php echo $payment['date'] ?></td>
                                <td><?php echo $payment['Vehicle_num'] ?></td>
                                <td><?php echo $payment['Cus_NIC'] ?></td>
                            </tr>
                            <?php $countTable++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>












<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>




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