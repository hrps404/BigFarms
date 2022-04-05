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
          <h5 class="font-weight-bolder text-white mb-0">Search Results</h6>
        </nav>
        <?php include ("navbar.php"); ?>
      </div>
    </nav>
    <!-- End Navbar -->



    <div class="container-fluid py-6" >  
    <?php
      $query = $_GET['query']; 
        
        $sql = "SELECT * FROM seedinventory
          WHERE name LIKE '%$query%' OR expiry LIKE '%$query%' OR category LIKE '%$query%' OR plantTime LIKE '%$query%' OR seedWay LIKE '%$query%'";  

          $result = mysqli_query($con, $sql);  
          $count = mysqli_num_rows($result);          
        if($count > 0){

          echo "<h5 class='text-white mb-0 display-10'> Search Results for '". $query. "'</h5> <br>";
          
          while($results = mysqli_fetch_assoc($result)){ ?>
             <div class="row">
              <div class="col-12">
                <div class="card mb-4 ">

              <div class="card-body">              
                <div class="row">
                  <div class="col-4" style="display:table-cell; vertical-align:middle; text-align:center;">
                <img src="../assets/img/seedImages/<?php echo $results['seedImage']; ?>" class="avatar" alt="seed" id="SDimage" style='height: 100px; width: 100px; '>
              </div>

              <div class="col-8">
                <h5 class="mb-0"><?php echo $results['name']; ?></h5>
                <h6 class="mb-0 text-sm">Category: <?php echo $results['category']; ?> </h6>
                <h6 class="mb-0 text-sm">Quantity: <?php echo $results['quantity']; ?> </h6> 
                <h6 class="mb-0 text-sm">Harvested/ Ordered?: <?php echo $results['seedWay']; ?> </h6> 
                <h6 class="mb-0 text-sm">Expire Date: <?php echo $results['expiry']; ?> </h6> 
                <h6 class="mb-0 text-sm">Planting Month: <?php echo $results['plantTime']; ?> </h6> 
              </div>
            </div>
          </div>

                </div>
              </div>
            </div>
      <?php }
    }
    else{ // if there is no matching rows do following
          echo "<h5 class='text-white mb-0 display-10'> No results found for '". $query. "'</h5> <br>";
    }
    

?>

 
      
    </div>
</main>
</body>
</html>