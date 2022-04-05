<?php include("fetchMsg.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
    BigFarms
  </title>
  <!--     Fonts and icons     -->
  <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <!-- Import jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"crossorigin="anonymous">
    </script>
      
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity= "sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="/assets/js/plugins/flatpickr.min.js"></script>
  <!-- Font Awesome Icons -->
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/fb7292a235.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />


  <!-- Main Quill library -->
  <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

  <!-- Theme included stylesheets -->
  <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

  <!-- Core build with no theme, formatting, non-essential modules -->
  <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
  <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
</head>


<body class="g-sidenav-show bg-gray-100">

  <!------ Contact Admin Modal ------>
    <div class="modal fade" id="contactAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Contact Admin</h3>
                  <p class="mb-0">Please enter your message... </p>

              </div>
              <div class="card-body pb-3">
                <form role="form text-left" action ="fetchMsg.php" method="POST" name="sendMsg">

                      <input type="text" name="sendTo" value="Admin" class="form-control" placeholder="Title" aria-label="Title" hidden>
                      <label>Message Title</label>
                      <div class="input-group mb-3">
                        <input type="text" name="msgTitle" class="form-control" placeholder="Title" aria-label="Title">
                      </div>

                      <label>Message</label>
                      <div class="input-group mb-3">
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                      </div>
                        <div class="d-flex align-items-right">
                          <button name="sendMsg" class="btn btn-icon btn-3 btn-secondary ms-auto" type="submit" >
                            <span class="btn-inner--text">Send Message</span>
                            <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                          </button>
                        </div>
                      
                    </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>


  <div class="position-fixed w-100 min-height-300 top-0" style="background-image: url('../assets/img/bg-image.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;">
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
          <a class="nav-link " href="/pages/AdminDashboard.php">
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
          <a class="nav-link " href="/pages/seedsInventory.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-solid fa-seedling text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Seeds Inventory</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages/plants.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-solid fa-leaf text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Plants</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pages/Messages.php">
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
          <a class="nav-link" href="/pages/profile.php">
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
          <a class="nav-link " href="/pages/EmployeeDashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link " href="/pages/seedsInventory.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-solid fa-seedling text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Seeds Inventory</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages/plants.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-solid fa-leaf text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Plants</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/pages/Messages.php">
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
          <a class="nav-link" href="/pages/profile.php">
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
    <center>
       <button type="button"  class="btn btn-primary btn-sm mb-0 w-80" data-bs-toggle="modal" data-bs-target="#contactAdmin">Contact Administrator</button>
    </center>


    <!-- Gardener Sidebar -->

    <?php
        }elseif($_SESSION['role'] == "Gardener"){ ?>

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="/pages/GardenerDashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
    

        <li class="nav-item">
          <a class="nav-link " href="/pages/Messages.php">
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
          <a class="nav-link" href="/pages/profile.php">
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
    <center>
      <button type="button"  class="btn btn-primary btn-sm mb-0 w-80" data-bs-toggle="modal" data-bs-target="#contactAdmin">Contact Administrator</button>
    </center>

    <?php } ?>

    
  </aside>

    <!-- Navbar -->


    