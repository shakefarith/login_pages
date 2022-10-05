<?php

session_start();
$con = mysqli_connect('localhost','root','rootadmin','guvi');
mysqli_select_db($con, 'guvi');
$name = $_POST['user'];
$pass = $_POST['password'];
$s = "select * from users where email = '$name' && password = '$pass'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num ==1){
    $_SESSION['USERNAME']=$_POST['user'];
    header('location:profile.html');
    }
    else{
        header('location:login.html'); 
            } 
    
    ?>

