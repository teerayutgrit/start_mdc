<?php
require_once("dbcon.php");
require_once 'vendor/autoload.php'; // Ensure you have installed Azure SDK via Composer

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $reqid = $_POST['reqid'];

    // Step 1: Retrieve the Customer_image from the database
    $stmt = sqlsrv_prepare($conn, "SELECT Customer_image FROM MDC_Visitor WHERE id = ?", array(&$reqid));
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_execute($stmt)) {
        $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if ($result) {
            $customerImages = explode(',', $result['Customer_image']); // Split the image paths

            // Begin a transaction
            sqlsrv_begin_transaction($conn);

            // Step 2: Delete the record from the database
            $deleteStmt = sqlsrv_prepare($conn, "DELETE FROM MDC_Visitor WHERE id = ?", array(&$reqid));
            if ($deleteStmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            if (sqlsrv_execute($deleteStmt)) {
                // Step 3: Delete the blobs from Azure Storage
                $connectionString = "DefaultEndpointsProtocol=https;AccountName=mardicraft2024;AccountKey=T9y7+eLYhKZWF4Ae0d6wPjMkRDcifPu5PgBmm65yS8aX+0SUFqQZrXe570kiFzCrX4lWmFvz2xrL+AStNVZ+Nw==;EndpointSuffix=core.windows.net";
                $blobClient = BlobRestProxy::createBlobService($connectionString);
                $containerName = "mdcimg";

                try {
                    foreach ($customerImages as $image) {
                        // Trim any whitespace and delete the blob
                        $image = trim($image);
                        if (!empty($image)) {
                            $blobClient->deleteBlob($containerName, $image);
                        }
                    }

                    // Commit transaction if both delete operations are successful
                    sqlsrv_commit($conn);
                    // Redirect to re_visitmain.php after successful deletion
                    echo "<script> alert('Delete successful'); window.location='salevisit_new.php';</script>";
                    exit();
                } catch (ServiceException $e) {
                    // Rollback transaction if blob deletion fails
                    sqlsrv_rollback($conn);
                    echo "Error deleting blobs: " . $e->getMessage();
                }
            } else {
                // Rollback transaction if database deletion fails
                sqlsrv_rollback($conn);
                echo "Error deleting record: " . print_r(sqlsrv_errors(), true);
            }
        } else {
            echo "Record not found.";
        }
    } else {
        echo "Error retrieving record: " . print_r(sqlsrv_errors(), true);
    }
} else {
    echo "Invalid request.";
}
?>
