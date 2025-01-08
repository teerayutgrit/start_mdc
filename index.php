<?php
//session_check
require_once 'session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mardi Craft Brewing - main</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo-mardicraft.svg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.0/css/buttons.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img class="sidebar-card-illustration mb-2" src="img/logo-mardicraft.svg" alt="..." width="50"
                        height="50">
                </div>
                <div class="sidebar-brand-text mx-3">MardiCraft</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 ">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if ($Permission_user == 1 || $Permission_user == 2 || $Permission_user == 5): ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading ">
                Sale
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSale"
                    aria-expanded="true" aria-controls="collapseSale">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <i class="fa fa-shopping-bag"></i>
                    <span>Sale</span>
                </a>
                
                <div id="collapseSale" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="salevisit_new.php">New visit</a>
                        <a class="collapse-item" href="salevisit_Ex.php">Existing</a>
                        <a class="collapse-item" href="salevisit_revisit.php">Re visit</a>
                    </div>
                </div>
                <?php endif; ?>
            </li>

            <?php if ($Permission_user == 4 || $Permission_user == 5): ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading ">
                Service
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseservice"
                    aria-expanded="true" aria-controls="collapseservice">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Service</span>
                </a>
                <div id="collapseservice" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                        <a class="collapse-item" href="testmap.php">map</a>
                    </div>
                </div>
                <?php endif; ?>
            </li>

            <?php if ($Permission_user == 2 || $Permission_user == 5): ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <div class="sidebar-heading">
                REPORT
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="Report_salevisit_list.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sale Visit Report</span></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sale Visit Report</span></a>
            </li> -->
            <?php endif; ?>


            <?php if ($Permission_user == 5): ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a><div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->
            <?php endif; ?>

            <?php if ($Permission_user == 0 || $Permission_user == 1 || $Permission_user == 2 || $Permission_user == 5): ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading ">
                Inventory
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventory"
                    aria-expanded="true" aria-controls="collapseInventory">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <i class="fas fa-fw fa-table"></i>
                    <span>Stock</span>
                </a>
                <div id="collapseInventory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="stockkm38_52list.php">KM38 & KM52</a>
                        <a class="collapse-item" href="stockkm38_52search.php">Search</a>
                    </div>
                </div>
                <?php endif; ?>
            </li>

            <div class="sidebar-heading">TSI Brewing</div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="https://bookingbrewingtsi24.azurewebsites.net/view_index.php" target="_blank" rel="noopener noreferrer">
                    <i class="fa fa-thermometer-empty"></i> <span>TSI Brewing</span>
                </a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- end เมนู  กำหนดสิทธิ์ -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span> -->
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo isset($user_name) ? $user_name : 'Default Name'; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- Content Row -->
                    <?php if ($Permission_user == 1 || $Permission_user == 5): ?>
                        <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        fetch('query_sumtotallist_api.php')
                            .then(response => response.json())
                            .then(data => {
                                if (data.error) {
                                    console.error('Error:', data.error);
                                } else {
                                    document.getElementById('sumtotal').innerText = data.sumtotallist;
                                    document.getElementById('sumtotallist_processwork').innerText = data.sumtotallist_processwork;
                                    document.getElementById('sumtotallist_processwork_fn').innerText = data.sumtotallist_processwork_fn;
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });
                    </script>
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                จำนวนรายการที่เข้า Visit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="sumtotal">Loading...
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                จำนวนรายการที่นำเสนอสินค้า</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"
                                                id="sumtotallist_processwork">Loading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cubes fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                จำนวนรายการที่จบการนำเสนอ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"
                                                id="sumtotallist_processwork_fn">Loading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                จำนวนรายการที่แจ้งซ่อม</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"
                                                id="sumtotallist_processwork_fn">Loading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-wrench fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Content Row -->
                    <?php
                       // Include query_visitmain_api.php to retrieve data
                         require_once 'query_visitmain_api.php';
                     ?>

                    <?php if ($Permission_user == 1 || $Permission_user == 5): ?>
                        <div class="col-md-5">
                    <form method="get" action="">
                        <div class="form-group">
                            <label for="filterMonth">เลือกเดือน:</label>
                            <input type="month" id="filterMonth" name="filterMonth" class="form-control"
                                value="<?php echo isset($_GET['filterMonth']) ? $_GET['filterMonth'] : date('Y-m'); ?>">
                            <button type="submit" class="btn btn-primary mt-2">กรองข้อมูล</button>
                        </div>
                    </form>
                </div>
                    <div class="row">
                         <!-- Content Column -->
                         <div class="col-xl-12 col-lg-100">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between bg-gradient-primary shadow-lg rounded "
                                    style="margin-top: -0.5rem ">
                                    <h6 class="m-0 font-weight-bold text-light">Visit List</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table id="myTable" class="table table-sm table-hover sm-2">
                                            <thead>
                                                <tr>
                                                    <!-- <th class="text-center text-nowrap">วันที่อนุมัติ</th> -->
                                                    <th class="text-center">วันที่</th>
                                                    <th class="text-center">สถานะร้านค้า</th>
                                                    <!-- <th class="text-center">ชื่อ</th> -->
                                                    <th class="text-center">ชื่อร้านค้า</th>
                                                    <th class="text-center">สาขา</th>
                                                    <!-- <th class="text-center">รูปแบบร้าน</th> -->
                                                    <th class="text-center">ความคืบหน้า</th>
                                                    <th class="text-center">รายละเอียด</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                 // Loop through the results obtained from query_visitmain_api.php
                                                 foreach ($results as $result) {
                                                 ?>
                                                <tr>
                                                    <form action="salevisit_detail.php" method="post">
                                                        <!-- <td class="text-center"><?php echo htmlspecialchars($result["id"]); ?></td> -->
                                                        <td class="text-nowrap"><?php echo htmlspecialchars($result["Posting_date"]); ?></td>
                                                        <td class="text-nowrap"><?php echo htmlspecialchars($result["Status_outlet"]); ?></td>
                                                        <!-- <td class="text-nowrap"><?php echo htmlspecialchars($result["User_name"]); ?></td> -->
                                                        <td><?php echo htmlspecialchars($result["Customer_name"]); ?></td>
                                                        <td><?php echo htmlspecialchars($result["branch_outlet"]); ?></td>
                                                        <!-- <td class="text-center text-nowrap"><?php echo htmlspecialchars($result["Range_Age"]); ?></td> -->
                                                        <!-- <td><?php echo htmlspecialchars($result["Outlet_type"]); ?></td> -->
                                                        <td>
                                                            <div class="progress mr-4">
                                                                <?php
                                            $led01 = $result["processwork"];
                                            $progressClass = 'bg-primary'; // Default class
                                            $progressText = 'เข้าพบลูกค้า'; // Default text
                                
                                            switch ($result["processwork"]) {
                                                case 40:
                                                    $progressClass = 'bg-info';
                                                    $progressText = 'เข้าพบลูกค้า';
                                                    break;
                                                case 80:
                                                    $progressClass = 'bg-warning';
                                                    $progressText = 'ลูกค้าเทสสินค้า';
                                                    break;
                                                case 100:
                                                    $progressClass = 'bg-success';
                                                    $progressText = 'จบการนำเสนอ';
                                                    break;
                                                default:
                                                    // Default case handled by setting $led01 to $result["processwork"]
                                                    break;
                                            }
                                        ?>
                                                                <div id="myProgress1"
                                                                    class="progress-bar progress-bar-striped progress-bar-animated <?php echo htmlspecialchars($progressClass); ?>"
                                                                    role="progressbar"
                                                                    aria-valuenow="<?php echo htmlspecialchars($led01); ?>"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width:100%">
                                                                    <?php echo htmlspecialchars($progressText ); ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- <td><?php echo htmlspecialchars($result["comment"]); ?></td> -->
                                                        <!-- <td class="text-center"><?php if ($result["supportname"] != "") { echo "✔️"; } ?></td> -->
                                                        <!-- <td align="center"><?php if ($result["mgitname"] != "") { echo "✔️"; } ?></td> -->
                                                        <td class="text-center">
                                                            <font size="+1" color="#3745B5"><strong>
                                                                    <input name="reqid" type="hidden"
                                                                        value="<?php echo htmlspecialchars($result["id"]); ?>" />
                                                                    <input name="Submit" type="submit"
                                                                        class="btn btn-sm btn-primary" value="Detail" />
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Content Row -->
<?php if ($Permission_user == 2 || $Permission_user == 5): ?>
    <div class="row">
        <!-- Content Column -->
        <div class="col-xl-12 col-lg-100">
        <div class="row mb-3">
    <div class="col-md-4">
        <form method="POST" action="">
            <div class="form-group">
                <!-- <label for="saleName01">เลือกผู้ใช้:</label> -->
                <select class="selectpicker form-control" name="User_Name" id="saleName01" data-live-search="true" aria-label="select example">
                    <option value="">All</option>
                    <?php
                    // สร้างคำสั่ง SQL เพื่อดึงข้อมูลรูปแบบร้านจากฐานข้อมูล
                    $sql_ex = "SELECT User_Name, department FROM User_MDC WHERE department = 'Sales'";
                    $params = array($user_id);
                    $stmt_ex = sqlsrv_query($conn, $sql_ex, $params);
                    if ($stmt_ex !== false) {
                        while ($result_ex = sqlsrv_fetch_array($stmt_ex, SQLSRV_FETCH_ASSOC)) {
                            $User_Name = htmlspecialchars($result_ex["User_Name"]);
                            echo '<option value="' . $User_Name . '">' . $User_Name . '</option>';
                        }
                        sqlsrv_free_stmt($stmt_ex);
                    } else {
                        echo "<option value=''>ไม่พบข้อมูล</option>";
                    }
                    ?>
                </select>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <!-- <label for="filterMonth2">เลือกเดือน:</label> -->
                <input type="month" id="filterMonth2" name="filterMonth2" class="form-control"
                    value="<?php echo isset($_POST['filterMonth2']) ? $_POST['filterMonth2'] : date('Y-m'); ?>">
            </div>
            </div>
            
            <div class="col-md-2">
               <div class="form-group">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
               </div>
            </div>
            
        </form>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const monthInput = document.getElementById("filterMonth2");
        const currentDate = new Date();
        const currentYearMonth = currentDate.toISOString().slice(0, 7); // รูปแบบ yyyy-mm
        if (!monthInput.value) {
            monthInput.value = currentYearMonth; // ตั้งค่าเริ่มต้น
        }
        // ส่งข้อมูลฟอร์มอัตโนมัติ
        if (!<?php echo json_encode(isset($_POST['filterMonth2'])); ?>) {
            document.querySelector("form").submit();
        }
    });
