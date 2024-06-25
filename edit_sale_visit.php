<?php

// session_check
require_once 'session_check.php';
// การเชื่อมต่อฐานข้อมูล SQL Servers
include("dbcon.php");

// เซ็ต timezone
date_default_timezone_set('Asia/Bangkok');

// รับค่าจากฟอร์ม
$reqid = $_POST['reqid'];

// เซ็ตค่าของวันที่
$postingdatetime = date("Y-m-d h:i:sa");
$postingdate = date("Y-m-d");


$combinedString = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $checkboxes = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];
    $Product_good = isset($_POST['Product_good']) ? $_POST['Product_good'] : '';
    if (!empty($checkboxes)) {
        $checkboxString = implode(',', $checkboxes);
        $combinedString = $checkboxString . ',' . $Product_good;
    } else {
        $combinedString = $Product_good; // ถ้าไม่มีการเลือก checkbox
    }
}   

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
$Status_outlet = $_POST['Status_outlet'];

// เตรียมคำสั่ง SQL สำหรับการอัปเดตข้อมูล
$sql = "UPDATE MDC_Visitor SET
    Customer_name = ?, 
    Posting_datetime= ?, 
    Posting_date= ?, 
    Seat_total= ?, 
    Outlet_type= ?,
    Spendingperhead= ?,
    Outlet_Zone= ?,
    Delivery= ?,
    Promotion= ?,
    Event_outlet= ?,
    Situation= ?,
    openingandclosingtimes= ?,
    Range_Age= ?,
    Gender= ?,
    Contact_outlet= ?,
    Status_outlet= ?,
    PD_good1 = ?
    WHERE id = ?";

$params = array($OutletName, $postingdatetime, $postingdate, $Seat_total, $Outlet_type, $Spendingperhead, $Outlet_Zone, $Delivery, $Promotionbeer, $Event, $Situation, $openingandclosingtimes, $RangeAge, $Gender, $Contact_outlet, $Status_outlet, $combinedString, $reqid);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "<script> alert('Saved successfully'); window.location='salevisit_new.php';</script>";

// ปิดการเชื่อมต่อฐานข้อมูล
sqlsrv_close($conn);
?>
