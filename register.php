
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

// session_check
require_once 'session_check.php';

// การเชื่อมต่อฐานข้อมูล SQL Servers
include("dbcon.php");

$Statuslv = "0";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $department = $_POST['Department'];
    $position = $_POST['Position'];
    $userId = $_POST['UserId'];
    $nickname = $_POST['Nickname'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT); // Hash the password

    $userName = $firstName . "." . substr($lastName, 0, 1); // Create User_Name

    $sql = "INSERT INTO User_MDC (User_id, Password_user, User_Name, department, position, Fname, Lname, Nname,LV) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
    
    $params = array($userId, $password, $userName, $department, $position, $firstName, $lastName, $nickname,$Statuslv);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "New record created successfully";
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>

<body>
    
</body>
</html>







