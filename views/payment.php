<?php
include('./partials/header.php');
require('../config/db.php');
if (isset($_SESSION['priceWithoutPrePayements']) && isset($_SESSION['billAmount']) && isset($_SESSION['bill-vehicleDetails'])) {
    $priceWithoutPrePayements = $_SESSION['priceWithoutPrePayements'];
    $customerDetails = $_SESSION['bill-customerDetails'];
    $amount = $_SESSION['billAmount'];
    $vehicleDetails = $_SESSION['bill-vehicleDetails'];
    $bookingDetails = $_SESSION['bill-bookingDetails'];
    $endingDate = $_SESSION['bill-endingDate'];
    $description =  $vehicleDetails[0]['Brand'] . "-" . $vehicleDetails[0]['Model'] . "-" . $vehicleDetails[0]['Vehicle_num'] . "-" . $bookingDetails[0]['Package_Type'] . "<br> (From: " . $bookingDetails[0]['Start_date'] . " To: " . $endingDate . ")";
    $deposits = $bookingDetails[0]['Deposit_Amount'];
    $advanced = $bookingDetails[0]['Advanced_Payment'];
}

?>

<div class="m-2 border ">
<div class="col-12 col-lg-4 p-3 fw-bold fs-5 text-white bg-success w-100 ">
MAKE PAYMENT
</div>
<div class="container-fluid print-hidden mt-5 p-2 mb-3">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-lg-6 ">
            <div class="card border shadow-0 my-3 ">
                <div class="card-header fs-4">
                    MAKE PAYMENT
                </div>
                <div class="card-body">
                    <form class=" needs-validation" novalidate method="POST" action="../controllers/payment-controller.php">

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-outline">
                                    <input id="payment-booking-id" name="payment-booking-id" type="number" class="form-control" required />
                                    <label class="form-label" for="form6Example2">Booking ID</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid Booking ID</div>
                                </div>
                            </div>
                        </div>



                        <div class="row mb-2">
                            <div class="col">
                                <label class="form-label mb-0 pb-0" for="form6Example5">Ending Date</label>
                                <div class="form-outline mt-0">
                                    <input min="<?php echo date("Y-m-d") ?>" name="payment-ending-Date" id="payment-ending-Date" type="date" class="form-control" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid Date</div>
                                </div>
                            </div>
                        </div>



                        <div class="row mt-3">
                            <div class="col-6"><button type="reset" class="btn btn-primary btn-block fs-6 py-2 mb-2">Reset</button></div>
                            <div class="col-6"><button type="submit" name="submit-payment" class="btn btn-primary btn-block fs-6 py-2 mb-2">Add</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<button type="button" class="btn btn-primary d-none " data-mdb-toggle="modal" data-mdb-target="#modalBillPreview" id="btnModalBillPreview">
    Launch static backdrop modal
</button>

<!-- Modal bill preview-->
<div class="modal fade" id="modalBillPreview" data-mdb-backdrop="static" data-mdb-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-body " id="print">

                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end ">
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="row border-bottom justify-content-center mt-3 align-items-center border-bottom border-top">
                            <div class="col-6 text-center">
                                <p class="fw-bold fs-4">SHINEWAY RENTAL</p>
                            </div>
                        </div>

                        <div class="row g-0 justify-content-between border-bottom mb-3">
                            <div class="col-4 p-0 ps-3">
                                <p>To: <?php echo  $customerDetails[0]['Cus_name']; ?></p>
                                <p>Address: <?php echo $customerDetails[0]['Cus_Address']; ?></p>
                                <p>Phone: <?php echo $customerDetails[0]['Tel_num']; ?></p>
                            </div>
                            <div class="col-4 p-0">
                                <p class="fw-bold">Invoice (Payment)</p>
                                <p id="billPreviewBookingID">ID <?php echo $bookingDetails[0]['Booking_ID'] ?></p>
                                <p>Issue Date: <?php echo date("Y-m-d") ?></p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <table class="table">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td id="billDescription"><?php echo $description; ?></td>
                                            <td id="billPrice"><?php echo  'Rs.' .  $priceWithoutPrePayements ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">2</th>
                                            <td id="billDescription"> Deposits</td>
                                            <td id="billPrice"> -<?php echo 'Rs.' .  $deposits ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">3</th>
                                            <td id="billDescription"> Advanced Payments</td>
                                            <td id="billPrice"> -<?php echo 'Rs.' .  $advanced ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row justify-content-end mt-4 ">
                            <div class="col-4" id="billSubTotal">
                                Sub Total: <?php echo $amount; ?>
                            </div>
                        </div>
                        <div class="row justify-content-end border-bottom pb-3">
                            <div class="col-4" id="billTotal">
                                Total Price: <?php echo $amount; ?>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <p class="text-center fs-6">Thank You | Shineway &copy;2021</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="printBtn">
                    Print
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal  -->
<button type="button" class="btn btn-primary d-none" data-mdb-toggle="modal" data-mdb-target="#modalErrorEmailMessage" id="btnErrorEmailModal">
    Launch static backdrop modal
</button>

<!-- Modal error -->
<div class="modal fade" id="modalErrorEmailMessage" data-mdb-backdrop="static" data-mdb-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-10">
                            <h6 class="modal-title text-danger " id="staticBackdropLabel"> Cannot Find Booking ID!</h6>
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
<script src="../public/js/html2pdf.bundle.min.js"></script>

<script>
    document.getElementById('printBtn').addEventListener('click', () => {

        const element = document.getElementById('print')
        html2pdf().from(element).toPdf().save(document.getElementById('billPreviewBookingID').innerHTML + '.pdf')

    })
</script>
<?php
if (!isset($_SESSION['error']) && isset($_SESSION['billAmount']) && isset($_SESSION['bill-vehicleDetails']) && isset($_SESSION['bill-bookingDetails'])) {

    echo "<script> document.getElementById('btnModalBillPreview').click(); </script> ";
    unset($_SESSION['billAmount']);
    unset($_SESSION['billAmount']);
    unset($_SESSION['bill-vehicleDetails']);
    unset($_SESSION['bill-bookingDetails']);
    unset($_SESSION['bill-customerDetails']);
    unset($_SESSION['bill-endingDate']);
    unset($_SESSION['priceWithoutPrePayements']);
}

if (isset($_SESSION['error'])) {
    echo "<script> document.getElementById('btnErrorEmailModal').click();</script>";
    unset($_SESSION['error']);
}

require('./partials/footer.php');
?>