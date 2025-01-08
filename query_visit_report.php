<?php
// Include the session check file
require_once 'session_check.php';

// Include the database connection file
include_once 'dbcon.php';

// Set the timezone
date_default_timezone_set('Asia/Bangkok');

// รับค่าจากฟอร์ม
$user_name = isset($_POST["User_Name"]) ? $_POST["User_Name"] : null;
$filterMonth = isset($_POST["filterMonth2"]) ? $_POST["filterMonth2"] : null;
$filterYear = null;

// หากมีการส่งค่า filterMonth มา แยกค่าเป็นปีและเดือน
if ($filterMonth) {
    list($filterYear, $filterMonth) = explode('-', $filterMonth);
}

// ฟังก์ชันสำหรับดึงข้อมูลด้วย prepared statements
function fetchData($conn, $sql, $params = null) {
    $stmt = sqlsrv_prepare($conn, $sql, $params);
    if ($stmt === false) {
        die(json_encode(array("error" => sqlsrv_errors())));
    }
    if (sqlsrv_execute($stmt)) {
        $results = array();
        while ($result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $results[] = $result;
        }
        sqlsrv_free_stmt($stmt);
        return $results;
    } else {
        die(json_encode(array("error" => sqlsrv_errors())));
    }
}

// สร้าง SQL Query ตามเงื่อนไขที่กรอง
if ($user_name && $filterYear && $filterMonth) {
    $sql_main = "SELECT * FROM MDC_Visitor WHERE User_name = ? AND YEAR(Posting_date) = ? AND MONTH(Posting_date) = ? ORDER BY id DESC";
    $params_main = array($user_name, $filterYear, $filterMonth);
} elseif ($user_name) {
    $sql_main = "SELECT * FROM MDC_Visitor WHERE User_name = ? ORDER BY id DESC";
    $params_main = array($user_name);
} elseif ($filterYear && $filterMonth) {
    $sql_main = "SELECT * FROM MDC_Visitor WHERE YEAR(Posting_date) = ? AND MONTH(Posting_date) = ? ORDER BY id DESC";
    $params_main = array($filterYear, $filterMonth);
} else {
    $sql_main = "SELECT * FROM MDC_Visitor ORDER BY id DESC";
    $params_main = array();
}

// ดึงข้อมูลด้วยฟังก์ชัน fetchData
$main_results = fetchData($conn, $sql_main, $params_main);

// Close the database connection
// sqlsrv_close($conn);

// ส่งผลลัพธ์กลับในรูปแบบที่ต้องการ
return $main_results;
?>


