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

    <title>Mardi Craft Brewing - Existing</title>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Include Bootstrap CSS -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" /> -->

    <!-- Include Bootstrap-Select CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css"
        rel="stylesheet" />

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include Bootstrap-Select JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <?php
    // เชื่อมต่อฐานข้อมูล
    include("dbcon.php");
    ?>


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
            <hr class="sidebar-divider my-0 bg-light">

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
                        <a class="collapse-item" href="salevisit_revisit.php">Re visit</a>
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
                        <h1 class="h3 mb-0 text-gray-800">Re visit</h1>

                    </div>
                    <script>
$(document).ready(function() {
    // Fetch branches when OutletName changes
    $('#OutletName01').on('change', function() {
        fetchBranches();
    });

    // Update OutletZone when both OutletName and branch_outlet are selected
    $('#branch_outlet01').on('change', function() {
        var outletName = $('#OutletName01').val();
        var branchOutlet = $('#branch_outlet01').val();
        
        if (outletName && branchOutlet) {
            $.ajax({
                url: 'fetch_outlet_data2.php',
                type: 'POST',
                data: {
                    customer_name: outletName,
                    branch_outlet: branchOutlet
                },
                dataType: 'json',
                success: function(response) {
                    if (response && response.Outlet_Zone) {
                        $('#OutletZone').val(response.Outlet_Zone); // Populate the OutletZone field
                        $('#openingandclosingtimes').val(response.openingandclosingtimes); // Populate the OutletZone field
                        $('#Outlet_type').val(response.Outlet_type); 
                        $('#Seat_total').val(response.Seat_total); 
                        $('#Spendingperhead').val(response.Spendingperhead); 
                        $('#Delivery').val(response.Delivery);
                        $('#Range_Age').val(response.Range_Age);
                        $('#Gender').val(response.Gender);
                        $('#Promotion').val(response.Promotion);
                        $('#Event_outlet').val(response.Event_outlet);
                        $('#Contact_outlet').val(response.Contact_outlet);
                        $('#PD_good1').val(response.PD_good1);
                        $('#Situation').val(response.Situation);
                        $('#Status_outlet').val(response.Status_outlet);
                    } else {
                        $('#OutletZone').val(''); // Clear if no data found
                        $('#openingandclosingtimes').val('');
                        $('#Outlet_type').val('');
                    }
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        }
    });
});

function fetchBranches() {
    var outletName = $('#OutletName01').val();
    var branchDropdown = $('#branch_outlet01');
    
    branchDropdown.html('<option value="">Select or add Branch</option>'); // Clear existing options
    
    if (outletName) {
        $.ajax({
            url: 'get_branches.php',
            type: 'POST',
            data: { customer_name: outletName },
            success: function(response) {
                var branches = JSON.parse(response);
                if (branches.length > 0) {
                    branches.forEach(function(branch) {
                        branchDropdown.append('<option value="' + branch + '">' + branch + '</option>');
                    });
                } else {
                    branchDropdown.html('<option value="">No branches available</option>');
                }
            },
            error: function() {
                alert('Failed to load branches');
            }
        });
    }
}
// function fetchBranches() {
//     var outletName = $('#OutletName01').val();
//     var branchDropdown = $('#branch_outlet01');
    
//     // Clear the dropdown before fetching new data
//     branchDropdown.html('<option value="">Select or add Branch</option>');
    
//     if (outletName) {
//         console.log('Fetching branches for:', outletName); // Debugging

//         // Fetch branches via AJAX
//         $.ajax({
//             url: 'get_branches.php',
//             type: 'POST',
//             data: { customer_name: outletName },
//             success: function(response) {
//     console.log('Raw branch data:', response); // For debugging
//     var branches = JSON.parse(response);
//     var uniqueBranches = [...new Set(branches)]; // Ensure uniqueness
    
//     console.log('Unique branch data:', uniqueBranches); // For debugging

//     // Append unique branches to the dropdown
//     uniqueBranches.forEach(function(branch) {
//         branchDropdown.append('<option value="' + branch + '">' + branch + '</option>');
//     });

//     // Handle no branches found case
//     if (uniqueBranches.length === 0) {
//         branchDropdown.html('<option value="">No branches available</option>');
//     }
// }

//         });
//     }
// }


</script>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between bg-gradient-primary shadow-lg rounded">
                                    <h6 class="m-0 font-weight-bold text-light">รายละเอียดร้านค้า</h6>
                                </div>
                                <div class="card-body">
                                    <form id="uploadForm" action="salevisit_insertdata_Ex1.php" method="POST" class="was-validated align-items-center" enctype="multipart/form-data">

                                        <div class="row">
                                            <!-- Initialize Bootstrap-Select -->
                                            <script>
                                            $(document).ready(function() {
                                                $('.selectpicker').selectpicker();
                                            });
                                            </script>
                                            <div class="col-md-6">
                                            <label for="OutletName01" class="form-label">Outlet</label>
                <select class="selectpicker form-control" name="OutletName" id="OutletName01" data-live-search="true" required
                    aria-label="select example" onchange="updateCustomerNo(); fetchBranches();">
                    <option value="">Nothing selected</option>
                    <?php
                    // Fetch unique OutletName and Customer_No from the database
                    $User_Name = $_SESSION["User_Name"];
                    $params = array($User_Name);
                    $sql_ex = "SELECT DISTINCT Customer_name ,Customer_No FROM Visitor_group where User_Name = ? order by Customer_name";
                    $stmt_ex = sqlsrv_query($conn, $sql_ex,$params);
                    if ($stmt_ex !== false) {
                        while ($result_ex = sqlsrv_fetch_array($stmt_ex, SQLSRV_FETCH_ASSOC)) {
                            $customer_no = htmlspecialchars($result_ex["Customer_No"]);
                            $customer_name = htmlspecialchars($result_ex["Customer_name"]);
                            echo '<option value="' . $customer_name . '" data-customer-no="' . $customer_no . '">' . $customer_name . '</option>';
                        }
                        sqlsrv_free_stmt($stmt_ex);
                    } else {
                        echo "<option value=''>ไม่พบข้อมูล</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="Customer_No" id="CustomerNoHidden">
                <script>
                function updateCustomerNo() {
                    var select = document.getElementById("OutletName01");
                    var customerNo = select.options[select.selectedIndex].getAttribute("data-customer-no");
                    document.getElementById("CustomerNoHidden").value = customerNo;
                }
                </script>
                                                <!-- <input type="hidden" name="Customer_No" id="CustomerNoHidden"  value="<?php echo htmlspecialchars($result_ex["Customer_No"]); ?>">
                                                <?php echo $customer_no; ?> -->

                                            </div>
                                            <div class="col-md-3">
                                                <label for="branch_outlet" class="form-label">branch</label>
                                                    <select id="branch_outlet01" name="branch_outlet" class="form-control" id="branch_outlet" > <option value="" required></option> </select>
                                                <div class="invalid-feedback"></div>
                                            </div>

                                            <input type="hidden" id="Status_outlet" name="Status_outlet" value="">

                                            <div class="col-md-3">
                                                <label for="Outlet_Zone" class="form-label">Zone</label>
                                                <input type="text" step="any" name="Outlet_Zone" class="form-control is-valid" id="OutletZone" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="openingandclosingtimes" class="form-label">Opening and
                                                        Closing Times</label>
                                                    <input type="text" step="any" name="openingandclosingtimes" class="form-control is-valid" id="openingandclosingtimes" value="" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="Outlet_type-01" class="form-label">Segmentation</label>
                                                    <select class="form-select" name="Outlet_type" id="Outlet_type"
                                                        required aria-label="select example">
                                                        <option value=""></option>
                                                        <option value="Agent">Agent</option>
                                                        <option value="Bar & Restaurant">Bar & Restaurant</option>
                                                        <option value="Café">Café</option>
                                                        <option value="Café & Restaurant">Café & Restaurant</option>
                                                        <option value="Craft Beer Bar">Craft Beer Bar</option>
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
                                                        class="form-control is-valid" maxlength="3" id="Seat_total"
                                                        value="" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="Spendingperhead" class="form-label">Spending per
                                                        head</label>
                                                    <input type="text" step="any" name="Spendingperhead"
                                                        class="form-control is-valid" maxlength="" id="Spendingperhead"
                                                        value="" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="Delivery" class="form-label">Delivery</label>
                                                    <input type="text" step="any" name="Delivery"
                                                        class="form-control is-valid" maxlength="" id="Delivery"
                                                        value="" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="Range01Age" class="form-label">Taget Age</label>
                                                    <select class="form-select" name="RangeAge" id="Range_Age" required
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
                                                    <select class="form-select" name="Gender" id="Gender" required
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
                                                        class="form-control is-valid" maxlength="" id="Promotion"
                                                        value="" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="Event" class="form-label">Event</label>
                                                    <input type="text" step="any" name="Event"
                                                        class="form-control is-valid" maxlength="" id="Event_outlet"
                                                        value="" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="Contact_outlet" class="form-label">Contact</label>
                                                    <input type="text" step="any" name="Contact_outlet"
                                                        class="form-control is-valid" id="Contact_outlet" value=""
                                                        required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <!-- <div class="col-md-3">
                                                    <label for="Event"
                                                        class="form-label">ประเภทสินค้าขายดีในร้าน</label>
                                                    <div class="dropdown">
                                                        <button class="btn btn-outline-primary dropdown-toggle"
                                                            type="button" id="multiSelectDropdown"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false">Select</button>
                                                        <ul class="dropdown-menu" aria-labelledby="multiSelectDropdown">
                                                            <li>
                                                                <input type="checkbox" name="checkboxes[]"
                                                                    id="inlineCheckbox1" value="Beer"> <label
                                                                    for="inlineCheckbox1"> Beer</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="checkboxes[]"
                                                                    id="inlineCheckbox2" value="Wine"> <label
                                                                    for="inlineCheckbox2"> Wine</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="checkboxes[]"
                                                                    id="inlineCheckbox3" value="Spirit"> <label
                                                                    for="inlineCheckbox3"> Spirit</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="checkboxes[]"
                                                                    id="inlineCheckbox3" value="Cocktail"> <label
                                                                    for="inlineCheckbox3"> Cocktail</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="checkboxes[]"
                                                                    id="inlineCheckbox3" value="Others"> <label
                                                                    for="inlineCheckbox3"> Others</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6">
                                                    <label for="Product_good" class="form-label">Brand</label>
                                                    <input type="text" step="any" name="Product_good"
                                                        class="form-control is-valid" maxlength="" id="PD_good1"
                                                        value="" required>
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
                                                <div class="col-md-3">
                                                    <label for="fileToUpload" class="form-label">รูป</label>
                                                    <input type="file" name="filesToUpload[]"
                                                        class="form-control is-valid" id="fileToUpload" multiple
                                                        required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Situation" class="form-label">Situation</label>
                                                    <!-- <input type="text" step="any" name="Situation" class="form-control is-valid" maxlength="" id="Situation"  value="" required> -->
                                                    <textarea class="form-control" name="Situation" id="Situation"
                                                        rows="2" required></textarea>
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
                    <a class="btn btn-primary" href="salevisit_revisit.php">OK</a>
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
            const max_width = 1280;  // ปรับความกว้างสูงสุดเป็น 640 พิกเซล
            const max_height = 720;  // ปรับความสูงสูงสุดเป็น 360 พิกเซล

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
                            }, file.type, 0.75);  // ลดคุณภาพของรูปภาพลงเป็น 0.75 (75%)
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

            fetch('salevisit_insertdata_Ex1.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                console.log('Success:', result);
                // alert('File uploaded successfully.');
                $('#saveModal').modal('show');  // แสดง modal เมื่ออัพโหลดเสร็จสิ้น
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error uploading file.');
            });
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