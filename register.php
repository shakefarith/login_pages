<?php
    echo "in register page";
$con = mysqli_connect('localhost','root','rootadmin','guvi'); 
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pass = $_POST['password'];
$dob = $_POST['dob'];
$Age = $_POST['age'];
$phone = $_POST['phone'];
 $query="INSERT INTO users(email, fname, lname, password, dob, age, phone) VALUES ('$email','$fname','$lname','$pass','$dob','$Age','$phone')";
 mysqli_query($con, $query);
include('insert_json.php');
// jsonData($email,$password,$phone,$LastName,$FirstName,$dob,$age);
jsonInsertData($email,$pass,$phone,$lname,$fname,$dob,$age);
header("Location: login.html");

function jsonInsertData($email,$password,$phone,$LastName,$FirstName,$dob,$age){
    
    $jsonData= array('FirstName'=> $FirstName,'LastName'=> $LastName,
                    'email'=> $email, 'password'=>md5($password), 'phone'=>$phone,
                    'age'=>$age,'dob'=>$dob);

        $file = "user.json";
        
            if(file_exists($file)){
                $existingData =	file_get_contents($file);
                $jsonArray = json_decode($existingData, true); 
                $jsonArray[]=$jsonData;
                file_put_contents($file,json_encode($jsonArray));
            }
            if(!file_exists($file)){	
                $jsonArray[]=$jsonData;
                file_put_contents($file,json_encode($jsonArray));
            }
       
       
    }

?>