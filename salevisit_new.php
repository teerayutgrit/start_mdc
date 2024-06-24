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

    <title>Mardi Craft Brewing - New Visit</title>

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
                        <a class="collapse-item" href="salevisit_new.php">New Outlet</a>
                        <!-- <a class="collapse-item" href="cards.html">Re visit</a> -->
                        <!-- <a class="collapse-item" href="re_visitmain.php">Re visit</a> -->

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
                        <h1 class="h3 mb-0 text-gray-800">New Visit & Visit List</h1>
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

                        <!-- Content Column -->
                        <!-- <div class="col-lg-6 mb-4"> -->

                        <!-- Project Card Example -->
                        <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> -->

                        <!-- Color System -->
                        <!-- <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        <!-- </div> -->

                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between bg-gradient-primary shadow-lg rounded">
                                    <h6 class="m-0 font-weight-bold text-light">รายละเอียดร้านค้า</h6>
                                </div>
                                <div class="card-body">
                                    <form id="uploadForm" action="salevisit_insertdata.php" method="POST"
                                        class="was-validated align-items-center" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="OutletName01" class="form-label">Outlet</label>
                                                <input type="text" class="form-control" name="OutletName"
                                                    id="OutletName01" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Outlet_Zone" class="form-label">Zone</label>
                                                <input type="text" step="any" name="Outlet_Zone"
                                                    class="form-control is-valid" id="validationTextarea" value=""
                                                    required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="openingandclosingtimes" class="form-label">opening and
                                                    closing times</label>
                                                <input type="text" step="any" name="openingandclosingtimes"
                                                    class="form-control is-valid" id="validationTextarea" value=""
                                                    required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="Outlet_type-01" class="form-label">Segmentation</label>
                                                <select class="form-select" name="Outlet_type" required
                                                    aria-label="select example">
                                                    <option value=""></option>
                                                    <option value="Agent">Agent</option>
                                                    <option value="Bar & Restaurant">Bar & Restaurant</option>
                                                    <option value="Café">Café</option>
                                                    <option value="Café & Restaurant">Café & Restaurant</option>
                                                    <option value="Chain Restaurant">Chain Restaurant</option>
                                                    <option value="Community Mall / Flea Market">Community Mall / Flea
                                                        Market</option>
                                                    <option value="Expat Bar / Sport Bar">Expat Bar / Sport Bar</option>
                                                    <option value="Fine Dining">Fine Dining</option>
                                                    <option value="Garden & Restaurant">Garden & Restaurant</option>
                                                    <option value="Hotel">Hotel</option>
                                                    <option value="Micro Brew Bar">Micro Brew Bar</option>
                                                    <option value="Online Shop">Online Shop</option>
                                                    <option value="Other">Other</option>
                                                    <option value="Restaurant">Restaurant</option>
                                                    <option value="Rooftop Bar">Rooftop Bar</option>
                                                    <option value="Sub-Agent">Sub-Agent</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Seat_total-01" class="form-label">Seat</label>
                                                <input type="number" step="any" name="Seat_total"
                                                    class="form-control is-valid" maxlength="3" id="validationTextarea"
                                                    value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Spendingperhead" class="form-label">Spending per
                                                    head</label>
                                                <input type="text" step="any" name="Spendingperhead"
                                                    class="form-control is-valid" maxlength="" id="validationTextarea"
                                                    value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Delivery" class="form-label">Delivery</label>
                                                <input type="text" step="any" name="Delivery"
                                                    class="form-control is-valid" maxlength="" id="validationTextarea"
                                                    value="" required>
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
                                            <div class="col-md-3">
                                                <label for="Gender01" class="form-label">Taget Gender</label>
                                                <select class="form-select" name="Gender" required
                                                    aria-label="select example">
                                                    <option value=""></option>
                                                    <option value="Men">Men</option>
                                                    <option value="Women">Women</option>
                                                    <option value="LGBQ+">LGBQ+</option>
                                                    <option value="All">All</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Promotionbeer" class="form-label">Promotion beer</label>
                                                <input type="text" step="any" name="Promotionbeer"
                                                    class="form-control is-valid" maxlength="" id="validationTextarea"
                                                    value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Event" class="form-label">Event</label>
                                                <input type="text" step="any" name="Event" class="form-control is-valid"
                                                    maxlength="" id="validationTextarea" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="Contact_outlet" class="form-label">Contact</label>
                                                <input type="text" step="any" name="Contact_outlet"
                                                    class="form-control is-valid" id="validationTextarea" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="Event" class="form-label">ไม่รู้จะใสอะไร</label>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" name="checkboxes[]"
                                                        id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="checkboxes[]"
                                                        id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="checkboxes[]"
                                                        id="inlineCheckbox2" value="option3">
                                                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Product_good" class="form-label">รอใส่ brand สินค้าขายดี</label>
                                                <input type="text" step="any" name="Product_good" class="form-control is-valid" maxlength="" id="validationTextarea" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="Situation" class="form-label">Situation</label>
                                                <!-- <input type="text" step="any" name="Situation" class="form-control is-valid" maxlength="" id="Situation"  value="" required> -->
                                                <textarea class="form-control" name="Situation" id="Situation"
                                                    rows="2"></textarea>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="Gender01" class="form-label">ตำแหน่งร้าน</label>
                                                <div class="">
                                                    <button class="btn btn-info" onclick="getCurrentLocation()"
                                                        type="button"><i class="fa fa-location-arrow"
                                                            aria-hidden="true"></i> ระบุตำแหน่งร้านค้า</button>
                                                </div>
                                                <div class="invalid-feedback"></div>
                                                <input type="hidden" id="lat" name="lat">
                                                <input type="hidden" id="lng" name="lng">
                                            </div>
                                            <!-- <div class="col-md-3">
                                                <label for="fileToUpload" class="form-label">รูป</label>
                                                <input type="file" name="filesToUpload[]" class="form-control is-valid" id="fileToUpload" multiple required>
                                                <div class="invalid-feedback"></div>
                                            </div> -->
                                            <div class="col-md-3">
                                                <label for="fileToUpload" class="form-label">รูป</label>
                                                <input type="file" name="filesToUpload[]" class="form-control is-valid"
                                                    id="fileToUpload" multiple required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <canvas id="canvas" style="display: none;"></canvas>
                                        <div id="map"></div>
                                        <div class="d-grid gap-2 d-md-flex mt-2 justify-content-center">
                                            <button type="button" class="btn btn-success"
                                                onclick="resizeAndUpload()">Save</button>
                                            <a class="btn btn-danger" href="index.php" role="button">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
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
                                                    <form action="salevisit_detail.php" method="post">
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
                                                                    style="width:<?php echo htmlspecialchars($led01); ?>%">
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

    <!-- บันทึกสำเร็จ modal HTML -->
    <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Saved</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">successfully saved.</div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                    <a class="btn btn-primary" href="salevisit_new.php">Go to New Sale Visit</a>
                </div>
            </div>
        </div>
    </div>


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

    <script>
    function resizeAndUpload() {
        const fileInput = document.getElementById('fileToUpload');
        const canvas = document.getElementById('canvas');
        const max_width = 1920;
        const max_height = 1080;

        if (fileInput.files.length > 0) {
            const files = Array.from(fileInput.files);
            const formData = new FormData();

            let fileCounter = 0;

            files.forEach(file => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        let width = img.width;
                        let height = img.height;
                        const ratio = width / height;

                        if (width > max_width) {
                            width = max_width;
                            height = max_width / ratio;
                        }

                        if (height > max_height) {
                            height = max_height;
                            width = max_height * ratio;
                        }

                        canvas.width = width;
                        canvas.height = height;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, width, height);

                        canvas.toBlob(function(blob) {
                            formData.append('filesToUpload[]', blob, file.name);

                            fileCounter++;
                            if (fileCounter === files.length) {
                                uploadFiles(formData);
                            }
                        }, file.type, 0.85);
                    };

                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
            });
        } else {
            alert('No file selected.');
        }
    }

    function uploadFiles(formData) {
        const form = document.querySelector('form');
        const formElements = form.elements;

        // Append all form data
        for (let i = 0; i < formElements.length; i++) {
            if (formElements[i].type !== 'file') {
                formData.append(formElements[i].name, formElements[i].value);
            }
        }

        fetch('salevisit_insertdata.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                console.log('Success:', result);
                $('#saveModal').modal('show');
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    </script>


    <!-- <script>
    document.getElementById('fileToUpload').addEventListener('change', handleFileSelect);

    function handleFileSelect(event) {
        const fileInput = event.target;
        const files = Array.from(fileInput.files);
        const resizedImages = [];

        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        const max_width = 1920;
        const max_height = 1080;

        files.forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    let width = img.width;
                    let height = img.height;
                    const ratio = width / height;

                    if (width > max_width) {
                        width = max_width;
                        height = max_width / ratio;
                    }

                    if (height > max_height) {
                        height = max_height;
                        width = max_height * ratio;
                    }

                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(img, 0, 0, width, height);

                    canvas.toBlob(function(blob) {
                        const resizedFile = new File([blob], `${file.name}_${index}_${Date.now()}`, {
                            type: file.type,
                            lastModified: Date.now()
                        });

                        resizedImages.push(resizedFile);

                        if (resizedImages.length === files.length) {
                            // All images have been resized, now trigger the upload
                            uploadResizedImages(resizedImages);
                        }
                    }, file.type, 0.85);
                };

                img.src = e.target.result;
            };

            reader.readAsDataURL(file);
        });
    }

    function uploadResizedImages(files) {
        const formData = new FormData();
        files.forEach(file => {
            formData.append('filesToUpload[]', file);
        });

        fetch('salevisit_insertdatatest.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(result => {
            console.log('Success:', result);
            $('#saveModal').modal('show');
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script> -->

    <!-- <script>
        function resizeAndUpload() {
            const fileInput = document.getElementById('fileToUpload');
            const canvas = document.getElementById('canvas');
            const max_width = 1920; // Maximum width of the resized image
            const max_height = 1080; // Maximum height of the resized image

            if (fileInput.files.length > 0) {
                const files = Array.from(fileInput.files);
                const formData = new FormData(document.getElementById('uploadForm'));

                let fileCounter = 0;

                files.forEach(file => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = new Image();
                        img.onload = function() {
                            let width = img.width;
                            let height = img.height;
                            const ratio = width / height;

                            if (width > max_width) {
                                width = max_width;
                                height = max_width / ratio;
                            }

                            if (height > max_height) {
                                height = max_height;
                                width = max_height * ratio;
                            }

                            canvas.width = width;
                            canvas.height = height;
                            const ctx = canvas.getContext('2d');
                            ctx.drawImage(img, 0, 0, width, height);

                            canvas.toBlob(function(blob) {
                                formData.append('filesToUpload[]', blob, file.name);

                                fileCounter++;
                                if (fileCounter === files.length) {
                                    fetch('salevisit_insertdatatest.php', {
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text())
                                    .then(result => {
                                        console.log('Success:', result);
                                        $('#saveModal').modal('show'); // Show the modal
                                        // alert('Upload successful');
                                        // window.location.href = 'salevisit_new.php'; // Redirect if needed
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                                }
                            }, file.type, 0.85); // Adjust the quality parameter if needed
                        };

                        img.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                });
            } else {
                alert('No file selected.');
            }
        }
    </script> -->

    <!-- ปุ่มระบุตำแหน่ง -->
    <script>
    function getCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.getElementById("lat").value = position.coords.latitude;
        document.getElementById("lng").value = position.coords.longitude;
        var geocoder = new google.maps.Geocoder();
        var latlng = {
            lat: parseFloat(position.coords.latitude),
            lng: parseFloat(position.coords.longitude)
        };
        geocoder.geocode({
            'location': latlng
        }, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    document.getElementById("location").value = results[0].formatted_address;
                } else {
                    window.alert('ไม่พบสถานที่');
                }
            } else {
                window.alert('การร้องขอสถานที่ล้มเหลว เนื่องจาก ' + status);
            }
        });
    }
    </script>



</body>

</html>