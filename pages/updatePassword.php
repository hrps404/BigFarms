<?php
 
 session_start();
 include('../connection.php');  


 if(isset($_POST['updatePassword']))
 {
    
    $username = $_SESSION['username'];  
    $crntPassword=$_POST['crntPassword'];
    $newPassword= $_POST['newPassword'];

    $query1 = "SELECT * FROM useraccounts WHERE username = '$username'";  
        
    $result = mysqli_query($con, $query1);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);          
    
    if($count>0){ 

       if($crntPassword == $row["password"]) {
        $update = "UPDATE useraccounts SET password = '$newPassword' WHERE username = '$username'";

        $sql2 = mysqli_query($con,$update);

        if($update)
            $_SESSION['message2'] = "Password updated successfully.";
       }
       else
        $_SESSION['message2'] = "Current Password is incorrect.";

        header('location:/pages/profile.php');

    }
}

?>