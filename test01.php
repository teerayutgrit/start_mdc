<?php
//เช็8login
require_once 'session_check.php';

    // เชื่อมต่อฐานข้อมูล
    include("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

<!-- Include Bootstrap-Select CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" rel="stylesheet" />

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include Bootstrap-Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


</head>
<body>
<div class="col-md-6">
    <label for="OutletName01" class="form-label">Outlet</label>
    <select class="selectpicker" name="OutletName" id="OutletName01" data-live-search="true" required aria-label="select example">
        <option value=""></option>
        <?php
        // Get the username from the session
        $user_id = $_SESSION["User_id"];
        // สร้างคำสั่ง SQL เพื่อดึงข้อมูลรูปแบบร้านจากฐานข้อมูล
        $sql_ex = "SELECT DISTINCT Customer_No, Customer_Name FROM Customer_Data WHERE mdc_userid = ? ";
        $params = array($user_id);
        $stmt_ex = sqlsrv_query($conn, $sql_ex, $params);
        if ($stmt_ex !== false) {
            while ($result_ex = sqlsrv_fetch_array($stmt_ex, SQLSRV_FETCH_ASSOC)) {
                echo '<option value="' . htmlspecialchars($result_ex["Customer_Name"]) . '">' . htmlspecialchars($result_ex["Customer_Name"]) . '</option>';
            }
            sqlsrv_free_stmt($stmt_ex);
        } else {
            echo "<option value=''>ไม่พบข้อมูล</option>";
        }
        ?>
    </select>
</div>

</body>
</html>