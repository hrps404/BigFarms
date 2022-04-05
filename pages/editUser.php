<?php   

    include('../connection.php');  
    include('../sidebar.php');

  if($_SESSION["loggedin"] != TRUE){
    header("Location: ../index.php");
  }
  if($_SESSION['role'] != "Admin"){
    header("Location: errorPage.php");
  }

  $UID = $_GET['id'];

  $query1 = "SELECT * FROM useraccounts WHERE UID = '$UID'";  

  $result = mysqli_query($con, $query1);  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  $count = mysqli_num_rows($result);          
  
  
?>
  

  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h5 class="font-weight-bolder text-white mb-0">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
           
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
                        
                        
<div class="container-fluid py-4">                                       
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                    <h6>Edit User</h6>
                    </div>
                </div>

                <?php if(isset($_SESSION['message'])) { echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"> '. $_SESSION['message'] .' 
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>' ; } 
                ?> 

              
           
                <div class="card-body">
                    <form action ="updateUser.php" method="POST" name="editUser" enctype="multipart/form-data">  
              
                    <div class="row align-middle" style="text-align:center">
                      <image src = "/assets/img/profileImages/<?php echo $row['profileImage']; ?>" onclick="triggerClick()" id="profileDisplay" style=" display: block; width: 15%; margin: 10px auto; border-radius: 50%; object-fit: cover;"/>
                      <label for="profileImage"><?php echo $row['FName']. " ". $row['LName']; ?></label>
                      <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style = "display:none;">
                    </div>

                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Username</label>
                                            <input class="form-control" name="username" type="text" value= "<?php echo $row['username']; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email address</label>
                                            <input class="form-control" name ="email" type="email" value="<?php echo $row['Email']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">First name</label>
                                            <input class="form-control" name= "fname" type="text" value="<?php echo $row['FName']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Last name</label>
                                            <input class="form-control" name= "lname" type="text" value="<?php echo $row['LName']; ?>">
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Password</label>
                                            <input class="form-control" name= "password" type="password" value= "<?php echo $row['password']; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Role</label><br>
                                                <div class="btn-group dropdown " style="width:100%;">
                                                        <select class="form-control" name="role" id="choices-button" placeholder="Role" required>
                                                            <option value="Role" disabled selected="" style="text-transform:capitalize;"><?php echo $row["role"];?></option>
                                                            <option value="employee">Employee</option>
                                                            <option value="gardener">Gardener</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">Contact Information</p>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Address</label>
                                            <input class="form-control" name= "address" type="text" value= "<?php echo $row['Address'];?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Phone Number</label>
                                            <input class="form-control" name= "phoneNo" type="text" value="<?php echo $row['PhoneNo']; ?>" >
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-6 align-items-left" style="text-align:left">
                                                    <div class=" align-items-left">
                                                        <input class="btn btn-danger btn-gradient btn-sm ms-auto" type="submit" name = "deleteUser" value="Delete User">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-right">
                                                        <input class="btn btn-info btn-gradient btn-sm ms-auto " type="submit" name = "editUser" value="Save Changes">
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php unset($_SESSION['message']); ?>
</main>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../assets/js/profilescript.js"></script>

  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.0"></script>

</body>
</html>


