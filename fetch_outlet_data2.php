<?php
include 'dbcon.php';

// Check for GET or POST parameters
if (!isset($_POST['customer_name']) || !isset($_POST['branch_outlet'])) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

// Get POST parameters
$customer_name = $_POST['customer_name'];
$branch_outlet = $_POST['branch_outlet'];

// Prepare SQL query
$sql = "SELECT [Status_outlet]
      ,[Customer_name]
      ,[branch_outlet]
      ,[Outlet_Zone]
      ,[openingandclosingtimes]
      ,[User_name]
      ,[Outlet_type]
      ,[Seat_total]
      ,[Range_Age]
      ,[Gender]
      ,[Spendingperhead]
      ,[Delivery]
      ,[Promotion]
      ,[Event_outlet]
      ,[Situation]
      ,[processwork]
      ,[Customer_No]
      ,[PD_good1] 
      ,[Contact_outlet] 
      FROM Visitor_group 
      WHERE Customer_name = ? AND branch_outlet = ?";

$params = array($customer_name, $branch_outlet);

// Execute the query
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    // Return SQL error details for debugging
    echo json_encode([
        'error' => 'Query failed', 
        'details' => sqlsrv_errors()
    ]);
    exit;
}

// Fetch query result
$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if ($result) {
    // Return the result as a JSON object
    echo json_encode($result);
} else {
    // Return an empty Outlet_Zone if no results are found
    echo json_encode([
        'Outlet_Zone' => '',
        'openingandclosingtimes' => '',
        // Optionally return empty values for other fields to maintain consistency
    ]);
}

// Free the statement and close the connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>



