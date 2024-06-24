<?php

// session_check
require_once 'session_check.php';
// การเชื่อมต่อฐานข้อมูล SQL Servers
include("dbcon.php");


// เซ็ต timezone
date_default_timezone_set('Asia/Bangkok');

// แทนค่า status
// $processwork = "80";
// รับค่าจากฟอร์ม
$reqid = $_POST['reqid'];

// เซ็ตค่าของวันที่
$postingdatetime = date("Y-m-d h:i:sa");
$postingdate = date("Y-m-d");
// $Status01 = "Register";
// แทนค่า status
// $processwork = "40";
// รับค่าจากฟอร์ม
// $lat = $_POST['lat'];
// $lng = $_POST['lng'];
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
    Gender= ?
    WHERE id = ?";

$params = array($OutletName, $postingdatetime, $postingdate,$Seat_total,$Outlet_type, $Spendingperhead,$Outlet_Zone,$Delivery,$Promotionbeer,$Event,$Situation,$openingandclosingtimes,$RangeAge,$Gender,$reqid);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "<script> alert('Saved successfully'); window.location='salevisit_new.php';</script>";

// ปิดการเชื่อมต่อฐานข้อมูล
sqlsrv_close($conn);
?>