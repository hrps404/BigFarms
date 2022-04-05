<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
    BigFarm
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/fb7292a235.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />
</head>


<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" target="_blank" style="text-align:center">
        <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold" style="font-size: medium;">Big Farm</span>
      </a>
    </div>

    <hr class="horizontal dark mt-0">
    <?php
    if($_SESSION['role'] == "Admin"){ ?>

    <!-- Admin Sidebar -->
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="/dashboard.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pages/users.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
              <i class="fas fa-solid fa-users text-sm opacity-10" style="color:black"></i>            
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pages/seedsInventory.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-solid fa-seedling text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Seeds Inventory</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-email-83 text-sm opacity-10 text-danger"></i>            
            </div>
            <span class="nav-link-text ms-1">Emails/ Alerts</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pages/YearlyReports.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Yearly Reports</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/pages/profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-lock-circle-open text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">LogOut</span>
          </a>
        </li>
      </ul>
      
    </div>

    <?php
        }elseif($_SESSION['role'] == "Employee"){ ?>

    <!-- Employee Sidebar -->
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="/dashboard.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link " href="/pages/seedsInventory.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-solid fa-seedling text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Seeds Inventory</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-email-83 text-sm opacity-10 text-danger"></i>            
            </div>
            <span class="nav-link-text ms-1">Emails/ Alerts</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pages/YearlyReports.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Yearly Reports</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/pages/profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-lock-circle-open text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">LogOut</span>
          </a>
        </li>
      </ul>
      
    </div>


    <!-- Gardener Sidebar -->

    <?php
        }elseif($_SESSION['role'] == "Gardener"){ ?>

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="/dashboard.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link " href="/pages/seedsInventory.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-solid fa-seedling text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Seeds Inventory</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-email-83 text-sm opacity-10 text-danger"></i>            
            </div>
            <span class="nav-link-text ms-1">Emails/ Alerts</span>
          </a>
        </li>
       
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/pages/profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-lock-circle-open text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">LogOut</span>
          </a>
        </li>
      </ul>
      
    </div>

    <?php } ?>

    <center>
      <a class="btn btn-primary btn-sm mb-0 w-80" style="margin-bottom: 0%; position: relative;" href="/pages/contact.php" type="button">Contact Administrator</a>
    </center>
  </aside>


    <!-- Navbar -->