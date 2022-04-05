<?php   
    include('../connection.php');  

    $db= $con;
    $crntYear = date("Y");

    $harvestSeeds = fetch_harvests($db);
    
    function fetch_harvests($db){

        $query = "SELECT * FROM seedinventory WHERE seedWay = 'Harvested' ORDER BY quantity DESC LIMIT 5";
        $result = $db->query($query);
                if($result== true){ 
                    if ($result->num_rows > 0) {
                        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                        $data= $row;
                    } else
                        $data= "No Data Found"; 
                        
                }else
                    $data= mysqli_error($db);       

        return $data;
    }


    $wastedSeeds = fetch_wasted($db);
    
    function fetch_wasted($db){

        $query = "SELECT * FROM wastedseeds ORDER BY wQuantity DESC LIMIT 5";
        $result = $db->query($query);
                if($result== true){ 
                    if ($result->num_rows > 0) {
                        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                        $data= $row;
                    } else
                        $data= "No Data Found"; 
                        
                }else
                    $data= mysqli_error($db);       

        return $data;
    }


    $topPerformance = fetch_performance($db);
    
    function fetch_performance($db){

        $query = "SELECT *, SUM(qntyPlanted) AS quantity, COUNT(seedID) AS count FROM plants GROUP BY plantedBy ORDER BY quantity DESC";
        $result = $db->query($query);
                if($result== true){ 
                    if ($result->num_rows > 0) {
                        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                        $data= $row;
                    } else
                        $data= "No Data Found"; 
                        
                }else
                    $data= mysqli_error($db);       

        return $data;
    }



  ?>