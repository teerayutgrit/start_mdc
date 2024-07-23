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
$Status_outlet = "Existing";
// แทนค่า status
$processwork = "40";

$Customer_count ="1";

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $outlet_value = $_POST['OutletName'];
        list($Customer_No, $OutletName) = explode('|', $outlet_value);
        // Now you have both $customer_no and $customer_name
        // echo "Customer No: " . $Customer_No . "<br>";
        // echo "Customer Name: " . $OutletName;
    }

    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    // $OutletName = $_POST['OutletName'];
    // $Customer_No = $_POST['Customer_No'];
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
        $folderName = $Customer_No;

        foreach ($_FILES["filesToUpload"]["tmp_name"] as $key => $tmp_name) {
            $fileToUpload = $tmp_name;
            $fileExtension = pathinfo($_FILES["filesToUpload"]["name"][$key], PATHINFO_EXTENSION);
            $fileName = $folderName . '/' . $Customer_No . '_' . time() . '_' . $key . '.' . $fileExtension; // Create folder structure
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
    $sql = "INSERT INTO MDC_Visitor (Status_vs, Customer_name, Posting_datetime, Posting_date, User_name, Seat_total, Outlet_type, Spendingperhead, Outlet_Zone, Delivery, Promotion, Event_outlet, Situation, openingandclosingtimes, Range_Age, Gender, Latitude, Longitude, processwork, Customer_image, PD_good1, Contact_outlet, Status_outlet,Customer_No) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $params = array($Status01, $OutletName, $postingdatetime, $postingdate, $user_name, $Seat_total, $Outlet_type, $Spendingperhead, $Outlet_Zone, $Delivery, $Promotionbeer, $Event, $Situation, $openingandclosingtimes, $RangeAge, $Gender, $lat, $lng, $processwork, $fileNamesString, $combinedString, $Contact_outlet, $Status_outlet,$Customer_No);
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


    echo "<script> alert('Saved successfully'); window.location='salevisit_Ex.php';</script>";

    // ปิดการเชื่อมต่อฐานข้อมูล
    sqlsrv_close($conn);
}
