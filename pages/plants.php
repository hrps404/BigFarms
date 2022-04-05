<?php
  include("fetchPlants.php");
  include("../sidebar.php");
  if($_SESSION["loggedin"] != TRUE){
    header("Location: ../index.php");
  }

  if($_SESSION['role'] == "Gardener" ){
    header("Location: /errorPage.php");
  }


  
?>
    <!-- Navbar -->
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h5 class="font-weight-bolder text-white mb-0">Plants Inventory</h6>
        </nav>
                <?php include ("navbar.php"); ?>
      </div>
    </nav>

    <div class="container-fluid py-4">

    <!-- Seeds Table -->
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 ">
            
            <div class="card-header pb-0 "style="">
              
              <h6 style="display:inline; min-width:50%;">Seeds Table</h6>
              <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3" style="text-align:right;">
                <button type="button"  class="btn bg-gradient-info btn-block" data-bs-toggle="modal" data-bs-target="#addNewPlant">
                  Add New Plant
                </button>
              </div>



              <?php if(isset($_SESSION['addMsg'])) { echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text" style="font-color:white"> '. $_SESSION['addMsg'] .' 
          </span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>' ; } 
          ?> 

            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Plant ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Plant/Seed Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity Planted</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Seed Quantity left</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Planted On</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Planted By (Username)</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

                <?php
                    if(is_array($fetchPlants)){      
                        foreach($fetchPlants as $data){
                ?>

                    <tr>

                      <td class="align-middle text-center" id="seedID">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['plantID']??''; ?></span>
                      </td>
                      
                      <td>
                      <div class="d-flex px-2 py-1">
                        <?php
                          $SID = $data['seedID'];
                            $query1 = "SELECT * FROM seedinventory where seedID= '$SID' ";
                            $result = mysqli_query($con, $query1);  
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                            ?>
                          <div>
                            <img src="../assets/img/seedImages/<?php echo $row['seedImage']; ?>" class="avatar avatar-sm me-3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $row['name']; ?></h6>
                            <p class="text-xs text-secondary mb-0" style="text-transform:capitalize;"><?php echo $row['category']??''; ?></p>
                            </div>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['qntyPlanted']; ?></span>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold "><?php echo $row['quantity']; ?></span>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo date("F j, Y, g:i a",strtotime($data['plantedDate'])); ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                          <?php
                            $plantedBy = $data['plantedBy'];
                            $query2 = "SELECT * FROM useraccounts where username = '$plantedBy' ";
                            $result = mysqli_query($con, $query2);  
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                            echo $row['FName']. " ". $row['LName']. ", ". $plantedBy;
                            ?></span>
                      </td>
                    </tr>

                    <?php
                        }}?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    


    <!-- Add New Plant Modal -->
    <div class="modal fade" id="addNewPlant" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Add New Plant</h3>
                  <p class="mb-0">Enter plant and respective gardeners' details </p>
              </div>
              <div class="card-body pb-3">
                <form role="form text-left" action ="addData.php" method="POST" name="addSeed" enctype="multipart/form-data">

                  <div class="col">
                    <label>Seed/Plant Name</label>
                        <div class="form-group">
                            <div class="btn-group dropdown " style="width:100%;">
                                <select class="form-control" name="sID" id="choices-button" placeholder="Please select a Seed" required>
                                    <option value="category" disabled selected="" placeholder="Please select a category">Please select a Seed (quantity left)- Expiry</option>
                                    <?php 
                                      $sql="SELECT * FROM seedinventory order by name"; 
                                    foreach ($con->query($sql) as $row){ ?>
                                    <option value="<?php echo $row['seedID']; ?>" > <?php echo $row['name']. " (".$row['quantity']. ") - ". date("F j, Y",strtotime($row['expiry'])); ?> </option>" 

                                    <?php } ?>
                                  </select>
                            </div>
                        </div>
                  </div>

                  <div class="col">
                    <label>Planted By</label>
                        <div class="form-group">
                            <div class="btn-group dropdown " style="width:100%;">
                                <select class="form-control" name="gName" id="choices-button" placeholder="Please select a Gardener" required>
                                    <option value="category" disabled selected="" placeholder="Please select a category">Please select a Gardener</option>
                                    <?php 
                                      $sql="SELECT * FROM useraccounts  WHERE role = 'gardener' order by FName"; 
                                    foreach ($con->query($sql) as $row){ ?>
                                    <option value="<?php echo $row['username']; ?>" > <?php echo $row['FName']. ' '. $row['LName']. " (".$row['username']. ")"; ?> </option>" 

                                    <?php } ?>
                                  </select>
                            </div>
                        </div>
                  </div>

                <div class="row">  
                  <div class="col-md-6">                      
                    <label>Planted On</label>
                    <div class="input-group mb-3">
                      <input class="form-control datepicker" name="pDate" placeholder="Please select date" type="date">
                    </div>
                  </div>
   
                  <div class="col-md-6">
                    <label>Quantity Planted</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="pQuantity" placeholder="Quantity" aria-label="quantity">
                    </div>
                  </div>
                </div>
                  
                  <div class="text-center">
                    <input class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0" type="submit" name = "addPlant" value="Add Plant">
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php unset($_SESSION['addMsg']); ?>


  </main>

  
  <script src="../assets/js/seedScript.js"></script>
  <script src="../assets/js/seedUpdate.js"></script>

</body>

</html>