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

$Customer_count ="1";
// แทนค่า status
$processwork = "40";


// รับค่าจากฟอร์ม

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

// $Situation = $_POST['Situation'];
// $lat = $_POST['lat'];
// $lng = $_POST['lng'];

// เตรียมคำสั่ง SQL สำหรับการเพิ่มข้อมูล

$sql = "INSERT INTO MDC_Visitor (Status_vs, Customer_name, Posting_datetime, Posting_date, User_name, Seat_total, Outlet_type, Spendingperhead, Outlet_Zone,Delivery,Promotion,Event_outlet,Situation,openingandclosingtimes,Range_Age, Gender, Latitude, Longitude, processwork, Customer_image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$params = array($Status01, $OutletName, $postingdatetime, $postingdate, $user_name, $Seat_total, $Outlet_type, $Spendingperhead,$Outlet_Zone,$Delivery,$Promotionbeer,$Event,$Situation,$openingandclosingtimes,$RangeAge, $Gender, $lat, $lng, $processwork, $fileNamesString);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}


$sqlCustomerTransaction = "INSERT INTO Customer_transaction (Customer_name,Customer_count,User_name) VALUES (?,?,?)";
$paramsCustomerTransaction = array( $OutletName,$Customer_count,$user_name);
$stmtInsertCustomerTransaction = sqlsrv_query($conn, $sqlCustomerTransaction, $paramsCustomerTransaction);

if ($stmtInsertCustomerTransaction === false) {
    die(print_r(sqlsrv_errors(), true));
}
// echo "<script> alert('Saved'); window.location='salevisit_new1.php';</script>";

// ปิดการเชื่อมต่อฐานข้อมูล
sqlsrv_close($conn);
?>


















