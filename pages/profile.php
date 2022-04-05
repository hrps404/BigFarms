<?php
  include('../sidebar.php');


  if($_SESSION["loggedin"] != TRUE){
    header("Location: ../index.php");
  }

?>


  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h5 class="font-weight-bolder text-white mb-0">Profile</h6>
        </nav>
                <?php include ("navbar.php"); ?>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-2">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative" style="height: 10px;">
            <form action ="updateUser.php" method="POST" name="updateForm" enctype="multipart/form-data">  

              <img src="../assets/img/profileImages/<?php echo $_SESSION['profileImage']; ?>" onclick="triggerClick()" id="profileDisplay" class="w-100  border-radius-lg shadow-sm">
              <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style = "display:none;">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo $_SESSION['fName']." ".$_SESSION['lName']; ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                <?php echo $_SESSION['role']; ?>
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="container-fluid py-4">   
      <div class="row">
        <div class="col-md-8">

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

          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">

                <p class="mb-0">Edit Profile</p>
              </div>
            </div>
            <div class="card-body">
              
                <p class="text-uppercase text-sm">User Information</p>

              
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Username</label>
                      <input class="form-control" name="username" readonly type="text" value= "<?php echo $_SESSION['username']; ?>" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Email address</label>
                      <input class="form-control" name ="email" readonly type="email" value="<?php echo $_SESSION['email']; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">First name</label>
                      <input class="form-control" name= "fname" type="text" value="<?php echo $_SESSION['fName']; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Last name</label>
                      <input class="form-control" name= "lname" type="text" value="<?php echo $_SESSION['lName']; ?>">
                    </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Contact Information</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Address</label>
                      <input class="form-control" name= "address" type="text" value= "<?php echo $_SESSION["address"];?>" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Phone Number</label>
                      <input class="form-control" name= "phoneNo" type="text" value="<?php echo $_SESSION['phoneNo']; ?>" >
                    </div>
                  </div>
                </div>
                
              </div>

              <div class="card-header pb-0">
              <div class="d-flex align-items-right">
                <input class="btn btn-primary btn-sm ms-auto" type="submit" name = "updateProfile" value="Save Changes">
              </div>
              </div>
              </form>
            </div>
          </div>



        <div class="col-md-4">

          <div class="card card-profile">
           
            <div class="card card-plain">
                  <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Change Password</h4>
                  </div>

                  <div class="card-body">
                    <?php if(isset($_SESSION['message2'])) { echo '
                      <div class="alert alert-warning" role="alert">'. $_SESSION['message2'] . '</div>';
                    } 
                    ?> 

                    <form role="form" action ="updatePassword.php" method="POST" name="updatePassword">
                      <div class="mb-3">
                        <input type="password" class="form-control form-control-lg" placeholder="Current Password" aria-label="Current Password" name="crntPassword">
                      </div>
                      <div class="mb-3">
                        <input type="password" class="form-control form-control-lg" placeholder="New Password" aria-label="New Password" name = "newPassword">
                      </div>
                      
                      <div class="text-center">
                        <input type="submit" name="updatePassword" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" value="Update" >
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                      Having Troble?
                      <a href="/contactAdmin.php" class="text-primary text-gradient font-weight-bold">Contact Admin</a>
                    </p>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </main>
</body>

</html>