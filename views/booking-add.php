<?php



require('./partials/header.php');

$scriptSetValues;

$customerName;
$customerAddress;
$customerPhone;
$package;
$billDescription;
$billPrice;
$bookingID;


$error = -1; // -1 = no message to display   0 = no vehicle 1 = no customer 2= error 3= done

if (isset($_SESSION['bookingAddStatus'])) {
    if ($_SESSION['bookingAddStatus'] == 1) {
        $error = 1;
        $license = $_SESSION['failedToAddLicense'];
        $startingDate = $_SESSION['failedToAddStartingDate'];
        $packageType = $_SESSION['failedToAddPackageType'];
        $description = $_SESSION['failedToAddDescription'];
        $depositAmount = $_SESSION['failedToAddDepositAmount'];
        $advancedPayment = $_SESSION['failedToAddPayment'];
        $NIC = $_SESSION['failedToAddNIC'];
        $vehicleNumber = $_SESSION['failedToAddVehicleNumber'];

        $scriptSetValues = "setFiledsAfterFail( '$vehicleNumber', '$license', '$startingDate', '$packageType', '$NIC', '$depositAmount', '$advancedPayment', '$description');";

        unset($_SESSION['failedToAddLicense']);
        unset($_SESSION['failedToAddStartingDate']);
        unset($_SESSION['failedToAddPackageType']);
        unset($_SESSION['failedToAddDescription']);
        unset($_SESSION['failedToAddDepositAmount']);
        unset($_SESSION['failedToAddPayment']);
        unset($_SESSION['failedToAddNIC']);
        unset($_SESSION['failedToAddVehicleNumber']);
    } else if ($_SESSION['bookingAddStatus'] == 0) {
        $error = 0;
        $license = $_SESSION['failedToAddLicense'];
        $startingDate = $_SESSION['failedToAddStartingDate'];
        $packageType = $_SESSION['failedToAddPackageType'];
        $description = $_SESSION['failedToAddDescription'];
        $depositAmount = $_SESSION['failedToAddDepositAmount'];
        $advancedPayment = $_SESSION['failedToAddPayment'];
        $NIC = $_SESSION['failedToAddNIC'];
        $vehicleNumber = $_SESSION['failedToAddVehicleNumber'];

        $scriptSetValues = "setFiledsAfterFail( '$vehicleNumber', '$license', '$startingDate', '$packageType', '$NIC', '$depositAmount', '$advancedPayment', '$description');";

        unset($_SESSION['failedToAddLicense']);
        unset($_SESSION['failedToAddStartingDate']);
        unset($_SESSION['failedToAddPackageType']);
        unset($_SESSION['failedToAddDescription']);
        unset($_SESSION['failedToAddDepositAmount']);
        unset($_SESSION['failedToAddPayment']);
        unset($_SESSION['failedToAddNIC']);
        unset($_SESSION['failedToAddVehicleNumber']);
    } else if ($_SESSION['bookingAddStatus'] == 2) {
        $error = 2;
        $license = $_SESSION['failedToAddLicense'];
        $startingDate = $_SESSION['failedToAddStartingDate'];
        $packageType = $_SESSION['failedToAddPackageType'];
        $description = $_SESSION['failedToAddDescription'];
        $depositAmount = $_SESSION['failedToAddDepositAmount'];
        $advancedPayment = $_SESSION['failedToAddPayment'];
        $NIC = $_SESSION['failedToAddNIC'];
        $vehicleNumber = $_SESSION['failedToAddVehicleNumber'];

        $scriptSetValues = "setFiledsAfterFail( '$vehicleNumber', '$license', '$startingDate', '$packageType', '$NIC', '$depositAmount', '$advancedPayment', '$description');";

        unset($_SESSION['failedToAddLicense']);
        unset($_SESSION['failedToAddStartingDate']);
        unset($_SESSION['failedToAddPackageType']);
        unset($_SESSION['failedToAddDescription']);
        unset($_SESSION['failedToAddDepositAmount']);
        unset($_SESSION['failedToAddPayment']);
        unset($_SESSION['failedToAddNIC']);
        unset($_SESSION['failedToAddVehicleNumber']);
    } else if ($_SESSION['bookingAddStatus'] == 3) {
        $error = 3;
        $customerName = $_SESSION['billPreviewCustomerName'];
        $customerAddress = $_SESSION['billPreviewCustomerAddress'];
        $customerPhone = $_SESSION['billPreviewCustomerTelephone'];
        $package;

        if($_SESSION['billPreviewPackageType'] == "Daily Basis"){
            $package = $_SESSION['billPreviewVehicleDailyPrice'];
        }
        
        if($_SESSION['billPreviewPackageType'] == "Weekly Basis"){
            $package = $_SESSION['billPreviewVehicleWeeklyPrice'];
        }
        
        if($_SESSION['billPreviewPackageType'] == "Monthly Basis"){
            $package = $_SESSION['billPreviewVehicleMonthlyPrice'];
        }

        $billDescription = "Booking Payment  -  ".$_SESSION['billPreviewVehicleNumber'] ."  -  ". $_SESSION['billPreviewPackageType']."  -RS: ". $package;
        $billPrice  = $_SESSION['billPreviewDepositAmount'] + $_SESSION['billPreviewPayment'];
        $bookingID = $_SESSION['billPreviewBookingID'];
        
        
    } else {
        $error = -1;
    }

    unset($_SESSION['bookingAddStatus']);
}


