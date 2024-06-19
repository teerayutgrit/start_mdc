<?php
//เช็8login
require_once 'session_check.php';

include 'dbcon.php';
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

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> -->

    <style>
    #map {
        height: 500px;
        width: 100%;

    }
    </style>

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
            <hr class="sidebar-divider ">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider ">

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
                        <!-- <a class="collapse-item" href="cards.html">Re visit</a> -->
                        <!-- <a class="collapse-item" href="re_visitmain.php">Re visit</a> -->

                    </div>
                </div>
                <?php endif; ?>
            </li>

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
            <hr class="sidebar-divider ">

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
            <hr class="sidebar-divider d-none d-md-block ">

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

                    <!-- Topbar Search -->
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
                        <!-- Dropdown - Messages -->
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
                            </div> -->
                        </li>

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
                            </div> -->
                        </li>

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
                        <h1 class="h3 mb-0 text-gray-800">New Visit</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i -->
                        <!-- class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <!-- <div class="row"> -->

                    <!-- Earnings (Monthly) Card Example -->
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                รอใสข้อมูลรายละเอียด</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <!-- Earnings (Monthly) Card Example -->
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <!-- Earnings (Monthly) Card Example -->
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
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
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Content Row -->
                    <div class="row">
                        <?php

                            // Check if reqid is set in POST request
                            if (!isset($_POST['reqid'])) {
                                // Handle the case where reqid is not provided
                                echo "Request ID is not set.";
                                exit();
                            }

                            $reqid = $_POST['reqid'];

                                // Prepare the statement to prevent SQL injection
                                $stmt = sqlsrv_prepare($conn, "SELECT * FROM MDC_Visitor WHERE id = ? ORDER BY id DESC", array(&$reqid));
                            
                                if ($stmt === false) {
                                    die(print_r(sqlsrv_errors(), true));
                                }
                            
                                // Generate SAS token (this should be done in a secure way, possibly with a server-side function or script)
                                  $sasToken = "si=readonly&sv=2022-11-02&sr=c&sig=GuZdU2IHmFOrcpcx3ka7yuM0T0%2Fay6EraGqIT6IYl54%3D"; // Replace with your actual SAS token     
                    ?>

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <?php
                                if (sqlsrv_execute($stmt)) {
                                    while ($result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                    // Generate SAS URL for the image
                                    $blobUrl = "https://mardicraft2024.blob.core.windows.net/mdcimg/" . urlencode($result["Customer_image"]) . ".?" . $sasToken; // Adjust the file extension if necessary
                                    // echo $blobUrl;
                            ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between bg-gradient-primary shadow-lg rounded "
                                    style="margin-top: -0.5rem ">
                                    <h6 class=" m-0 font-weight-bold text-light ">ร้าน
                                        <?php echo $result["Customer_name"]; ?></h6>
                                </div>
                                <div class=" card-body">
                                    <form action="update_sale_re_visit.php" method="POST"
                                        class="was-validated align-items-center" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text text-dark">
                                                    <i class="fa fa-calendar text-primary "></i> Date:
                                                    <?php echo htmlspecialchars($result["Posting_date"]); ?></p>
                                                    <i class="fa fa-check-square text-primary"></i> Seat:
                                                    <?php echo htmlspecialchars($result["Seat_total"]);  ?></p>
                                                    <i class="fa fa-map-marker text-primary"></i> Zone:
                                                    <?php echo htmlspecialchars($result["Outlet_Zone"]);  ?></p>
                                                    <i class="fa fa-handshake text-primary"></i> Spending per head:
                                                    <?php echo htmlspecialchars($result["Spendingperhead"]);  ?></p>
                                                    <i class="fa fa-bolt text-primary"></i> Promotion:
                                                    <?php echo htmlspecialchars($result["Promotion"]);  ?></p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text text-nowrap ">
                                                    <i class="fa fa-shopping-basket text-primary"></i> Category:
                                                    <?php echo htmlspecialchars($result["Outlet_type"]); ?></p>
                                                    <i class="fa fa-venus-mars text-primary"></i> Target:
                                                    <?php echo htmlspecialchars($result["Gender"]); ?></p>
                                                    <i class="fa fa-clock text-primary"></i> Times:
                                                    <?php echo htmlspecialchars($result["openingandclosingtimes"]); ?>
                                                    </p>
                                                    <i class="fa fa-truck text-primary"></i> Delivery:
                                                    <?php echo htmlspecialchars($result["Delivery"]); ?></p>
                                                    <i class="fa fa-info text-primary"></i> Event:
                                                    <?php echo htmlspecialchars($result["Event_outlet"]); ?></p>
                                                </div>
                                            </div>
                                            <!-- <div class="col-12">
                                                <div class="text text-nowrap ">
                                                    <i class="fa fa-share-alt text-primary text-sm"></i> Product
                                                    Present:
                                                    <?php echo htmlspecialchars($result["Present_pd"]); ?></p>
                                                </div>
                                            </div> -->
                                            <div class="col-12">
                                                <div class="text text-nowrap ">
                                                    <i class="fa fa-hourglass-start text-primary"></i> สถานะ <div
                                                        class="progress ">
                                                        <?php
                                                        $led02 = $result["processwork"];
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
                                                            aria-valuenow="<?php echo htmlspecialchars($led02); ?>"
                                                            aria-valuemin="0" aria-valuemax="100"
                                                            style="width:<?php echo htmlspecialchars($led02); ?>%">
                                                            <?php echo htmlspecialchars($progressText ); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 ">
                                                <div class="col-12 card border-left-primary shadow text-dark mb-1 me-0.5 "
                                                    style="margin:10px 0px 0px 0px; ">
                                                    <div class="card-header shadow "
                                                        style="padding: 10px 10px 10px 10px;"><i
                                                            class="fa fa-cubes text-primary"></i> Product Present:
                                                    </div>
                                                    <div class="card-body h6" style="padding: 10px 10px 10px 10px;">
                                                        <?php echo $result["Present_pd"];  ?></div>
                                                </div>
                                                <div class="col-12 card border-left-primary shadow text-dark mb-1 me-0.5 "
                                                    style="margin:10px 0px 0px 0px; ">
                                                    <div class="card-header shadow "
                                                        style="padding: 10px 10px 10px 10px;"><i
                                                            class="fa fa-comments text-primary"></i> Situation
                                                    </div>
                                                    <div class="card-body h6" style="padding: 10px 10px 10px 10px;">
                                                        <?php echo $result["Situation"];  ?></div>
                                                </div>
                                                <div class="col-12 card  " style="margin:10px 0px 0px 0px; ">
                                                    <div class="card-header shadow " style="padding:1px 1px 1px 1px;"><i
                                                            class="fa fa-file-image text-primary"></i> รูป</div>
                                                    <div
                                                        class="card-body d-flex justify-content-center align-items-center">
                                                        <img src="<?php echo $blobUrl; ?>"
                                                            alt="<?php echo $result["Customer_name"]; ?>"
                                                            style="width: 370px; height:auto;">
                                                    </div>
                                                </div>
                                                <div class="col-12 card  border-left-primary shadow text-dark mb-1 me-0.5 "
                                                    style="margin:10px 0px 0px 0px; ">
                                                    <div class="card-header shadow " style="margin:10px 0px 0px 0px;"><i
                                                            class="fa fa-map-marker text-primary"></i> Map</div>
                                                    <div
                                                        class="card-body d-flex justify-content-center align-items-center">
                                                        <div id="map"></div>
                                                    </div>
                                                    <script
                                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrpXCQ89oWF2OVtp9r9lQco72BM3ps9yo&callback=initMap">
                                                    </script>
                                                    <script>
                                                    function initMap() {
                                                        // Fetch latitude and longitude from PHP
                                                        var lat = <?php echo json_encode($result['Latitude']); ?>;
                                                        var lng = <?php echo json_encode($result['Longitude']); ?>;
                                                        var customerName =
                                                            <?php echo json_encode($result['Customer_name']); ?>;

                                                        var location = {
                                                            lat: parseFloat(lat),
                                                            lng: parseFloat(lng)
                                                        };

                                                        // Create the map centered on the fetched coordinates
                                                        var map = new google.maps.Map(document.getElementById(
                                                            'map'), {
                                                            zoom: 18,
                                                            center: location
                                                        });

                                                        // Place a marker on the location
                                                        var marker = new google.maps.Marker({
                                                            position: location,
                                                            map: map,
                                                            title: customerName
                                                        });
                                                        // Add a click listener to the marker
                                                        google.maps.event.addListener(marker, 'click', function() {
                                                            window.open(
                                                                'https://www.google.com/maps/search/?api=1&query=' +
                                                                location.lat + ',' + location.lng);
                                                        });
                                                    }

                                                    // Initialize the map when the window loads
                                                    window.onload = initMap;
                                                    </script>
                                                </div>
                                    </form>
                                    <?php } } else { echo "Error in statement execution.\n"; die(print_r(sqlsrv_errors(), true)); } ?>

                                    <div class="col-12 card  border-left-primary shadow text-dark mb-1 me-0.5 "
                                        style="margin:10px 0px 0px 0px; ">
                                        <div class="card-header shadow "><i class="fa fa-file-image text-primary"></i>
                                            Product</div>
                                        <div class="card-body">
                                            <div class="col-12">
                                                <?php
                                            // สร้างคำสั่ง SQL เพื่อดึงข้อมูลรูปแบบร้านจากฐานข้อมูล
                                        $sql = "SELECT DISTINCT product_series FROM Product_data order by product_series ASC";
                                        $stmt = sqlsrv_query($conn, $sql);
                                        if ($stmt !== false) {
                                            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                                echo "<div class='form-check'>";
                                                    echo "<input class='form-check-input ' type='checkbox' name='product_series[]' value='" . $row['product_series'] . "' id='product_series_" . $row['product_series'] . "'>";
                                                    echo "<label class='form-check-label text-dark' for='product_series" . $row['product_series'] . "'>" . $row['product_series'] . "</label>";
                                                echo "</div>";
                                            }
                                            sqlsrv_free_stmt($stmt);
                                        } else {                                    
                                         echo "ไม่พบข้อมูล";
                                        }
                                        ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin:10px 0px 0px 0px; ">
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <div class="d-grid d-md-block" style="margin:10px 0px 0px 0px; ">
                                                <button type="button" class="btn btn-primary"
                                                    style="margin:0px 0px 10px 0px; width: 165px; " data-toggle="modal"
                                                    data-target="#updateproductConfirmationModal"><i
                                                        class="fas fa-cubes"></i>
                                                    Product Present</button>
                                                <button type="button" class="btn btn-success"
                                                    style="margin:0px 0px 10px 0px;  width: 165px; " data-toggle="modal"
                                                    data-target="#FinishConfirmationModal"><i
                                                        class="fas fa-paper-plane"></i>
                                                    Finish</button>
                                                <button type="button" class="btn btn-danger "
                                                    style="margin:0px 0px 10px 0px; width: 165px;" data-toggle="modal"
                                                    data-target="#deleteConfirmationModal"><i
                                                        class="fas fa-trash-alt"></i>
                                                    Delete</button>
                                                <a class="btn btn-secondary"
                                                    style="margin:0px 0px 10px 0px; width: 165px;"
                                                    href="salevisit_new.php" role="button"><i class="fas fa-reply"></i>
                                                    Black</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <!-- update product Confirmation Modal-->
    <div class="modal fade" id="updateproductConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Update</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to update product?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form name="frmMain" action="update_sale_re_visit.php" method="post" id="formupdateproduct01"
                        onsubmit="setProductSeries()">
                        <input type="hidden" id="reqid" name="reqid" value="<?php echo htmlspecialchars($reqid); ?>">
                        <input type="hidden" id="product_series_" name="product_series_">
                        <input name="update" type="submit" class="btn btn-primary" value="Update Product">
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Finish Confirmation Modal-->
<div class="modal fade" id="FinishConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Finish</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form name="frmMain" action="update_finish.php" method="post" id="formFinish01">
                <div class="modal-body"> Are you sure you want to Finish?
                    <!-- <div class="col-md-3"> -->
                        <!-- <label for="status_finish" class="form-label">Status Finish</label> -->
                        <select class="form-select" name="status_finish" required aria-label="select example">
                            <option value="">Status Finish</option>
                            <option value="รอเข้า visit อีกรอบ">รอเข้า visit อีกรอบ</option>
                            <option value="ปิดการขาย">ปิดการขาย</option>
                        </select>
                    <!-- </div> -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="hidden" id="reqid" name="reqid" value="<?php echo htmlspecialchars($reqid); ?>">
                    <input name="Finish" type="submit" class="btn btn-success" value="Finish">
                </div>
            </form>
        </div>
    </div>
