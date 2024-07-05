<?php
// Include the session check file
require_once 'session_check.php';

// Include the database connection file
include_once 'dbcon_inventory.php';

// Set the timezone
date_default_timezone_set('Asia/Bangkok');

// Initialize results array
$results = array();

try {
    // SQL query to retrieve data from the view
    $sql = "SELECT Inventory, PD_CODE, Product_Name, Brand, Lot, FullLot, Size, Uom, BOX, PCS, Months_Difference FROM dbo.V_KM38_Sum_total_mdc
            UNION ALL
            SELECT Inventory, PD_CODE, Product_Name, Brand, Lot, FullLot, Size, Uom, BOX, PCS, Months_Difference FROM dbo.V_KM52_Sum_total_mdc";

    // Prepare and execute the SQL query
    $stmt = sqlsrv_query($conn, $sql);

    // Check if the query was successful
    if ($stmt === false) {
        throw new Exception(json_encode(sqlsrv_errors()));
    }

    // Fetch all rows
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $results[] = $row;
    }

    // Free the statement resources
    sqlsrv_free_stmt($stmt);

} catch (Exception $e) {
    // Handle any errors that may have occurred
    die(json_encode(array("error" => $e->getMessage())));
} finally {
    // Close the database connection
    sqlsrv_close($conn);
}

// Return the results as JSON
echo json_encode($results);
?>