?>



<div class="container-fluid print-hidden mt-2">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card border shadow-0 my-3 ">
                <div class="card-header fs-4 bg-success">
                    ADD BOOKING
                </div>
                <div class="card-body">
                    <form class=" needs-validation" novalidate method="POST" action="../controllers/booking-add-controller.php">
                        
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-outline">
                                    <input pattern="^[A-Z0-9]{2,3}[-][0-9]{4}$" id="vehicleNumber" name="vehicleNumber" type="text" class="form-control" required />
                                    <label class="form-label" for="form6Example2">Vehicle Number</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid Vehicle Number</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-outline ">
                                    <input pattern="^[A-Z]{1}[1-9]{7,8}[A-Z]{0,1}$" name="license" id="license" type="text" class="form-control" required />
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
                                    <input min="<?php echo date("Y-m-d") ?>" name="startingDate" id="startingDate" type="date" class="form-control" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Enter a valid Date</div>
                                </div>
                            </div>
                        </div>


                        <!-- Number input -->
                        <div class="row mb-3">
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
                                    <input pattern="^[0-9]{2}[0123]{1}[0-9]{6}[VX]{1}$" name="NIC" id="NIC" type="text" class="form-control" required />
                                    <label class="form-label" for="form6Example4">Customer NIC</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid NIC</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-outline ">
                                    <input name="depositAmount" id="depositAmount" type="Number" class="form-control" required />
                                    <label class="form-label" for="form6Example4">Deposit Amount</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid Amount</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-outline ">
                                    <input name="advancedPayment" id="advancedPayment" type="Number" class="form-control" required />
                                    <label class="form-label" for="form6Example4">Advanced Payment</label>
                                    <div class="valid-feedback ">Looks good!</div>
                                    <div class="invalid-feedback ">Enter a valid Amount</div>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-outline">
                                    <textarea pattern="[a-zA-Z0-9]*" class="form-control" id="description" name="description" rows="1"></textarea>
                                    <label class="form-label" for="textAreaExample">Description</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><button type="reset" class="btn btn-primary btn-block fs-6 py-2 mb-2">Reset</button></div>
                            <div class="col-6"><button type="submit" name="submit-add-booking" class="btn btn-primary btn-block fs-6 py-2 mb-2">Add</button></div>
                        </div>
                    </form>
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
                            <h6 class="modal-title text-danger " id="staticBackdropLabel"> No such customer!</h6>
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
                            <h6 class="modal-title text-danger " id="staticBackdropLabel">Vehicle Not available at the moment!</h6>
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
                                <p>To: <?php echo $customerName; ?></p>
                                <p>Address: <?php echo $customerAddress; ?></p>
                                <p>Phone: <?php echo $customerPhone; ?></p>
                            </div>
                            <div class="col-4 p-0">
                                <p class="fw-bold">Invoice</p>
                                <p id="billPreviewBookingID">ID  <?php echo $bookingID ?></p>
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
                                            <td id="billDescription"><?php echo $billDescription; ?></td>
                                            <td id="billPrice"><?php echo $billPrice; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row justify-content-end mt-4 ">
                            <div class="col-4" id="billSubTotal">
                                Sub Total:  <?php echo $billPrice; ?>
                            </div>
                        </div>
                        <div class="row justify-content-end border-bottom pb-3">
                            <div class="col-4" id="billTotal">
                              Total Price: <?php echo $billPrice; ?>
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



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
<script src="../public/js/form-validstion.js"></script>
<script src="../public/js/html2pdf.bundle.min.js"></script>
<script>
    function getByID(elementID) {
        return document.getElementById(elementID);
    }

    function setFiledsAfterFail( vehicleNumber, license, startingDate, packageType, NIC, depositAmount, advancedPayment, description) {
        
        getByID('vehicleNumber').value = vehicleNumber;
        getByID('license').value = license;
        getByID('startingDate').value = startingDate;
        getByID('NIC').value = NIC;
        getByID('packageType').value = packageType;
        getByID('depositAmount').value = depositAmount;
        getByID('advancedPayment').value = advancedPayment;
        getByID('description').value = description;
    }
    <?php
    if ($error == "0") {
        echo "document.getElementById('btnErrorModal').click();";
        echo $scriptSetValues;
    } else if ($error == "1") {
        echo "document.getElementById('btnModal').click();";
        echo $scriptSetValues;
    } else if ($error == "2") {
        echo "document.getElementById('btnErrorEmailModal').click();";
        echo $scriptSetValues;
    }else if ($error == "3") {
        echo "document.getElementById('btnModalBillPreview').click();";
    }

    
    ?>

  

    document.getElementById('printBtn').addEventListener('click', () => {

        const element = document.getElementById('print')
        html2pdf().from(element).toPdf().save(getByID('billPreviewBookingID').innerHTML+'.pdf')

    })
</script>

<?php
require('./partials/footer.php');
?>