</div>


    <!-- Delete Confirmation Modal-->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete?</div>
                <div class="modal-footer">
                    <from>
                        <p>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <!-- <a class="btn btn-danger" id="deleteButton" href="delete.php">Delete</a> -->
                        </p>
                    </from>
                    <form name="frmMain" action="actiondelete.php" method="post" id="formdelete01">
                        <p style="text-align:center;">
                            <input type="hidden" id="reason" name="reason">
                            <input type="hidden" id="reqid" name="reqid" value="<?php echo $reqid; ?>">
                            <input name="delete" type="submit" class="btn btn-danger" value="Delete">
                        </p>
                    </form>
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

    <!-- <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12, 
                center: {lat: 13.744498, lng: 100.551048}
            });

        
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var locations = JSON.parse(this.responseText);
                    locations.forEach(function(location) {
                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(location.Latitude), lng: parseFloat(location.Longitude)}, // ตำแหน่งของหมุด
                            map: map,
                            title: location.Customer_name 
                        });
                    });
                }
            };
            xhr.open("GET", "json.php", true);
            xhr.send();
        }
    </script> -->
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrpXCQ89oWF2OVtp9r9lQco72BM3ps9yo&callback=initMap"></script> -->

    <!-- popupdelete -->
    <script>
    $(document).ready(function() {
        $('#deleteButton').on('click', function() {
            $('#deleteConfirmationModal').modal('show');
        });
    });
    </script>

    <!-- popupFinish -->
    <script>
    $(document).ready(function() {
        $('#FinishButton').on('click', function() {
            $('#FinishConfirmationModal').modal('show');
        });
    });
    </script>

    <!-- popupupdatepd-->
    <script>
    function setProductSeries() {
        const checkboxes = document.querySelectorAll('input[name="product_series[]"]:checked');
        const selectedValues = Array.from(checkboxes).map(cb => cb.value);
        document.getElementById('product_series_').value = selectedValues.join(',');
    }
    </script>

    <!-- <script>
