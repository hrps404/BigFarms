<?php
  include('../connection.php');  

 if(isset($_POST['updateSeed']))
 {

    $sID = $_POST['seedID'];
    $sName = $_POST['sName'];  
    $category=$_POST['sCategory'];
    $quantity=$_POST['quantity'];
    $expiry = $_POST['expiry'];
    
    $query1 = "SELECT * FROM seedinventory WHERE seedID = '$sID'";  
        
    $result = mysqli_query($con, $query1);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);      
    
    
    $fileName = $_FILES["sdImage"]["name"];

        echo "<pre>" , print_r($fileName), "</pre>";
        $imageName = $sName . '-' . $fileName;
        $target_dir = "../assets/img/seedImages/";
        $target =  $target_dir. basename($imageName);

    
    if($count>0){ 

        if(move_uploaded_file($_FILES['sdImage']['tmp_name'] , $target))
        $update = "UPDATE seedinventory SET name = '$sName', category = '$category' , quantity = '$quantity', expiry  = '$expiry', seedImage = '$imageName' WHERE seedID = '$sID'";

        else
            $update = "UPDATE seedinventory SET name = '$sName', category = '$category' , quantity = '$quantity', expiry  = '$expiry' WHERE seedID = '$sID'";

       $sql2 = mysqli_query($con,$update);

       if($sql2){

        $_SESSION['message'] = "Seed Updated Successfully!";
        header('location:/pages/seedsInventory.php');
       }
       else{
           $_SESSION['message'] = "Sorry. Something went wrong :(";
           header('location:/pages/seedsInventory.php');
       }


    }

}



if(isset($_POST['deleteSeed']))
 {

    $sID = $_POST['seedID']; 
    $update = "DELETE FROM seedinventory WHERE seedID = '$sID'";
    $sql2 = mysqli_query($con,$update);

    header("location:/pages/seedsInventory.php");
 }


 if(isset($_POST['markWasted']))
 {

    $role = $_POST['username'];
    $sID = $_POST['seedID']; 
    
    $query1 = "SELECT * FROM seedinventory WHERE seedID='$sID'";
    $sql1 = mysqli_query($con, $query1);  
    $row = mysqli_fetch_array($sql1 , MYSQLI_ASSOC); 


    $seedID = $row['seedID'];
    $name = $row['name'];
    $expiry = $row['expiry'];
    $seedWay = $row['seedWay'];
    $image =  $row['seedImage'];
    $quantity = $row['quantity'];
    $query2 = "INSERT INTO wastedSeeds (sID, wName, expiredOn, type, wastedBy, wQuantity, wImage) VALUES ('$seedID', '$name', '$expiry', '$seedWay', '$role', '$quantity', '$image')";
    
    $sql2 = mysqli_query($con,$query2);
 

    $query3 = "DELETE FROM seedinventory where seedID = '$sID'";
    $sql3 = mysqli_query($con,$query3);

    header("location:/pages/seedsInventory.php");
 }

?>