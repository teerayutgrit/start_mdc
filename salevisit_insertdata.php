<?php

//session_check
require_once 'session_check.php';
// การเชื่อมต่อฐานข้อมูล SQL Server
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
// $processwork = $_POST['processwork'];




// ตรวจสอบว่ามีไฟล์ที่ถูกอัปโหลดหรือไม่
if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
    $fileToUpload = $_FILES["fileToUpload"]["tmp_name"];
    // ใช้ชื่อ OutletName เป็นชื่อไฟล์และเพิ่มนามสกุลของไฟล์เดิม
    $fileExtension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
    $fileName = $OutletName . '.' . $fileExtension;

    // Reduce image size
    $reducedFilePath = 'reduced_' . $fileName;
    reduceImageSize($fileToUpload, $reducedFilePath, 1000, 1000,);

    // Azure Blob Storage connection settings
    $connectionString = 'DefaultEndpointsProtocol=https;AccountName=mardicraft2024;AccountKey=T9y7+eLYhKZWF4Ae0d6wPjMkRDcifPu5PgBmm65yS8aX+0SUFqQZrXe570kiFzCrX4lWmFvz2xrL+AStNVZ+Nw==;EndpointSuffix=core.windows.net';
    $containerName = 'mdcimg';

    try {
        // Create a Blob service client
        $blobServiceClient = BlobRestProxy::createBlobService($connectionString);

        // Create options for the blob
        $options = new CreateBlockBlobOptions();
        $options->setContentType(mime_content_type($reducedFilePath)); // Set content type based on the file

        // Upload the file to Azure Blob Storage
        $blobServiceClient->createBlockBlob($containerName, $fileName, fopen($reducedFilePath, "r"), $options);

        echo "File '$fileName' uploaded successfully.";
    } catch (\Exception $e) {
        echo "Error uploading file: " . $e->getMessage();
    }

    // Delete the reduced file after upload
    unlink($reducedFilePath);
} else {
    echo "No file uploaded or upload error.";
}

// เตรียมคำสั่ง SQL สำหรับการเพิ่มข้อมูล
$sql = "INSERT INTO MDC_Visitor (Status,Customer_name,Posting_datetime,Posting_date,User_name,Seat_total,Outlet_type,Range_Age,Gender, Latitude, Longitude,processwork,Customer_image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
$params = array($Status01,$OutletName,$postingdatetime,$postingdate,$user_name,$Seat_total,$Outlet_type,$RangeAge,$Gender, $lat, $lng,$processwork,$fileName);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}



echo "<script> alert('Saved'); window.location='salevisit_new.php';</script>";

// ปิดการเชื่อมต่อฐานข้อมูล
sqlsrv_close($conn);

// Function to reduce image size
function reduceImageSize($sourceFile, $destFile, $maxWidth, $maxHeight) {
    list($width, $height) = getimagesize($sourceFile);
    $ratio = $width/$height;
    if ($maxWidth/$maxHeight > $ratio) {
        $newWidth = $maxHeight*$ratio;
        $newHeight = $maxHeight;
    } else {
        $newHeight = $maxWidth/$ratio;
        $newWidth = $maxWidth;
    }
    $src = imagecreatefromstring(file_get_contents($sourceFile));
    $dst = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    imagejpeg($dst, $destFile);
    imagedestroy($src);
    imagedestroy($dst);
}
?>








