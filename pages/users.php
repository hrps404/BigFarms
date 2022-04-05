<?php
 include("fetchData.php");
  include('../sidebar.php');
  
  if($_SESSION["loggedin"] != TRUE){
    header("Location: ../index.php");
  }

  if($_SESSION['role'] != "Admin"){
    header("Location: errorPage.php");
  }

 

?>

  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h5 class="font-weight-bolder text-white mb-0">Users</h6>
        </nav>
                <?php include ("navbar.php"); ?>
      </div>
    </nav>
    <!-- End Navbar -->

<!------ USER'S Table ------>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username/Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone No.</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

                <?php
                    if(is_array($fetchData)){      
                        foreach($fetchData as $data){
                ?>

                    <tr>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['UID']??''; ?></span>
                      </td>
                      
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/profileImages/<?php echo $data['profileImage']; ?>" class="avatar avatar-sm me-3" alt="user6">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $data['FName'].' '.$data['LName']??''; ?></h6>
                            <p class="text-xs text-secondary mb-0" style="text-transform:capitalize;"><?php echo $data['role']??''; ?></p>
                          </div>
                        </div>
                      </td>

                      <td>
                        <p class=" text-xs font-weight-bold mb-0"><?php echo $data['username']??''; ?></p>
                        <p class="align-middle  text-xs text-secondary mb-0"><?php echo $data['Email']??''; ?></p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['PhoneNo']??''; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['Address']??''; ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">

                      <?php if($data['isOnline']){
                          echo'
                            <span class="badge badge-sm bg-gradient-success">Online</span>';
                      }else {
                        echo'
                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>';
                      } ?>

                      </td>
                      <td class="align-middle">
                        <div class="col-md-4">
                            <a href="editUser.php?id=<?php echo $data['UID']; ?>" type="button" class=" mb-2 text-secondary font-weight-bold text-xs" style="background-color:transparent; border:none;">Edit</a>
                        </div>
                    </td>
                    </tr>

                    <?php
                        }}else{ ?>
                        <tr>
                            <td colspan="8">
                            <?php echo $fetchData; ?>
                            </td>
                        <tr>
                        <?php
                        }?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      

      <!-------- ADD USERS FORM --------->

      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
              <h6>Add Users</h6>
                </div>
              </div>
           
            <div class="card-body">

            <?php if(isset($_SESSION['addMsg'])) { echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text"> '. $_SESSION['addMsg'] .' 
          </span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>' ; } 
          ?> 
              
            <form action ="addData.php" method="POST" name="updateForm" enctype="multipart/form-data">  
              <p class="text-uppercase text-sm">User Information</p>

            <div style="">
              <div class="col" style="display: inline-block; width:70%;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="example-text-input" class="form-control-label">First name</label>
                        <input class="form-control" name= "fName" type="text" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Last name</label>
                        <input class="form-control" name= "lName" type="text" placeholder="Last Name">
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text" id="username">@</span>
                            <input type="text" class="form-control"placeholder="Username" name="username" aria-label="Username" aria-describedby="username" required>
                        </div>
                    </div>
                </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email" name="email" aria-label="Email" aria-describedby="email" required>
                            <span class="input-group-text" id="basic-addon2">@bigfarm.com</span>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="Password"><i class="ni ni-lock-circle-open"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="btn-group dropdown " style="width:100%;">
                                <select class="form-control" name="role" id="choices-button" placeholder="Role" required>
                                    <option value="Role" disabled selected="">Role</option>
                                    <option value="employee">Employee</option>
                                    <option value="gardener">Gardener</option>
                                </select>
                            </div>
                        </div>
                    </div>
                  
                </div>

              </div>

              <!-- Profile Picture Column -->
              <div class="col text-center" style="display: inline-block; width:29%; vertical-align:bottom;">
                <image src = "/assets/img/profileImages/profilePlaceholder.png" onclick="triggerClick()" id="profileDisplay" style=" display: block; width: 50%; margin: 10px auto; border-radius: 50%; object-fit: contain;"/>
                <label for="profileImage">Profile Picture</label>
                <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style = "display:none;">
              </div>

            </div>
                
                
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Contact Information</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Address</label>
                      <input class="form-control" name= "address" type="text" placeholder="Address" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Phone Number</label>
                      <input class="form-control" name= "phoneNo" type="text" placeholder="Phone No." required >
                    </div>
                  </div>
                </div>
                
              </div>

              <div class="card-header pb-0">
              <div class="d-flex align-items-right">
                <input class="btn btn-primary btn-sm ms-auto" type="submit" name = "addUser" value="Add User">
              </div>
              </div>
            </form>
            </div>
        </div>

        <?php unset($_SESSION['addMsg']); ?>

</main>
</body>
</html>


