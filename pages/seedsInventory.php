<?php
 include("fetchSeeds.php");
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
          <h5 class="font-weight-bolder text-white mb-0">Seeds Inventory</h6>
        </nav>
                <?php include ("navbar.php"); ?>
      </div>
    </nav>

    <div class="container-fluid py-4">

    <!-- Seeds Table -->
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 ">
            
            <div class="card-header pb-0 ">
              
              <h6 style="display:inline; min-width:50%;">Seeds Table</h6>
              <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3" style="text-align:right;">
                <button type="button"  class="btn bg-gradient-info btn-block" data-bs-toggle="modal" data-bs-target="#addNewSeed">
                  Add New Seed
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Seed ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Seed Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expiry Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harvested/Ordered</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

                <?php
                    if(is_array($fetchSeeds)){      
                        foreach($fetchSeeds as $data){
                ?>

                    <tr>

                      <td class="align-middle text-center" id="seedID">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['seedID']??''; ?></span>
                      </td>
                      
                      <td>
                      <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/seedImages/<?php echo $data['seedImage']; ?>" class="avatar avatar-sm me-3" alt="seed" id="SDimage<?php echo $data['seedID'];?>">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm" id="sdName<?php echo $data['seedID'];?>"><?php echo $data['name']; ?></h6>
                            <p class="text-xs text-secondary mb-0" id="sdCategory<?php echo $data['seedID'];?>" style="text-transform:capitalize;"><?php echo $data['category']??''; ?></p>
                            </div>
                      </td>

                      <td class="align-middle text-center">

                        <?php 
                        if(checkExpiry($data['expiry'])){ ?>
                        <span class="text-secondary text-xs font-weight-bold text-danger"  id="sdExpiry<?php echo $data['seedID'];?>" ><?php echo $data['expiry']; ?></span>

                        <?php }else{ ?>
                          <span class="text-secondary text-xs font-weight-bold"  id="sdExpiry<?php echo $data['seedID'];?>" ><?php echo $data['expiry']; }?></span>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold " id="sdQuantity<?php echo $data['seedID'];?>"><?php echo $data['quantity']??''; ?></span>
                      </td>
                     
                      <td class="align-middle text-center text-sm">
                            
                      <?php if($data['seedWay'] == "Ordered"){
                          echo'
                            <span class="badge badge-sm bg-gradient-info">Ordered</span>';
                      }else {
                        echo'
                        <span class="badge badge-sm bg-gradient-warning">Harvested</span>';
                      } ?>
                      </td>

                      <td class="align-middle">
                        <button id="updateButton" value="<?php echo $data['seedID']; ?>" type="button" class=" mb-2 text-secondary font-weight-bold text-xs" style="background-color:transparent; border:none;" data-bs-toggle="modal" data-bs-target="#updateSeed">Edit</button>
                     </td>
                    </tr>

                    <?php
                        }}else{ ?>
                        <tr>
                            <td colspan="8">
                            <?php echo $fetchSeeds; ?>
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
    </div>

    


    <!-- Add New Seed Modal -->
    <div class="modal fade" id="addNewSeed" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Add New Seed</h3>
                  <p class="mb-0">Enter a seed unique from the table seeds</p>
              </div>
              <div class="card-body pb-3">
                <form role="form text-left" action ="addData.php" method="POST" name="addSeed" enctype="multipart/form-data">

                <!-- Profile Picture Column -->
                <div class="col text-center" style="width:100%; vertical-align:bottom;">
                  <image src = "/assets/img/seedImages/placeholder.png" onclick="triggerClick()" id="seedDisplay" style=" display: block; width: 15%; margin: 10px auto; border-radius: 50%; object-fit: contain;"/>
                  <label for="seedImage">Seed Image</label>
                  <input type="file" name="seedImage" onchange="displayImage(this)" id="seedImage" style = "display:none;">
                </div>

                  <label>Seed Name</label>
                  <div class="input-group mb-3">
                    <input type="text" name="sName" class="form-control" placeholder="Seed Name" aria-label="Name">
                  </div>

                  <div class="col">
                    <label>Category</label>
                        <div class="form-group">
                            <div class="btn-group dropdown " style="width:100%;">
                                <select class="form-control" name="sCategory" id="choices-button" placeholder="Please select a category" required>
                                    <option value="category" disabled selected="" placeholder="Please select a category">Please select a Category</option>
                                    <option value="Vegetable">Vegetable</option>
                                    <option value="Fruit">Fruit</option>
                                </select>
                            </div>
                        </div>
                  </div>

                <div class="row">  
                  <div class="col-md-6">                      
                    <label>Expiry Date</label>
                    <div class="input-group mb-3">
                      <input class="form-control datepicker" name="expiry" placeholder="Please select date" type="date">
                    </div>
                  </div>
   
                  <div class="col-md-6">
                    <label>Quantity</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="quantity" placeholder="Quantity" aria-label="quantity">
                    </div>
                  </div>
                </div>



                  <div class="panel-body">
                    <div class="form-group">
                        <div class="col col-sm-offset-3">
                        <label for="option" class="control-label">Is it harvested or ordered?</label>
                          <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" name="seedWay" value="Harvested" id="customRadio1"/>
                            <label class="custom-control-label" for="customRadio1">Harvested</label>
                          </div>

                          <div class="form-check">
                            <input type="radio" class="form-check-input" name="seedWay" value="Ordered" id="customRadio2"/>
                            <label class="custom-control-label" for="customRadio2">Ordered</label>
                          </div>
                        </div>
                    </div>
                </div>
                  
                  <div class="text-center">
                    <input class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0" type="submit" name = "addSeed" value="Add Seed">
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>


    

    <!------ Update Seeds Modal ------>
    <div class="modal fade" id="updateSeed" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Update Seed</h3>
              </div>
              <div class="card-body pb-3">
                <form role="form text-left" action ="updateSeed.php" method="POST" name="updateSeed" enctype="multipart/form-data">

                <!-- Profile Picture Column -->
                <div class="col text-center" style="width:100%; vertical-align:bottom;">
                  <image  src = "" onclick="seedClick()" id="sdDisplay" style=" display: block; width: 15%; margin: 10px auto; border-radius: 50%; object-fit: contain;"/>
                  <input type="file" name="sdImage" onchange="displaySeed(this)" id="sdImage" style = "display:none;">
                </div>

                <div class="input-group" style="display: inline-block; vertical-align: baseline;">
                  <label  style="font-size:12px" >Seed ID: </label>
                  <input class="font-weight-bold" type="text" id="SID" name="seedID" style="border:0px; font-size:12px" value="" aria-label="ID" readonly>
                </div>

                  <label>Seed Name</label>
                  <div class="input-group mb-3">
                    <input type="text" id="SName" name="sName" class="form-control" value="" aria-label="Name">
                  </div>

                  <div class="col">
                    <label>Category</label>
                        <div class="form-group">
                            <div class="btn-group dropdown " style="width:100%;">
                                <select class="form-control" id="Scategory" name="sCategory"  placeholder="Please select a category" required>
                                    <option value="category" disabled >Please select a Category</option>
                                    <option value="Vegetable">Vegetable</option>
                                    <option value="Fruit">Fruit</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">  
                  <div class="col-md-6">                      
                    <label>Expiry Date</label>
                    <div class="input-group mb-3">
                  <input class="form-control datepicker" id="Sexpiry" name="expiry" placeholder="Please select date" type="date">
                    </div>
                  </div>
   
                  <div class="col-md-6">
                    <label>Quantity</label>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" id="Squantity" name="quantity" placeholder="Quantity" aria-label="quantity">
                    </div>
                  </div>

                  <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" hidden>
                </div>
                  
                  <div class="text-center">
                    <input class="btn bg-gradient-info btn-lg btn-rounded w-100 mt-4 mb-0" type="submit" name = "updateSeed" value="Update Seed">
                    <input class="btn bg-gradient-danger btn-lg btn-rounded w-100 mt-4 mb-0" type="submit" name = "deleteSeed" value="Delete Seed">

                    <input name="markWasted" type="submit" class="btn bg-gradient-warning btn-lg btn-rounded w-100 mt-4 mb-0" value= "Mark as Wasted">


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
    <!-- Update Modal Script -->
    <script type="text/javascript">
        $(document).ready(function(){
	        $(document).on('click', "#updateButton", function(){
          
            var seedID = $(this).val();
            
            var sName = $('#sdName'+seedID).text();
            var sCategory = $('#sdCategory'+seedID).text();
            //var sName = $(this).closest("tr").find('td:nth-child(2)').text().trim();
            var quantity = $('#sdQuantity'+seedID).text();
            //var expiry = $(this).closest("tr").find('td:nth-child(3)').text().trim();
            var expiry = $('#sdExpiry'+seedID).text();
            //var quantity = $(this).closest("tr").find('td:nth-child(4)').text().trim();

            var picturesrc = document.getElementById("SDimage"+seedID).src; 

            document.getElementById("SID").value = seedID;
            document.getElementById("SName").value = sName;
            document.getElementById("Scategory").value = sCategory;
            document.getElementById("Sexpiry").value = expiry;
            document.getElementById("Squantity").value = quantity;
            document.getElementById("sdDisplay").src = picturesrc;


          });
        });
    </script>

  <script src="../assets/js/seedScript.js"></script>
  <script src="../assets/js/seedUpdate.js"></script>


</body>

</html>