$(document).ready(function() {
    $('#updateButton').on('click', function() {
        $('#updateproductConfirmationModal').modal('show');
    });

    document.getElementById('formupdateproduct01').addEventListener('submit', function(event) {
        // Get the selected product series values
        var selectedProductSeries = [];
        var checkboxes = document.querySelectorAll('input[name="product_series[]"]:checked');
        for (var i = 0; i < checkboxes.length; i++) {
            selectedProductSeries.push(checkboxes[i].value);
        }
        // Set the value in the hidden input field
        document.getElementById('product_series_').value = selectedProductSeries.join(',');

        // Close the modal
        $('#updateproductConfirmationModal').modal('hide');
    });
});
</script> -->

    <!-- <script>
    เมื่อฟอร์มถูกส่ง
    document.getElementById('formupdateproduct01').addEventListener('submit', function(event) {
        รับค่าที่ถูกเลือกจากช่องทำเครื่องหมายถูกหรือผิด
        var selectedProductSeries = [];
        var checkboxes = document.querySelectorAll('input[name="product_series[]"]:checked');
        for (var i = 0; i < checkboxes.length; i++) {
            selectedProductSeries.push(checkboxes[i].value);
        }
        กำหนดค่าที่ได้เข้าในฟิลด์ input ชนิด hidden
        document.getElementById('product_series_').value = selectedProductSeries.join(',');
    });
    </script> -->

    <style>
    </body></html>