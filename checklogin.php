<?php
session_start();
ob_start();

if (!isset($_SESSION)) {
    session_start();
}

include 'dbcon.php';

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if ($conn === false) {
    echo "<script> alert('ไม่สามารถเชื่อมต่อฐานข้อมูลได้'); history.back(); </script>";
    exit();
}

$userId = $_POST['exampleInputID'];
$password = $_POST['exampleInputPassword'];

// การเตรียมคำสั่ง SQL
$stmt = "SELECT * FROM User_MDC WHERE User_id = ? AND Password_user = ?";
$params = array($userId, $password);
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$query = sqlsrv_query($conn, $stmt, $params, $options);

// ตรวจสอบการดำเนินการคำสั่ง SQL
if ($query === false) {
    echo "<script> alert('เกิดข้อผิดพลาดในการดำเนินการคำสั่ง SQL'); history.back(); </script>";
    exit();
}

$result1 = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

if (!$result1) {
    echo "<script> alert('รหัสประจำตัวหรือรหัสผ่านไม่ถูกต้อง'); history.back(); </script>";
} else {
    if ($result1["Lv"] == 1) {
        echo "<script> alert('ผู้ใช้ไม่มีสิธิ์'); history.back(); </script>";
    } else {
        $_SESSION["User_id"] = $result1["User_id"];
        $_SESSION["User_Name"] = $result1["User_Name"];
        $_SESSION["Password_user"] = $result1["Password_user"];
        $_SESSION["department"] = $result1["department"];
        
        session_write_close();
        
        $Frm = "index.php";
        header("Location: " . $Frm);
        exit(); // Ensure no further code is executed after the redirect
    }
}

sqlsrv_free_stmt($query); // ปิดคำสั่ง SQL
sqlsrv_close($conn); // ปิดการเชื่อมต่อฐานข้อมูล
?>

