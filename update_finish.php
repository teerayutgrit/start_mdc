<?php

// session_check
require_once 'session_check.php';
// การเชื่อมต่อฐานข้อมูล SQL Servers
include("dbcon.php");


// เซ็ต timezone
date_default_timezone_set('Asia/Bangkok');

// แทนค่า status
$processwork = "100";
// รับค่าจากฟอร์ม
$reqid = $_POST['reqid'];
// $OutletName = $_POST['OutletName'];
$update_datetime_finish = date("Y-m-d h:i:sa");


// เตรียมคำสั่ง SQL สำหรับการอัปเดตข้อมูล
$sql = "UPDATE MDC_Visitor SET  
    processwork = ?,
    update_datetime_finish = ?
    WHERE id = ?";

$params = array($processwork, $update_datetime_finish, $reqid);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "<script> alert('Saved successfully'); window.location='re_visitmain.php';</script>";

// ปิดการเชื่อมต่อฐานข้อมูล
sqlsrv_close($conn);
?>