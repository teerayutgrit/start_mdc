<?php

// session_check
require_once 'session_check.php';
// การเชื่อมต่อฐานข้อมูล SQL Servers
include("dbcon.php");


// เซ็ต timezone
date_default_timezone_set('Asia/Bangkok');

// แทนค่า status
$processwork = "80";
// รับค่าจากฟอร์ม
$reqid = $_POST['reqid'];
// $OutletName = $_POST['OutletName'];
$update_datetime = date("Y-m-d h:i:sa");
$product_series_ = $_POST['product_series_'];


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

echo "<script> alert('Saved successfully'); window.location='salevisit_new.php';</script>";

// ปิดการเชื่อมต่อฐานข้อมูล
sqlsrv_close($conn);
?>