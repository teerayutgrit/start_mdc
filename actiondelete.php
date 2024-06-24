<?php
require_once("dbcon.php");
require_once 'vendor/autoload.php'; // Ensure you have installed Azure SDK via Composer

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $reqid = $_POST['reqid'];

    // Step 1: Retrieve the Customer_name from the database
    $stmt = sqlsrv_prepare($conn, "SELECT Customer_name FROM MDC_Visitor WHERE id = ?", array(&$reqid));
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_execute($stmt)) {
        $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if ($result) {
            $customerName = $result['Customer_name'];

            // Begin a transaction
            sqlsrv_begin_transaction($conn);

            // Step 2: Delete the record from the database
            $deleteStmt = sqlsrv_prepare($conn, "DELETE FROM MDC_Visitor WHERE id = ?", array(&$reqid));
            if ($deleteStmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            if (sqlsrv_execute($deleteStmt)) {
                // Step 3: Delete the folder (all blobs under the folder name) from Azure Storage Blob
                $connectionString = "DefaultEndpointsProtocol=https;AccountName=mardicraft2024;AccountKey=T9y7+eLYhKZWF4Ae0d6wPjMkRDcifPu5PgBmm65yS8aX+0SUFqQZrXe570kiFzCrX4lWmFvz2xrL+AStNVZ+Nw==;EndpointSuffix=core.windows.net";
                $blobClient = BlobRestProxy::createBlobService($connectionString);
                $containerName = "mdcimg";

                try {
                    // List all blobs in the folder
                    $listBlobsOptions = new MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions();
                    $listBlobsOptions->setPrefix($customerName . '/');

                    do {
                        $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
                        foreach ($result->getBlobs() as $blob) {
                            // Delete each blob
                            $blobClient->deleteBlob($containerName, $blob->getName());
                        }

                        $listBlobsOptions->setContinuationToken($result->getContinuationToken());
                    } while ($result->getContinuationToken());

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



