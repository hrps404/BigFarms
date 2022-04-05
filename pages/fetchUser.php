<?php   
    include('../connection.php');  

    $db= $con;
    $tableName="useraccounts";
    $columns= ['UID', 'FName','LName','Address','PhoneNo', 'Email','username','role','isOnline', 'profileImage'];
    $fetchUser = fetch_data($db, $tableName, $columns);
    echo $_SESSION['username'];
    
    function fetch_data($db, $tableName, $columns){
    
        if(empty($db)){
            $msg= "Database connection error";
            }elseif (empty($columns) || !is_array($columns)) {
                $msg="columns Name must be defined in an indexed array";

            }elseif(empty($tableName)){
                $msg= "Table Name is empty";
            
            }else{
                $query = "SELECT '$columns' FROM '$tableName' WHERE username = '$_SESSION['username']'";
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
        }
        return $msg;
    }
?>