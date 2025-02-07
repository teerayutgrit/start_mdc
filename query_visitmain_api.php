<?php
// Include the session check file
require_once 'session_check.php';

// Include the database connection file
include_once 'dbcon.php';

// Set the timezone
date_default_timezone_set('Asia/Bangkok');

// Get the username from the session
$user_name = $_SESSION["User_Name"];

// ตรวจสอบว่ามีการส่งค่า filterMonth มาหรือไม่
$filterYear = null;
$filterMonth = null;
if (isset($_GET['filterMonth']) && !empty($_GET['filterMonth'])) {
    list($filterYear, $filterMonth) = explode('-', $_GET['filterMonth']);
}

// สร้าง SQL Query พร้อมเงื่อนไข
$sql = "SELECT * FROM MDC_Visitor WHERE User_name = ?";
$params = array($user_name);

if ($filterYear && $filterMonth) {
    $sql .= " AND YEAR(Posting_date) = ? AND MONTH(Posting_date) = ?";
    $params[] = $filterYear;
    $params[] = $filterMonth;
}

$sql .= " ORDER BY id DESC";

// Prepare the SQL statement
$stmt = sqlsrv_prepare($conn, $sql, $params);

// Check if the query was successful
if ($stmt === false) {
    die(json_encode(array("error" => sqlsrv_errors())));
}

// Execute the prepared statement
if (sqlsrv_execute($stmt)) {
    $results = array();
    while ($result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $results[] = $result;
    }
} else {
    die(json_encode(array("error" => sqlsrv_errors())));
}

// Free the statement resources
sqlsrv_free_stmt($stmt);

// Close the database connection
// sqlsrv_close($conn);

// Return the results
return $results;
?>



