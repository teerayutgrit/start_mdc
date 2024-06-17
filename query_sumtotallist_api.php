<?php
// Include the session check file
require_once 'session_check.php';

// Include the database connection file
include_once 'dbcon.php';

// Set the timezone
date_default_timezone_set('Asia/Bangkok');

// Get the username from the session
$user_name = $_SESSION["User_Name"];

// Prepare the first SQL query to retrieve data
$sql1 = "SELECT COUNT(*) AS sumtotallist FROM MDC_Visitor WHERE User_name = ?";
$params1 = array($user_name);
$stmt1 = sqlsrv_prepare($conn, $sql1, $params1);

// Check if the first query was successful
if ($stmt1 === false) {
    header('Content-Type: application/json');
    echo json_encode(array("error" => sqlsrv_errors()));
    exit;
}

// Execute the first prepared statement
if (sqlsrv_execute($stmt1)) {
    $result1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC);
} else {
    header('Content-Type: application/json');
    echo json_encode(array("error" => sqlsrv_errors()));
    exit;
}

// Free the first statement resources
sqlsrv_free_stmt($stmt1);

// Prepare the second SQL query to retrieve data
$sql2 = "SELECT COUNT(*) AS sumtotallist_processwork FROM MDC_Visitor WHERE User_name = ? AND processwork = 80";
$params2 = array($user_name);
$stmt2 = sqlsrv_prepare($conn, $sql2, $params2);

// Check if the second query was successful
if ($stmt2 === false) {
    header('Content-Type: application/json');
    echo json_encode(array("error" => sqlsrv_errors()));
    exit;
}

// Execute the second prepared statement
if (sqlsrv_execute($stmt2)) {
    $result2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);
} else {
    header('Content-Type: application/json');
    echo json_encode(array("error" => sqlsrv_errors()));
    exit;
}

// Free the second statement resources
sqlsrv_free_stmt($stmt2);

$sql3 = "SELECT COUNT(*) AS sumtotallist_processwork_fn FROM MDC_Visitor WHERE User_name = ? AND processwork = 100";
$params3 = array($user_name);
$stmt3 = sqlsrv_prepare($conn, $sql3, $params3);

// Check if the second query was successful
if ($stmt3 === false) {
    header('Content-Type: application/json');
    echo json_encode(array("error" => sqlsrv_errors()));
    exit;
}

// Execute the second prepared statement
if (sqlsrv_execute($stmt3)) {
    $result3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC);
} else {
    header('Content-Type: application/json');
    echo json_encode(array("error" => sqlsrv_errors()));
    exit;
}

// Free the second statement resources
sqlsrv_free_stmt($stmt3);

// Close the database connection
sqlsrv_close($conn);

// Combine the results from both queries
$results = array_merge($result1, $result2,$result3);

// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($results);
?>




