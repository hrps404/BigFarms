<?php
  include('../connection.php');  
  $db = $con;
  global $db;
  $crntMonth = date('F'); //April
  $crntDate = date('Y-m-d');


function getUser($username, $columnName){
    $query = "SELECT * FROM useraccounts WHERE username = '$username';";

    global $con;
    $result = mysqli_query($con, $query);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);          
        
    if($count>0)
        return $row["$columnName"];
    else        
        return "";
}


 function sendMessage($msgTitle, $message, $sentFrom, $sentTo){
    global $con;
    $addMsg = "INSERT INTO messages (msgTitle, message, sentFrom, sentTo, sentDate, status) 
                    VALUES ('$msgTitle','$message','$sentFrom', '$sentTo', CURRENT_TIMESTAMP, 'unread')";
    $result = mysqli_query($con, $addMsg);  
 }

  $getSeeds = fetch_seed($db);
    function fetch_seed($db){
                $query = "SELECT * FROM seedinventory";
                $result = mysqli_query($db, $query);
                if($result== true){ 
                    if ($result->num_rows > 0) {
                        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                        $msg= $row;
                    } else {
                        $msg= "No Seed Found"; 
                        }
                }else{
                    $msg= mysqli_error($db);
                }
        return $msg;
    }


 function checkPlants(){
    global $con;
    global $crntMonth;
    $plants = "";
    $query1 = "SELECT * FROM seedinventory WHERE plantTime = '$crntMonth'";

    $result = mysqli_query($con, $query1);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 

    if(is_array($row)){      
        while($seedNames = mysqli_fetch_assoc($result)){
            $plants = $plants.$seedNames['name'].', ';    
        }
    }
    return $plants;
}


    //First Day of month
    if(date('Y-m-d') == date('Y-m-01')){   // 2022-0m-01

            $msgTitle = "Today is " . date('l jS \of F Y');
            $message = "Today is ". date('l jS \of F Y') . ". Please consider these plants to be planted: " . checkPlants();

            $query1 = "SELECT * FROM messages WHERE msgTitle = '$msgTitle';";  
            $result = mysqli_query($con, $query1);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);          
            
            if($count==0) 
                sendMessage($msgTitle, $message, "System", "Employee");          
        }



    // Quantity- Message
if(is_array($getSeeds)){      
    foreach ($getSeeds as $seed) {
        if($seed['quantity']< 500){
            $msgTitle = $seed['name']. " is running low in quantity. Dated (".date('Y-m-01').")";
            $message = "Hey there Admin!\n". "Please consider the following seed: ". $seed['name'].". There is just ". $seed['quantity']. "g left of this seed. Order or harvest them more. \nThanks!\n -System";

            $query1 = "SELECT * FROM messages WHERE msgTitle = '$msgTitle';";  
            $result = mysqli_query($con, $query1);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);          
            
            if($count==0) 
                sendMessage($msgTitle, $message, "System", "Admin");
        }
    }
}

if(is_array($getSeeds)){     

    // Quantity- Message 
    foreach ($getSeeds as $seed) {
        if($seed['quantity']< 500){
            $msgTitle = $seed['name']. " is running low in quantity. Dated (".date('Y-m-01').")";
            $message = "Hey there Admin!\n". "Please consider the following seed: ". $seed['name'].". There is just ". $seed['quantity']. "g left of this seed. Order or harvest them more. \nThanks!\n -System";

            $query1 = "SELECT * FROM messages WHERE msgTitle = '$msgTitle';";  
            $result = mysqli_query($con, $query1);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);          
            
            if($count==0) 
                sendMessage($msgTitle, $message, "System", "Admin");
        }
    }

    function checkExpiry($date){
        $expiry = strtotime($date);
        $present = strtotime(date('Y-m-d'));

        if($expiry <= $present)
            return true;
        else
            return false;
    }

    //Close to expiry Seeds
    foreach ($getSeeds as $seed) {
        $date = $seed['expiry'];

        $expiry = date_create($date);
        date_sub($expiry, date_interval_create_from_date_string('12 months'));

        $rslt = date_format($expiry, 'Y-m-d');
        $temp1 = strtotime($rslt);
        $temp2 = strtotime($crntDate);

        if($temp1 < $temp2){
            $msgTitle = $seed['name']. " is going to be expired soon... ";
            $message = "Hey there Admin! Please consider the following seed: ". $seed['name'].". It is going to be expired on ".$seed['expiry']. ". Please plant them as soon as possible. Thanks:) "  ;

            $query1 = "SELECT * FROM messages WHERE msgTitle = '$msgTitle';";  
            $result = mysqli_query($con, $query1);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);          
            
            if($count==0) 
                sendMessage($msgTitle, $message, "System", "Admin");
        }
    }


}


 

   
?>





