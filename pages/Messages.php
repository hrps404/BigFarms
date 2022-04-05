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
          <h5 class="font-weight-bolder text-white mb-0">Messages</h6>
        </nav>
        <?php include ("navbar.php"); ?>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-6" >   
      <div class="row" >
        <div class="col-md-6" style="margin: auto; width: 50%;">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h5 class="mb-0">Messages</h5>
              </div>
            </div>
            <div class="card-body">              
                <div class="row">
                  <div class="col">
                    
                    <ul class="list-group">
                      <?php
                      if(is_array($fetchMsg)){      
                          foreach($fetchMsg as $msg){
                      ?>

                      <hr class="horizontal dark">

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

                  </div>                  
                </div>
            </div>
          </div>
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
                <button type="submit" class="btn bg-gradient-primary" name="markRead">Mark as Read</button>
              </form>
              <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


    </div>
</main>
</body>
</html>






