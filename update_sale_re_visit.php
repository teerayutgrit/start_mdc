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

// แทนค่า status
$processwork = "80";
// รับค่าจากฟอร์ม
$reqid = $_POST['reqid'];
// $OutletName = $_POST['OutletName'];
$update_datetime = date("Y-m-d h:i:sa");
$product_series_ = $_POST['product_series_'];;




// ตรวจสอบว่ามีไฟล์ที่ถูกอัปโหลดหรือไม่
// if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
//     $fileToUpload = $_FILES["fileToUpload"]["tmp_name"];
//      ใช้ชื่อ OutletName เป็นชื่อไฟล์และเพิ่มนามสกุลของไฟล์เดิม
//     $fileExtension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
//     $fileName = $OutletName . '.' . $fileExtension;

//     Azure Blob Storage connection settings
//     $connectionString = 'DefaultEndpointsProtocol=https;AccountName=mardicraft2024;AccountKey=T9y7+eLYhKZWF4Ae0d6wPjMkRDcifPu5PgBmm65yS8aX+0SUFqQZrXe570kiFzCrX4lWmFvz2xrL+AStNVZ+Nw==;EndpointSuffix=core.windows.net';
//     $containerName = 'mdcimg';

//     try {
//          Create a Blob service client
//         $blobServiceClient = BlobRestProxy::createBlobService($connectionString);

//          Create options for the blob
//         $options = new CreateBlockBlobOptions();
//         $options->setContentType(mime_content_type($fileToUpload));  Set content type based on the file

//          Upload the file to Azure Blob Storage
//         $blobServiceClient->createBlockBlob($containerName, $fileName, fopen($fileToUpload, "r"), $options);

//          echo "File '$fileName' uploaded successfully.";
//     } catch (\Exception $e) {
//         echo "Error uploading file: " . $e->getMessage();
//     }
// } else {
//     $fileName = null;
// }

// เตรียมคำสั่ง SQL สำหรับการอัปเดตข้อมูล
$sql = "UPDATE MDC_Visitor SET  
    processwork = ?,
    update_datetime = ?,
    Present_pd = ?
    WHERE id = ?";

$params = array($processwork, $update_datetime, $product_series_, $reqid);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "<script> alert('Updated'); window.location='re_visitmaintest.php';</script>";

// ปิดการเชื่อมต่อฐานข้อมูล
sqlsrv_close($conn);
?>