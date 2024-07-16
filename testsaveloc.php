<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Fill Form Example</title>

           <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

            <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"> </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
.multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
    </style>

    <?php
    // เชื่อมต่อฐานข้อมูล
    include("dbcon.php");
    ?>

    <!-- ดึงข้อมูลจาก  Customer_Data -->
    <script>
    $(document).ready(function() {
        $('#OutletName01').on('change', function() {
            var outletName = $(this).val();
            if (outletName) {
                $.ajax({
                    url: 'fetch_outlet_data.php',
                    type: 'POST',
                    data: { outlet_name: outletName },
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            $('#OutletZone').val(data.Outlet_Zone);
                            $('#OpeningClosingTimes').val(data.openingandclosingtimes);
                        } else {
                            alert('ไม่พบข้อมูลสำหรับร้าน ' + outletName);
                            $('#OutletZone').val('');
                            $('#OpeningClosingTimes').val('');
                        }
                    }
                });
            } else {
                $('#OutletZone').val('');
                $('#OpeningClosingTimes').val('');
            }
        });
    });
    </script>
</head>
<body>
    <form id="uploadForm" action="salevisit_insertdata_Ex.php" method="POST"
          class="was-validated align-items-center" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label for="OutletName01" class="form-label">Outlet</label>
                <select class="form-select" name="OutletName" id="OutletName01" required aria-label="select example">
                    <option value=""></option>
                    <?php
                    // สร้างคำสั่ง SQL เพื่อดึงข้อมูลรูปแบบร้านจากฐานข้อมูล
                    $sql_ex = "SELECT * FROM Customer_Data ORDER BY Customer_No ASC";
                    $stmt_ex = sqlsrv_query($conn, $sql_ex);
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
            <div class="col-md-3">
                <label for="Outlet_Zone" class="form-label">Zone</label>
                <input type="text" step="any" name="Outlet_Zone" class="form-control is-valid" id="OutletZone" value="" required>
                <div class="invalid-feedback"></div>
            </div>
            <div class="col-md-3">
                <label for="openingandclosingtimes" class="form-label">Opening and Closing Times</label>
                <input type="text" step="any" name="openingandclosingtimes" class="form-control is-valid" id="OpeningClosingTimes" value="" required>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="row">
                                            <div class="col-md-3">
                                                <label for="Range01Age" class="form-label">Taget Age</label>
                                                <select class="form-select" name="RangeAge" required
                                                    aria-label="select example">
                                                    <option value=""></option>
                                                    <option value="20-25">20-25</option>
                                                    <option value="26-30">26-30</option>
                                                    <option value="31-40">31-40</option>
                                                    <option value="41-50">41-50</option>
                                                    <option value="51-60">51-60</option>
                                                    <option value="60">60</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
    </form>



    <form>
  <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes">
      <label for="one">
        <input type="checkbox" id="one" />First checkbox</label>
      <label for="two">
        <input type="checkbox" id="two" />Second checkbox</label>
      <label for="three">
        <input type="checkbox" id="three" />Third checkbox</label>
    </div>
  </div>
</form>

<script> 
    var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>


        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>
