<?php
require_once 'vendor/autoload.php'; // Include Composer's autoloader

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

// Retrieve the file details from the form
$fileToUpload = $_FILES["fileToUpload"]["tmp_name"];
$fileName = $_FILES["fileToUpload"]["name"];

// Azure Blob Storage connection settings
$connectionString = 'DefaultEndpointsProtocol=https;AccountName=mardicraft2024;AccountKey=T9y7+eLYhKZWF4Ae0d6wPjMkRDcifPu5PgBmm65yS8aX+0SUFqQZrXe570kiFzCrX4lWmFvz2xrL+AStNVZ+Nw==;EndpointSuffix=core.windows.net';
$containerName = 'mdcimg';

try {
    // Create a Blob service client
    $blobServiceClient = BlobRestProxy::createBlobService($connectionString);

    // Create options for the blob
    $options = new CreateBlockBlobOptions();
    $options->setContentType(mime_content_type($fileToUpload)); // Set content type based on the file

    // Upload the file to Azure Blob Storage
    $blobServiceClient->createBlockBlob($containerName, $fileName, fopen($fileToUpload, "r"), $options);

    echo "File '$fileName' uploaded successfully.";
} catch (\Exception $e) {
    echo "Error uploading file: " . $e->getMessage();
}
?>
