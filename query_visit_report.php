<?php
// Include the session check file
require_once 'session_check.php';

// Include the database connection file
include_once 'dbcon.php';

// Set the timezone
date_default_timezone_set('Asia/Bangkok');

// Get the username from the session
$user_name = isset($_POST["User_Name"]) ? $_POST["User_Name"] : null;

// Function to fetch data with prepared statements
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

// SQL query for the main data
if ($user_name) {
    $sql_main = "SELECT * FROM MDC_Visitor WHERE User_name = ? ORDER BY id DESC";
    $params_main = array($user_name);
} else {
    $sql_main = "SELECT * FROM MDC_Visitor ORDER BY id DESC";
    $params_main = array();
}
$main_results = fetchData($conn, $sql_main, $params_main);

// Close the database connection
// sqlsrv_close($conn);
?>

