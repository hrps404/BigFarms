<?php   
    include('../connection.php');  

    $db= $con;
   

$fetchPlants = fetch_plant($db);
    
    function fetch_plant($db){
                $query = "SELECT * FROM plants ORDER BY plantedDate";
                $result = $db->query($query);
                if($result== true){ 
                    if ($result->num_rows > 0) {
                        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                        $msg= $row;
                    } else {
                        $msg= "No Data Found"; 
                        }
                }else{
                    $msg= mysqli_error($db);
            }
        return $msg;
    }

?>