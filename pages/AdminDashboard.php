<?php
    
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
          <h5 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
          <?php include ("navbar.php"); ?>

      </div>
    </nav>
    <!-- End Navbar -->





    <div class="container-fluid py-4">
      <h5 class="text-white mb-0 display-10">Welcome <?php echo $_SESSION['fName']. " ". $_SESSION['lName']; ?>, </h5> <br>

      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Active Users</p>
                    <h5 class="font-weight-bolder">
                      <?php
                        $count = "SELECT * FROM useraccounts WHERE isOnline = '1'";
                        $result = mysqli_query($con, $count);  
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                        $count = mysqli_num_rows($result);    
                        echo $count;                          
                       ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Newest Seed Planted</p>
                    <h5 class="font-weight-bolder">
                      <?php
                        $query = "SELECT * FROM plants WHERE plantID=(SELECT max(plantID) FROM plants)";
                        $result = mysqli_query($con, $query);  
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                        $sID = $row['seedID'];

                        $query2 = "SELECT * FROM seedinventory WHERE seedID = '$sID'";
                        $result2 = mysqli_query($con, $query2);  
                        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);  

                        echo $row2['name'];
                      ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="fas fa-solid fa-seedling opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Seeds Types</p>
                    <h5 class="font-weight-bolder">
                      <?php
                        $count = "SELECT count(DISTINCT name) AS total FROM seedinventory ";
                        $result = mysqli_query($con, $count); 
                        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);  
 
                        echo $data['total'];                     
                       ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="fas fa-solid fa-spa opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                    <h5 class="font-weight-bolder">
                      $103,430
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4 ">
          <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h5 class="mb-0">Unread Messages</h5>
              </div>
            </div>
              <hr class="horizontal dark">

            <div class="card-body" style="padding-top: 0px;">              
                <div class="row">
                  <div class="col">

                    <ul class="list-group">
                      <?php
                      if(is_array($fetchUnreadMsg)){      
                          foreach($fetchUnreadMsg as $msg){
                      ?>


                      <li class="list-group-item border-0 d-flex align-items-center px-0">
                        <div class="d-flex align-items-start flex-column justify-content-center">

                          <?php if($msg['status'] == 'unread') { ?>
                            <h6 class="mb-0 text-sm " id= "title<?php echo $msg['MID'];?>">
                          <?php }else { ?>
                            <h6 class="mb-0 text-sm font-weight-normal" id= "title<?php echo $msg['MID'];?>">
                              <?php }echo $msg['msgTitle']; ?></h6>

                          <div style="display: flex; justify-content: space-between;">
                            <p class="mb-0 text-xs" id="date<?php echo $msg['MID'];?>" >
                                <?php echo date("F j, Y, g:i a",strtotime($msg['sentDate'])); ?></p>

                                <p class="mb-0 text-xs"> | </p>
                                <p class="mb-0 text-xs i" id="user<?php echo $msg['MID'];?>" >
                                   <?php if($msg['sentFrom'] == "System")
                                    echo " System";
                                    else{ 
                                      echo getUser($msg['sentFrom'], 'FName') ." ".getUser($msg['sentFrom'], 'LName'). " (". getUser($msg['sentFrom'], 'role').")"; }?> </p>
                          </div>
                              <p class="mb-0 text-xs" hidden id="msg<?php echo $msg['MID'];?>">
                                <?php echo $msg['message']; ?></p>
                        </div>


                        <button id="readButton" value="<?php echo $msg['MID']; ?>" type="button" class=" btn btn-link pe-0 ps-0 mb-0 ms-auto" style="background-color:transparent; border:none;" data-bs-toggle="modal" data-bs-target="#msgModal">Read</button>
                      </li>

                    <?php }}?>

                    </ul>
                    <div class="d-flex align-items-right">
                      <a href="/pages/Messages.php" class="ms-auto text-secondary font-weight-bold text-xs"> Show More </a>
                    </div>

                  </div>                  
                </div>
            </div>
          </div>
      </div>


      <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h5 class="mb-0">Send Messages</h5>
              </div>
                  <hr class="horizontal dark">
 
            </div>
            <div class="card-body" style="padding-top:0px">              
                <div class="row">
                  <div class="col">
                    
                   <form role="form text-left" action ="fetchMsg.php" method="POST" name="sendMsg">

                      <label>Send To:</label>
                        <div class="form-group">
                            <div class="btn-group dropdown " style="width:100%;">
                                <select class="form-control" name="sendTo" id="choices-button" placeholder="Please select a category" required>
                                    <option value="Role" disabled selected="" placeholder="Please select a Role">Please select a Role</option>
                                    <option value="Employee">Employees</option>
                                    <option value="Gardener">Gardeners</option>
                                </select>
                            </div>
                        </div>

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




      <div class="col-lg-6">
          
      </div>


    </div>


<!------ Read Msg Modal ------>
      <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            <div class="modal-header" style="display:inline-block;">
                <form action ="fetchMsg.php" method="POST" name="markRead">

              <div style="display: flex; justify-content: space-between;">
                <h6 class="modal-title" id="msgTitle"></h6>

                <input type="text" id="mID" name="mID" class="form-control" placeholder="" aria-label="Name" hidden>
                <button type="submit" class="btn btn-link pe-0 ps-0 mb-0 ms-auto" name="dltMsg" style="background-color:transparent; border:none;">           
                  <span aria-hidden="true"><i class="fas fa-solid fa-trash " style="color:#f5365c"></i></span>
                </button>
              </div>

              <div style="display: flex; justify-content: space-between;">
                <em><p class="mb-0 text-xs i" id="msgUser" ></p></em>
                <p class="mb-0 text-xs " id="msgDate" ></p>
              </div>
            </div>

            <div class="modal-body">
              <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-primary" name="markReadDashboard">Mark as Read</button>
              </form>
              <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <!-- Read Message -->
    <script type="text/javascript">
        $(document).ready(function(){
          $(document).on('click', "#msgModal", function(){
          
            var seedID = $(this).val();
            
            var msgTitle = $('#sdName'+seedID).text();
            var msg = $('#sdCategory'+seedID).text();
            var quantity = $('#sdQuantity'+seedID).text();
            var expiry = $('#sdExpiry'+seedID).text();

            document.getElementById("SID").value = seedID;
            document.getElementById("SName").value = sName;
            document.getElementById("Scategory").value = sCategory;

          });
        });
    </script>
</body>


</html>