</script>


            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between bg-gradient-primary shadow-lg rounded" style="margin-top: -0.5rem">
                    <h6 class="m-0 font-weight-bold text-light">Report Visit</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    // Include query_visit_report.php to retrieve data
                    require_once 'query_visit_report.php';
                    ?>
                    <div class="table-responsive p-0">
                        <table id="myTable" class="table table-sm table-hover sm-2">
                            <thead>
                                <tr>
                                    <th class="text-center">วันที่</th>
                                    <th class="text-center">ชื่อ</th>
                                    <th class="text-center">สถานะร้านค้า</th>
                                    <th class="text-center">ชื่อร้านค้า</th>
                                    <th class="text-center">สาขา</th>
                                    <th class="text-center">ความคืบหน้า</th>
                                    <th class="text-center">รายละเอียด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Loop through the results obtained from query_visitmain_api.php
                                foreach ($main_results as $result) {
                                ?>
                                <tr>
                                    <form action="salevisit_detail_md.php" method="post">
                                        <td class="text-nowrap"><?php echo htmlspecialchars($result["Posting_date"]); ?></td>
                                        <td class="text-nowrap"><?php echo htmlspecialchars($result["User_name"]); ?></td>
                                        <td class="text-nowrap"><?php echo htmlspecialchars($result["Status_outlet"]); ?></td>
                                        <td><?php echo htmlspecialchars($result["Customer_name"]); ?></td>
                                        <td><?php echo htmlspecialchars($result["branch_outlet"]); ?></td>
                                        <td>
                                            <div class="progress mr-4">
                                                <?php
                                                $led01 = $result["processwork"];
                                                $progressClass = 'bg-primary';
                                                $progressText = 'เข้าพบลูกค้า';
                                                
                                                switch ($result["processwork"]) {
                                                    case 40:
                                                        $progressClass = 'bg-info';
                                                        $progressText = 'เข้าพบลูกค้า';
                                                        break;
                                                    case 80:
                                                        $progressClass = 'bg-warning';
                                                        $progressText = 'ลูกค้าเทสสินค้า';
                                                        break;
                                                    case 100:
                                                        $progressClass = 'bg-success';
                                                        $progressText = 'จบการนำเสนอ';
                                                        break;
                                                }
                                                ?>
                                                <div id="myProgress1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo htmlspecialchars($progressClass); ?>" role="progressbar" aria-valuenow="<?php echo htmlspecialchars($led01); ?>" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                    <?php echo htmlspecialchars($progressText); ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <font size="+1" color="#3745B5"><strong>
                                                <input name="reqid" type="hidden" value="<?php echo htmlspecialchars($result["id"]); ?>" />
                                                <input name="Submit" type="submit" class="btn btn-sm btn-primary" value="Detail" />
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
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">เลือก "Logout" เพื่อออกจากระบบ </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

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