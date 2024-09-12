<?php
// Include the database connection file
include_once 'dbcon.php';

// Get the outlet name from AJAX request and sanitize it
$outletName = isset($_POST['outlet_name']) ? trim($_POST['outlet_name']) : '';

// Check if outlet name is provided
if (empty($outletName)) {
    echo json_encode(['error' => 'No outlet name provided']);
    exit;
}

// Example SQL query to fetch data based on outlet name
$sql = "SELECT branch_outlet, Outlet_Zone, openingandclosingtimes, Outlet_type, Seat_total, Spendingperhead, Delivery, Range_Age, Gender, Promotion, Event_outlet, Contact_outlet, PD_good1, Situation 
        FROM MDC_Visitor 
        WHERE Customer_name = ?  ";

// Prepare and execute the query
$params = array($outletName);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    // In case of an error, send a JSON response with the error details
    echo json_encode(['error' => sqlsrv_errors()]);
    exit;
}

// Fetch the data if available
if (sqlsrv_has_rows($stmt)) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    // Return the fetched data as a JSON response
    echo json_encode($row);
} else {
    // No data found for the given outlet name
    echo json_encode(['error' => 'No data found for the specified outlet']);
}

// Free the statement and close the connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>


