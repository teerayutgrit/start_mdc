<?php
// include_once 'dbcon.php';

// เช็คการล็อกอิน
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

    <title>Mardi Craft Brewing - Stock</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo-mardicraft.svg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


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
            <hr class="sidebar-divider bg-light">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if ($Permission_user == 1 || $Permission_user == 2 || $Permission_user == 5): ?>
            <!-- Divider -->
            <hr class="sidebar-divider bg-light">
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
                        <!-- <a class="collapse-item" href="cards.html">Re visit</a> -->
                    </div>
                </div>
                <?php endif; ?>
            </li>

            <?php if ($Permission_user == 4 || $Permission_user == 5): ?>
            <!-- Divider -->
            <hr class="sidebar-divider bg-light">
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
            <hr class="sidebar-divider bg-light">

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
            <hr class="sidebar-divider bg-light">

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
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
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
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>
            <?php endif; ?>

            <?php if ($Permission_user == 0 || $Permission_user == 1 || $Permission_user == 2 || $Permission_user == 5): ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block bg-light">

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
                <div id="collapseInventory" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="stockkm38_52list.php">KM38 & KM52</a>
                        <a class="collapse-item" href="stockkm38_52search.php">Search</a>
                    </div>
                </div>
                <?php endif; ?>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider bg-light">

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

                    <!-- Topbar ช่อง Search หาข้อมูลไม่ได้ไช้ -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->
                        <!-- Dropdown - Messages สำหรับหน้าจอเล็ก-->
                        <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> -->

                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i> -->
                        <!-- Counter - Alerts -->
                        <!-- <span class="badge badge-danger badge-counter">3+</span>
                            </a> -->
                        <!-- Dropdown - Alerts -->
                        <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> -->

                        <!-- Nav Item - Messages -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i> -->
                        <!-- Counter - Messages -->
                        <!-- <span class="badge badge-danger badge-counter">7</span>
                            </a> -->
                        <!-- Dropdown - Messages -->
                        <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div> -->
                        </li>

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
                                <a class="dropdown-item" href="#">
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
                                </a>
                                <div class="dropdown-divider"></div>
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Stock</h1>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary shadow-lg rounded "
                                    style="margin-top: -0.5rem ">
                                    <h6 class="m-0 font-weight-bold text-light ">รายการ</h6>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                    <div class="table-responsive-sm">
    <?php
    // Include the database connection file
    include_once 'dbcon_inventory.php';

    // SQL statement to retrieve data from the views, group by FullLot and PD_CODE, and order by PD_CODE

    $stmt = "SELECT Inventory, PD_CODE, Product_Name, Brand, Lot, Exp_date, Size, Uom, BOX, PCS, Months_Difference FROM dbo.V_KM38_Sum_total_mdc
             UNION ALL
             SELECT Inventory, PD_CODE, Product_Name, Brand, Lot, Exp_date, Size, Uom, BOX, PCS, Months_Difference FROM dbo.V_KM52_Sum_total_mdc
             UNION ALL
             SELECT Inventory, PD_CODE, Product_Name, Brand, Lot, Exp_date, Size, Uom, BOX, PCS, Months_Difference FROM dbo.V_MDC01_Sum_total_mdc
             ORDER BY PD_CODE, Lot";

    // Execute the query
    $query = sqlsrv_query($conn, $stmt);

    // Check if the query was successful
    if ($query === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    ?>

    <table id="myTable" class="table table-sm table-hover sm-2">
        <thead>
            <tr>
                <th class="text-center">PD_CODE</th>
                <th class="text-center">Product Name</th>
                <!-- <th class="text-center">Brand</th> -->
                <th class="text-center">Lot</th>
                <th class="text-center">Exp Date</th>
                <!-- <th class="text-center">Size</th> -->
                <th class="text-center">UOM</th>
                <th class="text-center">BOX</th>
                <th class="text-center">PCS</th>
                <th class="text-center">Shelf life/Months</th>
                <th class="text-center">Inventory</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
                <?php
// คำนวณจำนวนวันที่แตกต่างกัน
$Lot = DateTime::createFromFormat('d/m/y', $result['Lot']);

if ($Lot) {
    $current_date = new DateTime();
    $diff = $Lot->diff($current_date);
    $days_diff = $diff->days;

    // กำหนดสีตามเงื่อนไข
    if ($days_diff >= 0 && $days_diff < 91) {
        $colorClass = 'text-success'; // green
    } elseif ($days_diff >= 91 && $days_diff < 181) {
        $colorClass = 'text-info'; // blue
    } elseif ($days_diff >= 181 && $days_diff < 251) {
        $colorClass = 'text-warning'; // yellow
    } elseif ($days_diff >= 251 && $days_diff < 600 ) {
        $colorClass = 'text-danger'; // red
    } else {
        $colorClass = ''; // Default, no color
    }
} else {
    $days_diff = 'Invalid Date';
    $colorClass = 'text-muted'; // สีสำหรับวันที่ที่ไม่ถูกต้อง
}
                ?>
            <tr>
                <td class="text-nowrap"><?php echo htmlspecialchars($result["PD_CODE"]); ?></td>
                <td class="text-nowrap" ><?php echo htmlspecialchars($result["Product_Name"]); ?></td>
                <!-- <td class="text-center"><?php echo htmlspecialchars($result["Brand"]); ?></td> -->
                <td class="text-center"><?php echo htmlspecialchars($result["Lot"]); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($result["Exp_date"]); ?></td>
                <!-- <td class="text-center"><?php echo htmlspecialchars($result["Size"]); ?></td> -->
                <td class="text-center"><?php echo htmlspecialchars($result["Uom"]); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($result["BOX"]); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($result["PCS"]); ?></td>
                <td class="text-center fw-bold fs-5 <?php echo $colorClass; ?>"><?php echo $days_diff; ?></td>
                <td class="text-center"><?php echo htmlspecialchars($result["Inventory"]); ?></td>
            </tr>
            <?php
                
            }

            // Free the statement resources
            sqlsrv_free_stmt($query);

            // Close the database connection
            sqlsrv_close($conn);
            ?>
        </tbody>
    </table>
</div>

<!-- Add Bootstrap CSS for text color classes -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

                                    </div>
                                    <div class=" text-center text-sm text-muted text-lg-start">
            <p class="text-center fw-bold text-danger">** จำนวนของ Shelf life คืออายุของสินค้าเริ่มตั้งแต่วันที่ผลิตจนถึงวันที่ปัจจุบัน **</p>
          </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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


</body>

</html>