<?php
// Include database connection file
include("dbcon.php");

// Check if latitude and longitude are set through GET request
if(isset($_GET['latitude']) && isset($_GET['longitude'])) {
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];

    // Insert the location into the database
    $sql = "INSERT INTO MDC_Map (Latitude, Longitude) VALUES (?, ?)";
    $params = array($latitude, $longitude);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die("Error executing SQL query: " . print_r(sqlsrv_errors(), true));
    } else {
        echo "Location inserted into database successfully.";
    }
} else {
    echo "Latitude and longitude are not provided.";
}

// Close the database connection
sqlsrv_close($conn);
?>
