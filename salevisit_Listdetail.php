<?php 

// session_check
require_once 'session_check.php';
// การเชื่อมต่อฐานข้อมูล SQL Servers
include("dbcon.php");

// อัปโหลดไฟล์ไปยัง Azure Blob Storage
require_once 'vendor/autoload.php'; // Include Composer's autoloader

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

// เซ็ต timezone
date_default_timezone_set('Asia/Bangkok');

// เซ็ตค่าของวันที่
$postingdatetime = date("Y-m-d h:i:sa");
$postingdate = date("Y-m-d");
$Status01 = "Register";
$Status_outlet = "New Outlet";
// แทนค่า status
$processwork = "40";

// รับค่าจากฟอร์ม
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $checkboxes = $_POST['checkboxes'];
    $Product_good = $_POST['Product_good'];
    if (!empty($checkboxes)) {
        $checkboxString = implode(',', $checkboxes);
        $combinedString = $checkboxString . ',' . $Product_good;
    } else {
        $combinedString = $Product_good;
    }

    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $OutletName = $_POST['OutletName'];
    $Seat_total = $_POST['Seat_total'];
    $Outlet_type = $_POST['Outlet_type'];
    $RangeAge = $_POST['RangeAge'];
    $Gender = $_POST['Gender'];
    $Outlet_Zone = $_POST['Outlet_Zone'];
    $openingandclosingtimes = $_POST['openingandclosingtimes'];
    $Spendingperhead = $_POST['Spendingperhead'];
    $Delivery = $_POST['Delivery'];
    $Promotionbeer = $_POST['Promotionbeer'];
    $Event = $_POST['Event'];
    $Situation = $_POST['Situation'];
    $Contact_outlet = $_POST['Contact_outlet'];

    // Azure Blob Storage connection settings
    $connectionString = 'DefaultEndpointsProtocol=https;AccountName=mardicraft2024;AccountKey=T9y7+eLYhKZWF4Ae0d6wPjMkRDcifPu5PgBmm65yS8aX+0SUFqQZrXe570kiFzCrX4lWmFvz2xrL+AStNVZ+Nw==;EndpointSuffix=core.windows.net';
    $containerName = 'mdcimg';

    // ตรวจสอบว่ามีไฟล์ที่ถูกอัปโหลดหรือไม่
    if (isset($_FILES["filesToUpload"])) {
        $fileNames = [];
        $folderName = $OutletName;

        foreach ($_FILES["filesToUpload"]["tmp_name"] as $key => $tmp_name) {
            $fileToUpload = $tmp_name;
            $fileExtension = pathinfo($_FILES["filesToUpload"]["name"][$key], PATHINFO_EXTENSION);
            $fileName = $folderName . '/' . $OutletName . '_' . time() . '_' . $key . '.' . $fileExtension; // Create folder structure
            $fileNames[] = $fileName;

            try {
                // Create a Blob service client
                $blobServiceClient = BlobRestProxy::createBlobService($connectionString);

                // Create options for the blob
                $options = new CreateBlockBlobOptions();
                $options->setContentType(mime_content_type($fileToUpload)); // Set content type based on the file

                // Upload the file to Azure Blob Storage
                $blobServiceClient->createBlockBlob($containerName, $fileName, fopen($fileToUpload, "r"), $options);

                // echo "File '$fileName' uploaded successfully.";
            } catch (\Exception $e) {
                echo "Error uploading file: " . $e->getMessage();
            }
        }

        // Remove duplicate file names
        $uniqueFileNames = array_unique($fileNames);

        // แปลง array ของชื่อไฟล์เป็น string ที่คั่นด้วยเครื่องหมายจุลภาค
        $fileNamesString = implode(',', $uniqueFileNames);
    } else {
        echo "No file uploaded or upload error.";
        $fileNamesString = null;
    }

    // เตรียมคำสั่ง SQL สำหรับการเพิ่มข้อมูล
    $sql = "INSERT INTO MDC_Visitor (Status_vs, Customer_name, Posting_datetime, Posting_date, User_name, Seat_total, Outlet_type, Spendingperhead, Outlet_Zone, Delivery, Promotion, Event_outlet, Situation, openingandclosingtimes, Range_Age, Gender, Latitude, Longitude, processwork, Customer_image, PD_good1, Contact_outlet, Status_outlet) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $params = array($Status01, $OutletName, $postingdatetime, $postingdate, $user_name, $Seat_total, $Outlet_type, $Spendingperhead, $Outlet_Zone, $Delivery, $Promotionbeer, $Event, $Situation, $openingandclosingtimes, $RangeAge, $Gender, $lat, $lng, $processwork, $fileNamesString, $combinedString, $Contact_outlet, $Status_outlet);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "<script>console.log('Success:', 'Data saved successfully.'); $('#saveModal').modal('show');</script>";

    // ปิดการเชื่อมต่อฐานข้อมูล
    sqlsrv_close($conn);

    // echo "<script>console.log('Success:', 'Data saved successfully.'); $('#saveModal').modal('show');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mardi Craft Brewing - New Visit</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo-mardicraft.svg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>
    <!-- บันทึกสำเร็จ modal HTML -->
    <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Saved</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">successfully saved.</div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                    <a class="btn btn-primary" href="salevisit_new.php">Go to New Sale Visit</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

   