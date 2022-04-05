<?php
 
 session_start();
 include('../connection.php');  

 if(isset($_POST['updateProfile']))
 {

    $username = $_POST['username'];  
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address = $_POST['address'];
    $phoneNo = $_POST['phoneNo'];
    $query1 = "SELECT * FROM useraccounts WHERE username = '$username'";           
        
    $result = mysqli_query($con, $query1);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);          
    
    if($count>0){ 
            $update = "UPDATE useraccounts SET FName = '$fname', LName = '$lname' , Address = '$address', PhoneNo  = '$phoneNo' WHERE username = '$username'";
       
       $sql2 = mysqli_query($con,$update);

       if($sql2){

            $_SESSION['fName'] = $row['FName'];
            $_SESSION['lName'] = $row['LName'];
            $_SESSION['email'] = $row["Email"];
            $_SESSION['address'] = $row["Address"];
            $_SESSION['phoneNo'] = $row["PhoneNo"];

        $_SESSION['message'] = $fileName;
        header('location:/pages/profile.php');
       }
       else{
           $_SESSION['message'] = "Sorry. Something went wrong :(";
           header('location:/pages/profile.php');
       }

    }
    

}

if(isset($_POST['editUser'])){

    $username = $_POST['username'];  
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address = $_POST['address'];
    $phoneNo = $_POST['phoneNo'];
    $password = $_POST['password'];

    $query1 = "SELECT * FROM useraccounts WHERE username = '$username'";  
        
    $result = mysqli_query($con, $query1);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);   
    
    
    $fileName = $_FILES["profileImage"]["name"];

    echo "<pre>" , print_r($fileName), "</pre>";
    $imageName = time() . '-' . $fileName;
    $target_dir = "../assets/img/profileImages/";
    $target =  $target_dir. basename($imageName);

    
    if($count>0){ 

    if(move_uploaded_file($_FILES['profileImage']['tmp_name'] , $target))
       $update = "UPDATE useraccounts SET FName = '$fname', LName = '$lname' , Address = '$address', PhoneNo  = '$phoneNo', profileImage = '$imageName' WHERE username = '$username'";

    else
       $update = "UPDATE useraccounts SET FName = '$fname', LName = '$lname' , Address = '$address', PhoneNo  = '$phoneNo' WHERE username = '$username'";

       $sql2 = mysqli_query($con,$update);

       if($sql2){

            $_SESSION['message'] = "Profile Updated Successfully!";
            header('location:/pages/users.php');
        }
        else{
            $_SESSION['message'] = "Sorry. Something went wrong :(";
            header('location:/pages/users.php');
        }
   }
 

}

if(isset($_POST['deleteUser']))
 {

    $username = $_POST['username']; 
    $update = "DELETE FROM useraccounts WHERE username = '$username'";
    $sql2 = mysqli_query($con,$update);

    header("location:/pages/users.php");
 }

?>