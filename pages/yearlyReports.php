<?php
 include("generateReports.php");
  include("../sidebar.php");
  if($_SESSION["loggedin"] != TRUE){
    header("Location: ../index.php");
  }

  if($_SESSION['role'] == "Gardener" ){
    header("Location: errorPage.php");
  }

 
  
?>
    <!-- Navbar -->
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h5 class="font-weight-bolder text-white mb-0">Yearly Reports</h6>
        </nav>
                <?php include ("navbar.php"); ?>
      </div>
    </nav>

    <div class="container-fluid py-4">
    <!-- Top 5 Harvested -->
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 ">
            
            <div class="card-header pb-0 ">
              <h6>Top 5 Harvested Seeds</h6>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Seed ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Seed Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expiry Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harvested On</th>
                    </tr>
                  </thead>
                  <tbody>

                <?php
                    if(is_array($harvestSeeds)){      
                        foreach($harvestSeeds as $harvest){
                ?>

                    <tr>

                      <td class="align-middle text-center" id="seedID">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $harvest['seedID']; ?></span>
                      </td>
                      
                      <td>
                      <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/seedImages/<?php echo $harvest['seedImage']; ?>" class="avatar avatar-sm me-3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $harvest['name']; ?></h6>
                            <p class="text-xs text-secondary mb-0" style="text-transform:capitalize;"><?php echo $harvest['category']; ?></p>
                            </div>
                      </td>

                      <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $harvest['expiry']; ?></span>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $harvest['quantity']; ?></span>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo date("F j, Y", strtotime($harvest['addedOn'])); ?></span>
                      </td>
                     
                      
                    </tr>

                    <?php
                        }}else{ ?>
                        <tr>
                            <td colspan="8">
                            <?php echo $harvestSeeds; ?>
                            </td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Top 5 Wasted -->
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 ">
            
            <div class="card-header pb-0 ">
              <h6>Top 5 Wasted Seeds</h6>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Seed ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Seed Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wasted By</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity Wasted</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harvested/Ordered</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wasted On</th>


                    </tr>
                  </thead>
                  <tbody>

                <?php
                    if(is_array($wastedSeeds)){      
                        foreach($wastedSeeds as $waste){
                ?>

                    <tr>

                      <td class="align-middle text-center" id="seedID">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $waste['sID']; ?></span>
                      </td>
                      
                      <td>
                      <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/seedImages/<?php echo $waste['wImage']; ?>" class="avatar avatar-sm me-3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $waste['wName']; ?></h6>
                            <p class="text-xs text-secondary mb-0"> <i>Expired On: <?php echo $waste['expiredOn']; ?></i></p>
                            </div>
                      </td>

                      <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo getUser($waste['wastedBy'], 'FName') ." ".getUser($waste['wastedBy'], 'LName') ?></span>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $waste['wQuantity']; ?></span>
                      </td>

                     <td class="align-middle text-center text-sm">
                            
                      <?php if($waste['type'] == "Ordered"){
                          echo'
                            <span class="badge badge-sm bg-gradient-info">Ordered</span>';
                      }else {
                        echo'
                          <span class="badge badge-sm bg-gradient-warning">Harvested</span>';
                      } ?>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo date("F j, Y", strtotime($waste['wastedOn'])); ?></span>
                      </td>
                     
                      
                    </tr>

                    <?php
                        }}else{ ?>
                        <tr>
                            <td colspan="8">
                            <?php echo $wastedSeeds; ?>
                            </td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>



 <!-- Top Performance -->
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 ">
            
            <div class="card-header pb-0 ">
              <h6>Top Performaces by Gardeners</h6>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gardener's Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Quantity Planted</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. of Vegetables Planted</th>


                    </tr>
                  </thead>
                  <tbody>

                <?php
                    if(is_array($topPerformance)){      
                        foreach($topPerformance as $index=> $gardener){
                ?>
                  <tr>

                      <td class="align-middle text-center" id="seedID">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $index+1; ?></span>
                      </td>
                      
                      <td>
                      <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/profileImages/<?php echo getUser($gardener['plantedBy'], 'profileImage'); ?>" class="avatar avatar-sm me-3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo getUser($gardener['plantedBy'], 'FName')." ". getUser($gardener['plantedBy'], 'LName'); ?></h6>
                            <p class="text-xs text-secondary mb-0"> <i>Username: <?php echo $gardener['plantedBy']; ?></i></p>
                            </div>
                      </td>

                      <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $gardener['quantity']; ?></span>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $gardener['count']; ?>
                        </span>
                      </td>

                     
                     
                      
                    </tr>
                    

                    <?php
                        }}else{ ?>


                        <tr>
                            <td colspan="8">
                            <?php echo $topPerformance; ?>
                            </td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>