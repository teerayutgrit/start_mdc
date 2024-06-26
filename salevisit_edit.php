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
                <?php if ($Permission_user >= "1"): ?>
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
                <?php if ($Permission_user >= "2"): ?>
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

            <?php if ($Permission_user >= "2"): ?>
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
                        </li>
                        </li>
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
                        <h1 class="h3 mb-0 text-gray-800">Edit</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i -->
                        <!-- class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between bg-gradient-primary shadow-lg rounded">
                                    <h6 class="m-0 font-weight-bold text-light">รายละเอียดร้านค้า</h6>
                                </div>
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
                                <div class="card-body">
                                <?php
                                if (sqlsrv_execute($stmt)) {
                                    while ($result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                    // Generate SAS URL for the image
                                    $blobUrl = "https://mardicraft2024.blob.core.windows.net/mdcimg/" . urlencode($result["Customer_image"]) . ".?" . $sasToken; // Adjust the file extension if necessary
                                    // echo $blobUrl;
                            ?>
                                    <form action="edit_sale_visit.php" method="POST"
                                        class="was-validated align-items-center" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="OutletName01" class="form-label">Outlet</label>
                                                <input type="text" class="form-control" name="OutletName"
                                                    id="OutletName01" value="<?php echo htmlspecialchars($result["Customer_name"]); ?>" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Outlet_Zone" class="form-label">Zone</label>
                                                <input type="text" step="any" name="Outlet_Zone"
                                                    class="form-control is-valid" id="validationTextarea" value="<?php echo htmlspecialchars($result["Outlet_Zone"]); ?>"
                                                    required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="openingandclosingtimes" class="form-label">opening and
                                                    closing times</label>
                                                <input type="text" step="any" name="openingandclosingtimes"
                                                    class="form-control is-valid" id="validationTextarea" value="<?php echo htmlspecialchars($result["openingandclosingtimes"]); ?>"
                                                    required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="Outlet_type-01" class="form-label">Segmentation</label>
                                                <select class="form-select" name="Outlet_type" required
                                                    aria-label="select example">
                                                    <option value="<?php echo htmlspecialchars($result["Outlet_type"]); ?>"><?php echo htmlspecialchars($result["Outlet_type"]); ?></option>
                                                    <option value=""></option>
                                                    <option value="Agent">Agent</option>
                                                    <option value="Bar & Restaurant">Bar & Restaurant</option>
                                                    <option value="Café">Café</option>
                                                    <option value="Café & Restaurant">Café & Restaurant</option>
                                                    <option value="Chain Restaurant">Chain Restaurant</option>
                                                    <option value="Community Mall / Flea Market">Community Mall / Flea Market</option>
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
                                                    value="<?php echo htmlspecialchars($result["Seat_total"]); ?>" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Spendingperhead" class="form-label">Spending per
                                                    head</label>
                                                <input type="text" step="any" name="Spendingperhead"
                                                    class="form-control is-valid" maxlength="" id="validationTextarea"
                                                    value="<?php echo htmlspecialchars($result["Spendingperhead"]); ?>" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Delivery" class="form-label">Delivery</label>
                                                <input type="text" step="any" name="Delivery"
                                                    class="form-control is-valid" maxlength="" id="validationTextarea"
                                                    value="<?php echo htmlspecialchars($result["Delivery"]); ?>" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="Range01Age" class="form-label">Taget Age</label>
                                                <select class="form-select" name="RangeAge" required
                                                    aria-label="select example">
                                                    <option value="<?php echo htmlspecialchars($result["Range_Age"]); ?>"><?php echo htmlspecialchars($result["Range_Age"]); ?></option>
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
                                                    <option value="<?php echo htmlspecialchars($result["Gender"]); ?>"><?php echo htmlspecialchars($result["Gender"]); ?>"</option>
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
                                                    value="<?php echo htmlspecialchars($result["Promotion"]); ?>" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Event" class="form-label">Event</label>
                                                <input type="text" step="any" name="Event" class="form-control is-valid"
                                                    maxlength="" id="validationTextarea" value="<?php echo htmlspecialchars($result["Event_outlet"]); ?>" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="Contact_outlet" class="form-label">Contact</label>
                                                <input type="text" step="any" name="Contact_outlet"
                                                    class="form-control is-valid" id="validationTextarea" value="<?php echo htmlspecialchars($result["Contact_outlet"]); ?>" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Status_outlet" class="form-label">Status outlet</label>
                                                <select class="form-select" name="Status_outlet" required
                                                    aria-label="select example">
                                                    <option value="<?php echo htmlspecialchars($result["Status_outlet"]); ?>"><?php echo htmlspecialchars($result["Status_outlet"]); ?></option>
                                                    <option value="New-outlet">New-outlet</option>
                                                    <option value="Ex">Ex</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Event" class="form-label">ประเภทสินค้าและสินค้าขายดี</label>
                                                <input type="text" step="any" name="PD_good" class="form-control is-valid" maxlength="" id="validationTextarea" value="<?php echo htmlspecialchars($result["PD_good1"]); ?>" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                            <label for="Event" class="form-label">ประเภทสินค้าขายดีในร้าน</label>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" name="checkboxes[]"
                                                        id="inlineCheckbox1" value="Beer">
                                                    <label class="form-check-label text-dark" for="inlineCheckbox1">Beer</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="checkboxes[]"
                                                        id="inlineCheckbox2" value="Wine">
                                                    <label class="form-check-label text-dark" for="inlineCheckbox2">Wine</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="checkboxes[]"
                                                        id="inlineCheckbox2" value="Spirit">
                                                    <label class="form-check-label  text-dark" for="inlineCheckbox2">Spirit</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="checkboxes[]"
                                                        id="inlineCheckbox2" value="Cocktail">
                                                    <label class="form-check-label  text-dark" for="inlineCheckbox2">Cocktail</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="checkboxes[]"
                                                        id="inlineCheckbox2" value="Others">
                                                    <label class="form-check-label  text-dark" for="inlineCheckbox2">Others</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="Product_good" class="form-label">ชื่อสินค้า</label>
                                                <input type="text" step="any" name="Product_good" class="form-control is-valid" maxlength="" id="validationTextarea" value="">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="Situation" class="form-label">Situation</label>
                                                <!-- <input type="text" step="any" name="Situation" class="form-control is-valid" maxlength="" id="Situation"  value="" required> -->
                                                <textarea class="form-control" name="Situation" id="Situation" 
                                                    rows="2"><?php echo htmlspecialchars($result["Situation"]); ?></textarea>
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
                                                <input type="file" name="fileToUpload" class="form-control is-valid"
                                                    id="fileToUpload" required>
                                                <div class="invalid-feedback"></div>
                                            </div> -->
                                        </div>
                                        <canvas id="canvas" style="display: none;"></canvas>
                                        <div id="map"></div>
                                        <div class="d-grid gap-2 d-md-flex mt-2 justify-content-center">
                                            <!-- <button type="button" class="btn btn-success"  type="submit" >Save</button> -->
                                            <button class="btn btn-success" type="submit">Save</button>
                                            <input type="hidden" id="reqid" name="reqid" value="<?php echo htmlspecialchars($reqid); ?>">
                                            
                                            <a class="btn btn-danger" href="salevisit_new.php" role="button">Back</a>
                                        </div>
                                    </form>
                                    <?php } } else { echo "Error in statement execution.\n"; die(print_r(sqlsrv_errors(), true)); } ?>
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
        const max_width = 1920; // Maximum width of the resized image
        const max_height = 1080; // Maximum height of the resized image

        if (fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];
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
                        const formData = new FormData(document.querySelector('form'));
                        formData.set('fileToUpload', blob, file.name);

                        fetch('salevisit_insertdata.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.text())
                            .then(result => {
                                // alert('Saved');
                                // window.location.href = 'salevisit_new.php';
                                $('#saveModal').modal('show'); // Show the modal
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }, file.type, 0.85); // Adjust the quality parameter if needed
                };

                img.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            alert('No file selected.');
        }
    }
    </script>

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