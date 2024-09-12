<?php

// include_once 'dbcon.php';

// if (isset($_POST['customer_name'])) {
//     $customer_name = $_POST['customer_name'];


//     $sql = "SELECT branch_outlet FROM Visitor_group WHERE Customer_name = ? AND branch_outlet IS NOT NULL";
//     $params = array($customer_name);
//     $stmt = sqlsrv_query($conn, $sql, $params);

   
//     if ($stmt !== false) {
//         while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//             echo '<option value="' . htmlspecialchars($row['branch_outlet']) . '">' . htmlspecialchars($row['branch_outlet']) . '</option>';
//         }
//     } else {
//         echo '<option value="">No branches available</option>';
//     }

    
//     sqlsrv_free_stmt($stmt);
// }
?>

<?php
// Include your database connection file
// include_once 'dbcon.php';

// if (isset($_POST['customer_name'])) {
//     $customer_name = $_POST['customer_name'];

//     Fetch the branch_outlet for the selected customer
//     $sql = "SELECT branch_outlet FROM Visitor_group WHERE Customer_name = ? AND branch_outlet IS NOT NULL";
//     $params = array($customer_name);
//     $stmt = sqlsrv_query($conn, $sql, $params);

//     Check if any branches are found
//     if ($stmt !== false) {
//         while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//             echo '<option value="' . htmlspecialchars($row['branch_outlet']) . '">' . htmlspecialchars($row['branch_outlet']) . '</option>';
//         }
//     } else {
//         echo '<option value="">No branches available</option>';
//     }

//     Free the statement
//     sqlsrv_free_stmt($stmt);
// }
?>

<?php
// Include your database connection file
include_once 'dbcon.php';

if (isset($_POST['customer_name'])) {
    $customer_name = $_POST['customer_name'];

    // Normalize branch names by trimming whitespace and converting to lowercase
    $sql = "SELECT DISTINCT LTRIM(RTRIM(LOWER(branch_outlet))) AS branch_outlet 
            FROM Visitor_group WHERE Customer_name = ? ";
    $params = array($customer_name);
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if any branches are found
    if ($stmt !== false) {
        $branches = array();  // Store branches here
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $branch = htmlspecialchars($row['branch_outlet']);
            if (!in_array($branch, $branches)) {  // Ensure uniqueness at PHP level
                $branches[] = $branch;
            }
        }
        // Return branches as a JSON array
        echo json_encode($branches);
    } else {
        echo json_encode([]); // No branches available
    }

    // Free the statement
    sqlsrv_free_stmt($stmt);
}

?>


