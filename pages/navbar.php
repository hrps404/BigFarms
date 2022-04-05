<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <form action="searchResult.php" method="GET">
                <input type="search" class="form-control" placeholder="Search Seed..." name="query" />
              </form>
            </div>
          </div>

          <ul class="navbar-nav  justify-content-end">  
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="profile.php" class="nav-link text-white font-weight-bold px-0">
                <i class="fas fa-solid fa-user"></i> 
                <span class="d-sm-inline d-none">Profile</span>
              </a>
            </li>
            
            
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <?php
                  if(is_array($fetchUnreadMsg)){      
                  foreach($fetchUnreadMsg as $msg){
                ?>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="Messages.php">
                    <div class="d-flex py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from 
                          <?php if($msg['sentFrom'] == "System")
                                    echo " System";
                                    else{ 
                                      echo getUser($msg['sentFrom'], 'FName') ." ".getUser($msg['sentFrom'], 'LName'); }?>
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          <?php echo date("F j, Y, g:i a",strtotime($msg['sentDate'])); ?>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <?php }}?>
              </ul>
            </li>
          </ul>
</div>