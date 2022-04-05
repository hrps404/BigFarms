<?php
  
  session_start();

  include('../connection.php');  

  if(isset($_POST['addUser'])){
    
    $fName = $_POST['fName'];  
    $lName = $_POST['lName'];  
    $email = $_POST['email'].'@bigfarm.com';  
    $username = $_POST['username'];  
    $password = $_POST['password'];
    $phoneNo = $_POST['phoneNo'];  
    $address = $_POST['address'];  
    $role = $_POST['role'];  
          
      
        $add = "INSERT INTO useraccounts (FName, LName,Address,PhoneNo,Email,username,password,role) 
                    VALUES ('$fName', '$lName','$address','$phoneNo','$email','$username','$password','$role')";
          
        $sql = mysqli_query($con,$add);  
        if($sql){
        
            $_SESSION['addMsg'] = "User added successfully.";
            header('location:/pages/users.php');
        } else{
            $_SESSION['addMsg'] = "Sorry! Something went wrong.";
            header('location:/pages/users.php');
        }
          

    }


    if(isset($_POST['addSeed'])){
    
        $sName = $_POST['sName'];  
        $sCategory = $_POST['sCategory'];  
        $expiry = $_POST['expiry'];  
        $quantity = $_POST['quantity'];  
        $seedWay = $_POST['seedWay'];
         
              
            $add = "INSERT INTO seedinventory (name,category,expiry,quantity, seedWay) 
                        VALUES ('$sName', '$sCategory','$expiry','$quantity','$seedWay')";
              
            $sql = mysqli_query($con,$add);  
            if($sql){
            
                $_SESSION['addMsg'] = "Seed added successfully.";
                header('location:/pages/seedsInventory.php');
            } else{
                $_SESSION['addMsg'] = "Sorry! Something went wrong.";
                header('location:/pages/seedsInventory.php');
            }
              
    
        }
        ?>