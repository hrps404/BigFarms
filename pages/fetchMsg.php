<?php   
    include('../connection.php');  
    include("functions.php");
    session_start();
    $db= $con;
    $tableName="messages";
    $role= $_SESSION['role'];
    $columns= ['MID', 'message','sentFrom','sentTo','sentDate', 'status','category'];
    $fetchMsg = fetch_msg($db, $tableName, $columns, $role);
    
    function fetch_msg($db, $tableName, $columns, $role){
    
        if(empty($db)){
            $msg= "Database connection error";
            }elseif (empty($columns) || !is_array($columns)) {
                $msg="columns Name must be defined in an indexed array";

            }elseif(empty($tableName)){
                $msg= "Table Name is empty";
            
            }else{
                $query = "SELECT * FROM messages WHERE sentTo = '$role' ORDER BY MID DESC";
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

    $fetchUnreadMsg = fetch_Unread($db, $tableName, $columns, $role);
    
    function fetch_Unread($db, $tableName, $columns, $role){
    
        if(empty($db)){
            $msg= "Database connection error";
            }elseif (empty($columns) || !is_array($columns)) {
                $msg="columns Name must be defined in an indexed array";

            }elseif(empty($tableName)){
                $msg= "Table Name is empty";
            
            }else{
                $columnName = implode(", ", $columns);
                $query = "SELECT * FROM messages WHERE sentTo = '$role' AND status = 'unread' ORDER BY MID DESC";
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

    if(isset($_POST['markRead'])){
        $msgID = $_POST['mID'];
        $query = "UPDATE messages SET status = 'read' WHERE MID = '$msgID';";
        $result = mysqli_query($con, $query);  
        $sql2 = mysqli_query($con,$query);

        if($sql2)
            header('location:/pages/Messages.php');
    }

    if(isset($_POST['markReadDashboard'])){
        $msgID = $_POST['mID'];
        $query = "UPDATE messages SET status = 'read' WHERE MID = '$msgID';";
        $result = mysqli_query($con, $query);  
        $sql2 = mysqli_query($con,$query);

        if($sql2){

            if($role == "Admin")
                header("location:AdminDashboard.php");
            elseif($role == "Employee")
                header("location:EmployeeDashboard.php");
            elseif($role == "Gardener")
                header("location:GardenerDashboard.php");
        }
    }

    if(isset($_POST['dltMsg'])){
        $msgID = $_POST['mID'];
        $update = "DELETE FROM messages WHERE MID = '$msgID'";
        $sql2 = mysqli_query($con,$update);

        header('location:/pages/Messages.php');
    }

    if(isset($_POST['sendMsg'])){
        $msgTitle = $_POST['msgTitle'];
        $message = $_POST['message'];
        $sendTo = $_POST['sendTo'];
        $sentFrom = $_SESSION['username'];
        sendMessage($msgTitle, $message, $sentFrom, $sendTo);

        if($role == "Admin")
            header("location:AdminDashboard.php");
        elseif($role == "Employee")
            header("location:EmployeeDashboard.php");
        elseif($role == "Gardener")
            header("location:GardenerDashboard.php");
        

    }



   
?>
