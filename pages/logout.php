<?php

    session_start();

    include('../connection.php');  
    $username = $_SESSION['username'];
    $update = "UPDATE useraccounts SET isOnline = FALSE WHERE username = '$username'";
    $sql2 = mysqli_query($con,$update);
    session_unset();

    
    header('location:../index.php');
    ?>