<?php
//เช็8login
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

    <title>Mardi Craft Brewing - Revisit</title>

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
            <hr class="sidebar-divider bg-light my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>blank</span></a>
            </li>

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
                <?php if ($deptsys == "sale" || $deptsys == "admin"): ?>
                <div id="collapseSale" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <!-- <a class="collapse-item" href="buttons.html">Buttons</a> -->
                        <!-- <a class="collapse-item" href="cards.html">Cards</a> -->
                        <!-- <a class="collapse-item" href="salevisit_List.php">New visit</a> -->
                        <a class="collapse-item" href="salevisit_new.php">New visit</a>
                        <a class="collapse-item" href="re_visitmain.php">Re visit</a>

                    </div>
                </div>
                <?php endif; ?>
            </li>

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
                <?php if ($deptsys == "service" || $deptsys == "admin"): ?>
                <div id="collapseservice" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
                <?php endif; ?>
            </li>

            <?php if ($deptsys == "admin"): ?>
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


            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div>

            Nav Item - Pages Collapse Menu
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

            Nav Item - Charts
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            Nav Item - Tables
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block bg-light">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- end เมนู  กำหนดสิทธิ์ -->

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex"> -->
            <!-- <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="..."> -->
            <!-- <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p> -->
            <!-- <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a> -->
            <!-- </div> -->

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

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div> -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Revisit & Visitlist</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i -->
                        <!-- class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-xl-12 col-lg-100">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-primary shadow-lg rounded "
                                    style="margin-top: -0.5rem ">
                                    <h6 class="m-0 font-weight-bold text-light">Visit List</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php
                                         // Include query_visitmain_api.php to retrieve data
                                         require_once 'query_visitmain_api.php';
                                     ?>
                                    <div class="table-responsive-sm">
                                        <table id="myTable" class="table table-sm table-hover sm-2">
                                            <thead>
                                                <tr>
                                                    <!-- <th class="text-center text-nowrap">วันที่อนุมัติ</th> -->
                                                    <th class="text-center">วันที่</th>
                                                    <!-- <th class="text-center">ชื่อ</th> -->
                                                    <th class="text-center">ชื่อร้านค้า</th>
                                                    <!-- <th class="text-center">อายุ</th> -->
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
                                                    <!-- <form action="#" method="post"> -->
                                                    <!-- <td class="text-center"><?php echo htmlspecialchars($result["id"]); ?></td> -->
                                                    <td class="text-nowrap">
                                                        <?php echo htmlspecialchars($result["Posting_date"]); ?>
                                                    </td>
                                                    <!-- <td class="text-nowrap"><?php echo htmlspecialchars($result["User_name"]); ?></td> -->
                                                    <td><?php echo htmlspecialchars($result["Customer_name"]); ?>
                                                    </td>
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
                                                                            $progressText = 'ลูกค้าสั่งของ';
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
                                                                style="width:<?php echo htmlspecialchars($led01); ?>%">
                                                                <?php echo htmlspecialchars($progressText ); ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- <td><?php echo htmlspecialchars($result["comment"]); ?></td> -->
                                                    <!-- <td class="text-center"><?php if ($result["supportname"] != "") { echo "✔️"; } ?></td> -->
                                                    <!-- <td align="center"><?php if ($result["mgitname"] != "") { echo "✔️"; } ?></td> -->
                                                    <td class="text-center">    
                                                                <form action="salevisit_detail1.php" method="post">
                                                                    <input name="reqid" type="hidden"
                                                                        value="<?php echo htmlspecialchars($result["id"]); ?>" />
                                                                    <input name="Submit" type="submit"
                                                                        class="btn btn-sm btn-primary" value="Detail" />
                                                                </form>
                                                    </td>
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
                </div>
                <!-- /.container-fluid -->


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