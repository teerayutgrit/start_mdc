<?php


// session_check
require_once 'session_check.php';
// การเชื่อมต่อฐานข้อมูล SQL Servers
include("dbcon.php");

// อัปโหลดไฟล์ไปยัง Azure Blob Storage
require_once 'vendor/autoload.php'; // Include Composer's autoloader

// ดึงข้อมูลรูปภาพจากฐานข้อมูล
// $sql = "SELECT Customer_image FROM MDC_Visitor where id ='272'"; // ระบุเงื่อนไขที่ต้องการ
// $stmt = sqlsrv_query($conn, $sql);
// $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

// $images = explode(',', $row['Customer_image']);
// ?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Images</title>
</head>
<body>
    <div class="gallery">
        <?php foreach ($images as $image): ?>
            <img src="https://mardicraft2024.blob.core.windows.net/mdcimg/<?php echo $image; ?>" alt="Customer Image">
        <?php endforeach; ?>
    </div>
</body>
</html> -->

<?php
$sasToken = "si=readonly&sv=2022-11-02&sr=c&sig=GuZdU2IHmFOrcpcx3ka7yuM0T0%2Fay6EraGqIT6IYl54%3D"; // Replace with your actual SAS token

// ตัวอย่างการเชื่อมต่อฐานข้อมูลและ query เพื่อดึงข้อมูลรูปภาพ
$sql = "SELECT Customer_image FROM MDC_Visitor WHERE id ='273'"; // ระบุเงื่อนไขที่ต้องการ
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    echo "Error in statement execution.\n";
    die(print_r(sqlsrv_errors(), true));
}

// วนลูปเพื่อแสดงรูปภาพ
while ($result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $images = explode(',', $result['Customer_image']); // แยกข้อมูลรูปภาพจากฐานข้อมูล
    foreach ($images as $image) {
        $blobUrl = "https://mardicraft2024.blob.core.windows.net/mdcimg/" . urlencode($image) . "?" . $sasToken;?>
        <div class="card-body d-flex justify-content-center align-items-center">
            <img src="<?php echo $blobUrl; ?>" alt="Customer Image" style="width: 370px; height: auto;">
        </div>
<?php
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="test123a.css">

    
</head>

<body>
    
    <div class="photo-gallery">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Lightbox Gallery</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
            </div>
            <?php
            foreach ($images as $image) {
                $blobUrl = "https://mardicraft2024.blob.core.windows.net/mdcimg/" . urlencode($image) . "?" . $sasToken;
                ?>
            <div class="row photos">
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="<?php echo $blobUrl; ?>" data-lightbox="photos"><img class="img-fluid" src="<?php echo $blobUrl; ?>"></a></div>
            </div>
            <?php
            }
              ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
</html>



