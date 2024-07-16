<?php
// Include the database connection file
include_once 'dbcon.php';

// Assume you have an AJAX request that sends a POST parameter 'outlet_name'
$outletName = $_POST['outlet_name']; // Get outlet name from AJAX request

// Example SQL query to fetch data based on outlet name
$sql = "SELECT Outlet_Zone, openingandclosingtimes FROM MDC_Visitor WHERE Customer_name = ?";
$params = array($outletName);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch the data
if (sqlsrv_has_rows($stmt)) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    // Return data as JSON response
    echo json_encode($row);
} else {
    // No data found
    echo json_encode(null);
}

// Close the statement and connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>

