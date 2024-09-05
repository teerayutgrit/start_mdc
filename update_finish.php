<?php
// session_check
require_once 'session_check.php';
// การเชื่อมต่อฐานข้อมูล SQL Servers
include("dbcon.php");

// เซ็ต timezone
date_default_timezone_set('Asia/Bangkok');

// แทนค่า status
$processwork = "100";
$Status_outlet = "Existing";

// ตรวจสอบว่าค่า reqid และ status_finish ถูกส่งมาจากฟอร์ม
if (isset($_POST['reqid']) && isset($_POST['status_finish'])) {
    // รับค่าจากฟอร์ม
    $reqid = $_POST['reqid'];
    $status_finish = $_POST['status_finish'];

    // Debugging output
    error_log("reqid: " . $reqid);
    error_log("status_finish: " . $status_finish);

    $update_datetime_finish = date("Y-m-d h:i:sa");
    $update_date_finish = date("Y-m-d");

    // เตรียมคำสั่ง SQL สำหรับการอัปเดตข้อมูล
    $sql = "UPDATE MDC_Visitor SET  
        processwork = ?,
        update_datetime_finish = ?,
        update_date_finish = ?,
        status_finish = ?,
        Status_outlet = ?
        WHERE id = ?";

    $params = array($processwork, $update_datetime_finish, $update_date_finish, $status_finish,$Status_outlet, $reqid);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "<script> alert('Saved successfully'); window.location='salevisit_new.php';</script>";
} else {
    error_log("Required data missing: reqid or status_finish not set");
    echo "<script> alert('Required data missing'); window.location='salevisit_new.php';</script>";
}

// ปิดการเชื่อมต่อฐานข้อมูล
sqlsrv_close($conn);
?>
