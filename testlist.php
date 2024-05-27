<?php

include 'dbcon.php';
session_start(); // Start the session
date_default_timezone_set('Asia/Bangkok');

// Check if the user is logged in
if(isset($_SESSION["User_id"]) && isset($_SESSION["User_Name"])) {
    $user_name = $_SESSION["User_Name"];
} else {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Query to fetch data
$stmt = "SELECT * from MDC_Visitor where (User_name ='" . $user_name . "') order by id desc ";

// Generate SAS token (this should be done in a secure way, possibly with a server-side function or script)
$sasToken = "si=readonly&sv=2022-11-02&sr=c&sig=GuZdU2IHmFOrcpcx3ka7yuM0T0%2Fay6EraGqIT6IYl54%3D"; // Replace with your actual SAS token

?>
<div class="table-responsive-sm">
    <table id="myTable" class="table table-sm table-hover sm-2">
        <thead>
            <tr>
                <th class="text-center">วันที่</th>
                <th class="text-center">ผู้ขอ</th>
                <th class="text-center">ชื่อ</th>
                <th class="text-center">อายุ</th>
                <th class="text-center">รูปแบบร้าน</th>
                <th class="text-center">ความคืบหน้า</th>
                <th class="text-center">รูปภาพ</th>
                <th class="text-center">รายละเอียด</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
            
            $query = sqlsrv_query($conn, $stmt);
            if ($query === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { 
                // Generate SAS URL for the image
                $imageExtension = $result["Customer_image"]; // Column that stores the image extension
                $blobUrl = "https://mardicraft2024.blob.core.windows.net/mdcimg/{$customerName}?{$sasToken}";

                // Debug output for URL
                echo "<!-- Debug: Image URL - {$blobUrl} -->\n";
            ?>
                <tr>
                <form action="actiondetail.php" method="post">
                <td class="text-center text-nowrap"><?php echo $result["Posting_date"]; ?></td>
                <td class="text-nowrap"><?php echo $result["User_name"]; ?></td>
                <td class="text-center"><?php echo $result["Customer_name"]; ?></td>
                <td class="text-center text-nowrap"><?php echo $result["Range_Age"]; ?></td>
                <td><?php echo $result["Outlet_type"]; ?></td>
                <td>
                    <div class="progress  mr-4">
                        <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $result["processwork"]; ?>"
                            aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $result["processwork"]; ?>%">
                            <?php echo $result["processwork"]; ?>%
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <img src="<?php echo $blobUrl; ?>" alt="<?php echo $result["Customer_name"]; ?>" style="width: 100px; height: auto;">
                </td>
                <td class="text-center">
                    <font size="+1" color="#3745B5"><strong>
                        <input name="reqid" type="hidden" value="<?php echo $result["id"]; ?>" />
                        <input name="Submit" type="submit" class="btn btn-sm btn-primary" value="Detail" enctype="multipart/form-data" />
                    </strong></font>
                </td>
                </form>
                </tr>
            <?php 
            }	
            ?>
        </tbody>
    </table>
</div>
<?php
// Close the database connection
sqlsrv_close($conn);
?>
