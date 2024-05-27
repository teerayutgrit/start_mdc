

<?php
require_once 'session_check.php';
header('Content-Type: application/json');
include("dbcon.php");
date_default_timezone_set('Asia/Bangkok');

// Check if reqid is set in POST request
if (!isset($_POST['reqid'])) {
    // Handle the case where reqid is not provided
    echo json_encode(array("error" => "Request ID is not set."));
    exit();
}

$reqid = $_POST['reqid'];

// Establish database connection
if ($conn === false) {
    echo json_encode(array("error" => "Unable to connect to the database."));
    exit();
}

// Prepare SQL statement
$sql = "SELECT * FROM MDC_Visitor WHERE id = ?";
$params = array($reqid);
$stmt = sqlsrv_prepare($conn, $sql, $params);

// Check if statement preparation was successful
if ($stmt === false) {
    echo json_encode(array("error" => sqlsrv_errors()));
    exit();
}

$resultArray = array(); // Initialize array to store results

// Execute prepared statement and fetch results
while ($result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $resultArray[] = $result; // Add data to result array
}

// Free statement resources
sqlsrv_free_stmt($stmt);

// Close database connection
sqlsrv_close($conn);

// Encode result array as JSON and output
echo json_encode($resultArray);
?>

