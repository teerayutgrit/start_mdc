<?php
$serverName = "tcp:assetcontrol.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "Inventory_01",
    "Uid" => "assetcontrol2023",
    "PWD" => "F8_@ngLe",
    "CharacterSet" => "UTF-8"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die("Error connecting to SQL Server: " . print_r(sqlsrv_errors(), true));
}

// Perform your SQL queries here

// Optionally, close the connection (not necessary if the script will end shortly)
// sqlsrv_close($conn);
?>