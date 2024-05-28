
<?php
require_once("dbcon.php");
require_once 'vendor/autoload.php'; // Ensure you have installed Azure SDK via Composer

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $reqid = $_POST['reqid'];

    // Step 1: Delete the record from the database
    $stmt = sqlsrv_prepare($conn, "SELECT Customer_image FROM MDC_Visitor WHERE id = ?", array(&$reqid));
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_execute($stmt)) {
        $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        $imageName = $result['Customer_image'];
        
        // Begin a transaction
        sqlsrv_begin_transaction($conn);

        $deleteStmt = sqlsrv_prepare($conn, "DELETE FROM MDC_Visitor WHERE id = ?", array(&$reqid));
        if ($deleteStmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        if (sqlsrv_execute($deleteStmt)) {
            // Step 2: Delete the image from Azure Storage Blob
            $connectionString = "DefaultEndpointsProtocol=https;AccountName=mardicraft2024;AccountKey=T9y7+eLYhKZWF4Ae0d6wPjMkRDcifPu5PgBmm65yS8aX+0SUFqQZrXe570kiFzCrX4lWmFvz2xrL+AStNVZ+Nw==;EndpointSuffix=core.windows.net";
            $blobClient = BlobRestProxy::createBlobService($connectionString);
            $containerName = "mdcimg";

            try {
                // Delete the blob
                $blobClient->deleteBlob($containerName, $imageName);
                // Commit transaction if both delete operations are successful
                sqlsrv_commit($conn);
                // Redirect to re_visitmain.php after successful deletion
                // header("Location: re_visitmain.php");
                echo "<script> alert('Delete'); window.location='re_visitmain.php';</script>";
                exit();
            } catch (ServiceException $e) {
                // Rollback transaction if blob deletion fails
                sqlsrv_rollback($conn);
                echo "Error deleting blob: " . $e->getMessage();
            }
        } else {
            // Rollback transaction if database deletion fails
            sqlsrv_rollback($conn);
            echo "Error deleting record: " . print_r(sqlsrv_errors(), true);
        }
    } else {
        echo "Error retrieving record: " . print_r(sqlsrv_errors(), true);
    }
} else {
    echo "Invalid request.";
}
?>



