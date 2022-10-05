<?php
$con = mysqli_connect('localhost','root','rootadmin','guvi');
session_start();
$email=$_SESSION['USERNAME'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$query="UPDATE users SET dob = '$dob', age= '$age', phone= '$phone' WHERE email= '$email'";
mysqli_query($con, $query);
header("Location: home.php");
?>