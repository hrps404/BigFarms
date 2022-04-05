<?php   

    session_start();

    include('connection.php');  

    if(isset($_POST['submit'])){
        $username = $_POST['username'];  
        $password = $_POST['password'];  
        $_SESSION['loggedin'] = FALSE;

      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $query1 = "SELECT * FROM useraccounts WHERE username = '$username' AND password = '$password'";  
        


        $result = mysqli_query($con, $query1);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);          
        
        if($count>0){ 
            $_SESSION['username']= $username;
            $_SESSION['loggedin'] = TRUE;

            $update = "UPDATE useraccounts SET isOnline = TRUE WHERE username = '$username'";
            $sql2 = mysqli_query($con,$update);

            $_SESSION['UID'] = $row['UID'];
            $_SESSION['fName'] = $row['FName'];
            $_SESSION['lName'] = $row['LName'];
            $_SESSION['email'] = $row["Email"];
            $_SESSION['address'] = $row["Address"];
            $_SESSION['phoneNo'] = $row["PhoneNo"];
            $_SESSION['profileImage'] = $row["profileImage"];


            if($row['role'] == "admin"){
                $_SESSION['role'] = "Admin";
                header('location:/pages/AdminDashboard.php');
                die;
            }

            elseif($row['role'] == "employee"){
                $_SESSION['role'] = "Employee";
                header('location:/pages/EmployeeDashboard.php');
                die;
            }
            elseif($row['role'] == "gardener"){
                $_SESSION['role'] = "Gardener";
                header('location:/pages/GardenerDashboard.php');
                die;
            }
        }
        else
            header('location:/index.php');

           
    }

?>
        
