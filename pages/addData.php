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
    $fileName = $_FILES["profileImage"]["name"];

    echo "<pre>" , print_r($fileName), "</pre>";
    $imageName = time() . '-' . $fileName;
    $target_dir = "../assets/img/profileImages/";
    $target =  $target_dir. basename($imageName);

    if(move_uploaded_file($_FILES['profileImage']['tmp_name'] , $target)){
          
      
        $add = "INSERT INTO useraccounts (FName, LName,Address,PhoneNo,Email,username,password,role,profileImage) 
                    VALUES ('$fName', '$lName','$address','$phoneNo','$email','$username','$password','$role','$imageName')";
          
        $sql = mysqli_query($con,$add);  
        if($sql){
        
            $_SESSION['addMsg'] = "User added successfully.";
            header('location:/pages/users.php');
        } else{
            $_SESSION['addMsg'] = "Sorry! Something went wrong.";
            header('location:/pages/users.php');
        }
    }else{
        $_SESSION['addMsg'] = "Failed to upload profile Image...";
        }
    
          

    }


    if(isset($_POST['addSeed'])){
    
        $sName = $_POST['sName'];  
        $sCategory = $_POST['sCategory'];  
        $expiry = $_POST['expiry'];  
        $quantity = $_POST['quantity'];  
        $seedWay = $_POST['seedWay'];
        $fileName = $_FILES["seedImage"]["name"];

        echo "<pre>" , print_r($fileName), "</pre>";
        $imageName = $sName . '-' . $fileName;
        $target_dir = "../assets/img/seedImages/";
        $target =  $target_dir. basename($imageName);

        if(move_uploaded_file($_FILES['seedImage']['tmp_name'] , $target)){
              
            $add = "INSERT INTO seedinventory (name,category,expiry,quantity, seedWay, seedImage) 
                        VALUES ('$sName', '$sCategory','$expiry','$quantity','$seedWay', '$imageName')";
              
            $sql = mysqli_query($con,$add);  
            if($sql){
            
                $_SESSION['addMsg'] = "Seed added successfully.";
                header('location:/pages/seedsInventory.php');
            } else{
                $_SESSION['addMsg'] = "Sorry! Something went wrong.";
                header('location:/pages/seedsInventory.php');
            }
              
        }
        }

        if(isset($_POST['addPlant'])){
    
        $sID = $_POST['sID'];  
        $gName = $_POST['gName'];  
        $pQuantity = $_POST['pQuantity'];  
        $pDate = $_POST['pDate'];  

            $add = "INSERT INTO plants (seedID, qntyPlanted, plantedDate, plantedBy) 
                        VALUES ('$sID','$pQuantity','$pDate','$gName')";

            $update = "UPDATE seedinventory SET quantity = (quantity - '$pQuantity') WHERE seedID = '$sID'";
              
            $sql2 = mysqli_query($con,$add);

            if($sql2){
            
                $sql3 = mysqli_query($con,$update);

                $_SESSION['addMsg'] = "Plant added successfully.";
                header('location:/pages/plants.php');
            } else{
                $_SESSION['addMsg'] = "Sorry! Something went wrong.";
                header('location:/pages/plants.php');
                }
        }
              
        ?>